# Benchmarking [https://colab.research.google.com/drive/1PRD5metCHoG1-X4MlpQuKHoXbhei-sMS?usp=sharing]

import os
import cv2
from ultralytics import YOLO
import numpy as np
from tensorflow.keras.models import load_model
import yaml
import sys
import json
import logging
import argparse

os.environ["TF_CPP_MIN_LOG_LEVEL"] = (
    "3"  # Suppresses TensorFlow warnings and info messages
)

# Set up logging
logging.basicConfig(
    filename="process.log",
    level=logging.DEBUG,
    format="%(asctime)s - %(levelname)s - %(message)s",
)


def write_percentage(session_id, content):
    """
    Overwrites the content of the specified file with the given content.

    :param file_path: Path to the file to be overwritten.
    :param content: Content to write into the file.
    """
    with open(session_id, "w") as file:
        file.write(content)


def load_models(yolo_model_path, cow_id_model_path):
    try:
        yolo_model = YOLO(yolo_model_path)
        cow_ID_model = load_model(cow_id_model_path, compile=False)
        return yolo_model, cow_ID_model, None
    except Exception as e:
        logging.error(f"Error loading models: {e}")
        return (
            None,
            None,
            json.dumps(
                {"error": "Failed to load models. Please check the model paths."}
            ),
        )


def load_cow_id_mappings(mapping_file):
    try:
        with open(mapping_file, "r") as f:
            mappings = yaml.safe_load(f)
        return mappings, None
    except Exception as e:
        logging.error(f"Error loading cow ID mappings: {e}")
        return None, json.dumps(
            {"error": "Failed to load cow ID mappings. Please check the mapping file."}
        )


def detect_muzzle(yolo_model, cow_image):
    try:
        results = yolo_model.predict(source=cow_image, verbose=False)
        confidence_scores = results[0].boxes.conf
        max_index = np.argmax(confidence_scores)
        bbox = results[0].boxes.xyxy[max_index]
        bbox = [int(coord) for coord in bbox]
        muzzle_image = cow_image[bbox[1] : bbox[3], bbox[0] : bbox[2]]
        bbox_size = (bbox[3] - bbox[1]) * (bbox[2] - bbox[0])
        max_confidence = confidence_scores[
            max_index
        ]  # Max confidence for the detected muzzle
        return muzzle_image, bbox_size, max_confidence, None
    except Exception as e:
        logging.error(f"Error detecting muzzle: {e}")
        return (
            None,
            None,
            None,
            json.dumps(
                {"error": "Muzzle detection failed. Please check the image and model."}
            ),
        )


def crop_image_center(image, crop_percentage_width=0.20, crop_percentage_height=0.20):
    try:
        height, width, _ = image.shape
        crop_height = int(height * crop_percentage_height)
        crop_width = int(width * crop_percentage_width)
        cropped_image = image[crop_height:-crop_height, crop_width:-crop_width]
        return cropped_image, None
    except Exception as e:
        logging.error(f"Error cropping image: {e}")
        return None, json.dumps(
            {"error": "Image cropping failed. Please check the image dimensions."}
        )


