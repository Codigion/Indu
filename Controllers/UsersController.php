<?php
class UsersController
{
    public function tryNow()
    {
        try {

            if (Validation::isEmpty(Request::post('name'))) {
                throw new Exception('Oops! Incorrect Name.');
            }

            if ($TryID = System::loadModel('UsersModel')->tryNow()) {

                Cookie::set('name', Request::post('name'), time() + 31536000, "/", '', false, false);  // 1 year expiration
                Cookie::set('cid', $TryID, time() + 31536000, "/", '', false, false);  // 1 year expiration

                Response::json(array(
                    'err' => false,
                    'msg' => 'Registered!'
                ));
            } else {
                throw new Exception('Oops! Something went wrong.');
            }
        } catch (Exception $e) {
            Response::json(array(
                'err' => true,
                'msg' => $e->getMessage()
            ));
        }
    }

    public function identifyCow()
    {
        try {

            if (Validation::isEmpty(Request::post('model_version'))) {
                throw new Exception('Oops! Incorrect Model.');
            }

            $ModelsModel = System::loadModel('ModelsModel');
            if ( $ModelsModel->checkIfModelActiveAndInUse(Request::post('model_version'))) {
                throw new Exception('Oops! Incorrect Model Selected.');
            }

        
            $uploadResponse = File::uploadFile(Request::fileHandle('picture_orginal'), 'Assets/uploads/COW_Picture', array('png', 'jpg', 'jpeg'));
            if ($uploadResponse['err']) {
                throw new Exception('Cow Image : ' . $uploadResponse['msg']);
            } elseif (empty($uploadResponse['dat'])) {
                throw new Exception('Oops! No Cow Picture');
            }

            $ModelsArray =  $ModelsModel->getActiveModel();
            $SettingsArray = System::loadModel('SettingsModel')->getAllSetting();

            $Models = isset($ModelsArray[0]) ? $ModelsArray[0] : null;
            $Settings = isset($SettingsArray[0]) ? $SettingsArray[0] : null;

            if (is_null($Models)) {
                throw new Exception('Oops! Unable to load Model.');
            }

            if (is_null($Settings)) {
                throw new Exception('Oops! Unable to load Settings.');
            }

            $User = USER;
            $UploadPath = './' . $uploadResponse['dat'];
            $imagePath = escapeshellarg($UploadPath);
            $pythonPath = PYTHON_PATH; // Path to Python interpreter
            $scriptPath = FULL_MODEL_PATH; // Path to your Python script
            $YoloPath = RELATIVE_MODEL_PATH . $Models->version . DIRECTORY_SEPARATOR . $Models->yolo;
            $ResnetPath =  RELATIVE_MODEL_PATH . $Models->version . DIRECTORY_SEPARATOR . $Models->resnet50;
            $CowPath = RELATIVE_MODEL_PATH . $Models->version . DIRECTORY_SEPARATOR . $Models->cow_ref;
            $Threshold = $Settings->threshold;
            $Temperature = $Settings->temperature;

            // Define paths for output and error files
            $outputFile = 'output.txt';
            $errorFile = 'error.txt';

            // Command to run the Python script
            $command = "sudo -u $User $pythonPath $scriptPath -i $imagePath -y $YoloPath -c $ResnetPath -m $CowPath -t $Temperature -th $Threshold";


            // Define the descriptors for proc_open
            $descriptorspec = array(
                0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
                1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
                2 => array("pipe", "w")   // stderr is a pipe that the child will write to
            );

            // Open a process for the command
            $process = proc_open($command, $descriptorspec, $pipes);

            // Check if the process was successfully opened
            if (is_resource($process)) {
                // Close the stdin pipe
                fclose($pipes[0]);

                // Capture the output and error streams
                $output = stream_get_contents($pipes[1]);
                fclose($pipes[1]);

                $error = stream_get_contents($pipes[2]);
                fclose($pipes[2]);

                // Wait for the process to finish
                $return_value = proc_close($process);

                // Write output and error to files
                file_put_contents($outputFile, $output, FILE_APPEND);
                file_put_contents($errorFile, $error, FILE_APPEND);

                // Decode and display JSON output if present
                $jsonData = json_decode($output, true);

                // Display any errors
                if (!empty($error)) {
                    $error = json_decode($error, true);
                    throw new Exception("Oops! Error: " . $error['error']);
                }
                // Check if decoding was successful
                if (json_last_error() === JSON_ERROR_NONE) {
                    // Iterate over each key-value pair in the associative array
                    foreach ($jsonData as $key => $value) {
                        $_POST[$key] = $value;
                    }
                } else {
                    throw new Exception("Error decoding JSON: " . json_last_error_msg());
                }


               
            } else {
                throw new Exception("Oops! Unable to process the model.");
            }

            if (Validation::isEmpty(Request::post('cow_id'))) {
                throw new Exception('Oops! Incorrect Cow Id.');
            }

            if (Validation::isEmpty(Request::post('confidence_score'))) {
                throw new Exception('Oops! Incorrect Cow Details.');
            }

            if (Validation::isEmpty(Request::post('temperature'))) {
                throw new Exception('Oops! Incorrect Cow Details.');
            }

            if (Validation::isEmpty(Request::post('threshold'))) {
                throw new Exception('Oops! Incorrect Cow Details.');
            }

            if (Validation::isEmpty(Request::post('quality'))) {
                throw new Exception('Oops! Incorrect Cow Details.');
            }

            $destination =  'Assets/uploads/COW_Picture/muzzle' . DIRECTORY_SEPARATOR . hash('sha256', Generic::getRandomString(5) . time()) . "." . 'png';

            $UploadMuzzle = MUZZLE_IMG;

            if (!copy($UploadMuzzle, $destination)) {
                throw new Exception('Oops! Can\'t Move the Muzzle Image.');
            }


            $cow_id = Request::post('cow_id');
            if (System::loadModel('UsersModel')->identifyCow(basename($uploadResponse['dat']), basename($destination))) {
                Response::json(array(
                    'err' => false,
                    'msg' => 'Get Cow Details!',
                    'COW_ID' => $cow_id,
                    'MUZZLE' => basename($destination),
                    'return_value' => $return_value
                ));
            } else {
                throw new Exception('Oops! Something went wrong.');
            }
        } catch (Exception $e) {
            Response::json(array(
                'err' => true,
                'msg' => $e->getMessage()
            ));
        }
    }

    public function getAllUsers()
    {
        try {

            $result = System::loadModel('UsersModel')->getAllUsers();
            if (sizeof($result) > 0) {
                Response::json(array(
                    'err' => false,
                    'msg' => 'Retrieved!',
                    'dat' => $result
                ));
            } else {
                throw new Exception('Oops! Something went wrong.');
            }
        } catch (Exception $e) {
            Response::json(array(
                'err' => true,
                'msg' => $e->getMessage()
            ));
        }
    }
    public function getUserDetails()
    {
        try {

            if (Validation::isEmpty(Request::get('id'))) {
                throw new Exception('Oops! Incorrect User Id.');
            }


            $result = System::loadModel('UsersModel')->getUserDetails(Request::get('id'));
            if (sizeof($result) > 0) {
                Response::json(array(
                    'err' => false,
                    'msg' => 'Retrieved!',
                    'dat' => $result
                ));
            } else {
                throw new Exception('Oops! Something went wrong.');
            }
        } catch (Exception $e) {
            Response::json(array(
                'err' => true,
                'msg' => $e->getMessage()
            ));
        }
    }
}
