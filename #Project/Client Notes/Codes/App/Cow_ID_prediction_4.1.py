# Run Cow ID script

import os
import cv2
from ultralytics import YOLO
import numpy as np
import pickle
import keras
from tensorflow.keras.models import load_model
from PIL import Image
import matplotlib.pyplot as plt
import yaml
#%% Loading models etc.
yolo_model = YOLO('best.pt')
cow_ID_model = load_model('ResNet50_cow_id_all.h5', compile = False)

#%%
with open('int_to_ID_all_cows.yaml', 'r') as f:
    int_to_ID_161 = yaml.safe_load(f)

#%% Muzzle detection

#cow_image = cv2.imread("D:/Indu Muzzle Project/Data 23-9-23/Testing/2799_16.jpg")

cow_image = cv2.imread("2910_15.jpg")


results = yolo_model.predict(source=cow_image,verbose=False)

# Get the dimensions of the image
height, width, _ = cow_image.shape

# Get the confidence scores for all of the bounding boxes.
confidence_scores = results[0].boxes.conf

# Find the bounding box with the highest confidence score.
max_index = np.argmax(confidence_scores)

# Get the coordinates of the bounding box with the highest confidence score.
bbox = results[0].boxes.xyxy[max_index]

# Extract individual elements and convert to integers
bbox = [int(coord) for coord in bbox]

muzzle_image = cow_image[bbox[1]:bbox[3], bbox[0]:bbox[2]]

# cropped the image from center with 5% pixels from each side
# Get the dimensions of the image
height, width, _ = muzzle_image.shape
# Define the percentage of cropping from each side
crop_percentage_width = 0.20  # 5%
crop_percentage_height = 0.20  # 5%
# Calculate the cropping dimensions
crop_height = int(height * crop_percentage_height)
crop_width = int(width * crop_percentage_width)

# Crop the image
cropped_muzzle_image = muzzle_image[crop_height:-crop_height, crop_width:-crop_width]

#cv2.imwrite('D:/Coding Learning/Spyder/Object detection/Single bounding box/results1/cropped.png', cropped_muzzle_image)


#cropped_muzzle_image = cv2.imread("D:/Indu Muzzle Project/Muzzle_Data/output_image/2781_1.jpg")
def CROP_IMAGE(image):
    # Get the current dimensions of the image
    # Define the target size
    target_height, target_width = 400, 400

    height, width, _ = image.shape

    # Check if the image is smaller than the target size
    if height < target_height or width < target_width:
        # Resize the image to the target size using interpolation
        image = cv2.resize(image, (target_width, target_height), interpolation=cv2.INTER_LINEAR)

    # Crop the image to the target size
    start_x = max(0, (width - target_width) // 2)
    start_y = max(0, (height - target_height) // 2)
    cropped_image = image[start_y:start_y + target_height, start_x:start_x + target_width]

    return cropped_image

# function to predict class of given image
def predict(img_muzzle):
    x1 = np.expand_dims(img_muzzle,axis=0)
    y = np.argmax(cow_ID_model.predict(x1),axis=1)[0]
    return y

#image_front = Image.fromarray(cropped_muzzle_image)

cropped_muzzle_image = cv2.cvtColor(cropped_muzzle_image, cv2.COLOR_BGR2GRAY)
cropped_muzzle_image = np.dstack([cropped_muzzle_image] * 3)
image_front = cropped_muzzle_image
image_front = CROP_IMAGE(image_front)
#image_front = cv2.resize(image_front, (640, 480))
image_front = np.array(image_front)

#cv2.imwrite('D:/Coding Learning/Spyder/Object detection/Single bounding box/results1/sq1_cropped.png', image_front)

#img = image_front
#plt.imshow(img)
pred_out = predict(image_front)

predicted_label = pred_out
predicted_int_label = predicted_label  # The predicted label is already an integer
original_cow_id = int_to_ID_161[predicted_int_label]  # Map the integer label to the cow ID
print("Predicted ID of Cow is: ",original_cow_id)