def ensure_target_size(image, target_height=400, target_width=400):
    try:
        height, width, _ = image.shape
        if height < target_height or width < target_width:
            image = cv2.resize(
                image, (target_width, target_height), interpolation=cv2.INTER_LINEAR
            )
        start_x = max(0, (width - target_width) // 2)
        start_y = max(0, (height - target_height) // 2)
        cropped_image = image[
            start_y : start_y + target_height, start_x : start_x + target_width
        ]
        return cropped_image, None
    except Exception as e:
        logging.error(f"Error ensuring target size: {e}")
        return None, json.dumps({"error": "Resizing image to target size failed."})


def prepare_image_for_prediction(image):
    try:
        image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
        image = np.dstack([image] * 3)
        return image, None
    except Exception as e:
        logging.error(f"Error preparing image for prediction: {e}")
        return None, json.dumps({"error": "Image preparation for prediction failed."})


def predict_cow_id(image, model):
    try:
        x1 = np.expand_dims(image, axis=0)
        predictions = model.predict(x1, verbose=0)
        max_confidence = float(np.max(predictions))  # Convert to Python native float
        y = int(np.argmax(predictions, axis=1)[0])  # Convert to Python native int
        return y, max_confidence, None
    except Exception as e:
        logging.error(f"Error predicting cow ID: {e}")
        return (
            None,
            None,
            json.dumps({"error": "Cow ID prediction failed. Please check the image and model."}),
        )


def convert_grayscale_to_color(image):
    try:
        if len(image.shape) == 2:  # Check if the image is single-channel (grayscale)
            color_image = np.dstack([image] * 3)
            return color_image, None
        elif (
            len(image.shape) == 3 and image.shape[2] == 3
        ):  # Check if the image is already in color
            return image, None
        else:
            raise ValueError(
                "Unexpected image format. The image must be either single-channel or 3-channel."
            )
    except Exception as e:
        logging.error(f"Error converting grayscale to color: {e}")
        return None, json.dumps({"error": "Image format conversion failed."})


def determine_quality_from_muzzle(muzzle_image, bbox_size, confidence_score):
    try:
        # Sharpness: Measure the variance of the Laplacian to determine sharpness
        sharpness = cv2.Laplacian(muzzle_image, cv2.CV_64F).var()

        # Logging bbox size, sharpness, and confidence score for debugging
        logging.info(
            f"Bounding Box Size: {bbox_size}, Sharpness: {sharpness}, Confidence Score: {confidence_score}"
        )

        # Adjusted thresholds
        if bbox_size > 25000 and sharpness > 200 and confidence_score > 0.7:
            return "Excellent", None
        elif bbox_size > 20000 and sharpness > 150 and confidence_score > 0.6:
            return "Very Good", None
        elif bbox_size > 15000 and sharpness > 100 and confidence_score > 0.5:
            return "Good", None
        elif bbox_size > 10000 and sharpness > 50 and confidence_score > 0.4:
            return None, json.dumps(
                {"error": "Cow ID prediction failed. Please check the image and model."}
            )
        else:
            return "Poor", json.dumps(
                {"error": "Cow ID prediction failed. Please check the image and model."}
            )
    except Exception as e:
        logging.error(f"Error determining image quality: {e}")
        return "Unknown"


def main(args):
    try:
        write_percentage(args.session, "Completed 5%. Loading Models ...")
        yolo_model, cow_ID_model, error = load_models(
            args.yolo_model, args.cow_id_model
        )
        if error:
            sys.stderr.write(error)
            return

        write_percentage(args.session, "Completed 10%. Loading Cow's Mapping Database...")
        int_to_ID_161, error = load_cow_id_mappings(args.mapping_file)
        if error:
            sys.stderr.write(error)
            return

        write_percentage(args.session, "Completed 25%. Uploading Image to Model...")
        cow_image = cv2.imread(args.image)
        if cow_image is None:
            sys.stderr.write(
                json.dumps({"error": "Image not found or unable to load."})
            )
            return

        write_percentage(args.session, "Completed 50%. Detecting Muzzle...")
        muzzle_image, bbox_size, confidence_score, error = detect_muzzle(
            yolo_model, cow_image
        )
        if error:
            sys.stderr.write(error)
            return

        write_percentage(args.session, "Completed 55%. Cropping the Muzzle area...")
        cropped_muzzle_image, error = crop_image_center(muzzle_image)
        if error:
            sys.stderr.write(error)
            return

        write_percentage(args.session, "Completed 70%. Converting the GrayScale image to Color ...")
        color_muzzle_image, error = convert_grayscale_to_color(cropped_muzzle_image)
        if error:
            sys.stderr.write(error)
            return

        write_percentage(args.session, "Completed 74%. Preparing Image for Prediction ...")
        prepared_image, error = prepare_image_for_prediction(color_muzzle_image)
        if error:
            sys.stderr.write(error)
            return

        write_percentage(args.session, "Completed 76%. Cross-checking Target Image Size ...")
        image_front, error = ensure_target_size(prepared_image)
        if error:
            sys.stderr.write(error)
            return

        write_percentage(args.session, "Completed 90%. Predicting Cow ID ...")
        predicted_label, confidence, error = predict_cow_id(image_front, cow_ID_model)
        if error:
            sys.stderr.write(error)
            return

        # Determine quality based on muzzle detection
        write_percentage(args.session, "Completed 95%. Determining Model's Quality from Muzzle ...")
        quality, error = determine_quality_from_muzzle(
            muzzle_image, bbox_size, confidence_score
        )
        if error:
            sys.stderr.write(error)
            return

        write_percentage(args.session, f"Completed 95%. Modal's Quality of Muzzle: {quality} ...")
        # Now, use the color image for further processing if needed
        # For demonstration, let's save the color image to a file
        write_percentage(args.session, "Completed 99%. Saving Image to Disk ...")
        cv2.imwrite("color_file.png", color_muzzle_image)

        data = {
            "cow_id": int_to_ID_161[predicted_label],
            "confidence_score": round(confidence, 2),
            "temperature": args.temperature,
            "threshold": args.threshold,
            "quality": quality,
        }
        write_percentage(args.session, "Completed 100%. Completed Cow Identification, processing results ...")
        print(json.dumps(data))
    except Exception as e:
        error_json = json.dumps({"error": str(e)})
        sys.stderr.write(error_json)
        logging.error(f"Error in main function: {e}")
    finally:
        # Ensure the session file is deleted
        if os.path.exists(args.session):
            os.remove(args.session)


if __name__ == "__main__":
    parser = argparse.ArgumentParser(description="Cow Identification Script")
    parser.add_argument(
        "-i", "--image", type=str, required=True, help="Path to the image of the cow"
    )
    parser.add_argument(
        "-y", "--yolo-model", type=str, required=True, help="Path to the YOLO model"
    )
    parser.add_argument(
        "-c", "--cow-id-model", type=str, required=True, help="Path to the cow ID model"
    )
    parser.add_argument(
        "-m",
        "--mapping-file",
        type=str,
        required=True,
        help="Path to the YAML file with cow ID mappings",
    )
    parser.add_argument(
        "-t",
        "--temperature",
        type=float,
        required=False,
        default=0.5,
        help="Temperature setting for predictions",
    )
    parser.add_argument(
        "-th",
        "--threshold",
        type=float,
        required=False,
        default=0.5,
        help="Threshold for model predictions",
    )
    parser.add_argument(
        "-session", "--session", type=str, required=True, help="Create Session for user"
    )

    args = parser.parse_args()

    main(args)
