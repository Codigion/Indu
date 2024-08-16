<?php

/**
 * Weaver Framework - File Handling Class
 *
 * This class provides methods for uploading, writing, and reading files, along with error handling.
 */

class File
{
    /**
     * Upload a file with allowed file type check.
     *
     * @param array $fileHandle The file handle received from the file input field.
     * @param string $uploadPath The directory where the file will be uploaded.
     * @param array $allowedFileTypes An array of allowed file extensions (e.g., ['jpg', 'png']).
     * @param int|null $maxFileSize (Optional) The maximum file size in MB (null for no limit).
     * @return array An array containing upload status, message, and uploaded file path.
     */
    public static function uploadFile($fileHandle, $uploadPath, $allowedFileTypes, $maxFileSize = null)
    {
        try {
            if (!isset($fileHandle) || $fileHandle['error'] === UPLOAD_ERR_NO_FILE) {
                return [
                    'err' => true,
                    'msg' => 'Oops! No file was uploaded.',
                ];
            }

            // Check the file size if $maxFileSize is provided
            if ($maxFileSize !== null && $fileHandle['size'] > ((int)$maxFileSize * 1024 * 1024)) {
                return [
                    'err' => true,
                    'msg' => 'Oops! Input file size exceeds the maximum allowed size.',
                ];
            }

            $file = $fileHandle;
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

            if (!in_array(strtolower($fileExtension), $allowedFileTypes)) {
                return [
                    'err' => true,
                    'msg' => 'Oops! Input file type (.' . $fileExtension . ') is not allowed.',
                ];
            }

            $destination = $uploadPath . DIRECTORY_SEPARATOR . hash('sha256', Generic::getRandomString(5) . time()) . "." . pathinfo($fileHandle['name'], PATHINFO_EXTENSION);


            if (move_uploaded_file($file['tmp_name'], $destination)) {
                return [
                    'err' => false,
                    'msg' => 'File uploaded successfully.',
                    'dat' => $destination,
                ];
            } else {
                switch ($file['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        $errorMsg = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $errorMsg = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $errorMsg = 'The uploaded file was only partially uploaded.';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $errorMsg = 'No file was uploaded.';
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $errorMsg = 'Missing a temporary folder. Check your PHP configuration.';
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $errorMsg = 'Failed to write file to disk. Check your server\'s file permissions.';
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $errorMsg = 'A PHP extension stopped the file upload.';
                        break;
                    default:
                        $errorMsg = 'Unknown file upload error.';
                        break;
                }

                return [
                    'err' => true,
                    'msg' => $errorMsg,
                ];
            }
        } catch (Exception_ $e) {
            System::displayErrorPage($e);
        }
    }

    /**
     * Creates a directory at a specified location with a given name.
     *
     * @param string $folderName The name of the folder to create.
     * @param string $relativeLocation The location where the folder should be created.
     * @return string The full path of the created directory or an error message.
     */
    public static function createDirectory($folderName, $relativeLocation)
    {
        try {
            // Validate inputs
            $folderName = trim($folderName);
            $relativeLocation = trim($relativeLocation);

            if (empty($folderName) || empty($relativeLocation)) {
                throw new Exception_('Folder name and location cannot be empty.');
            }

            // Sanitize folder name and location
            $folderName = basename($folderName); // Removes any path components
            $relativeLocation = rtrim($relativeLocation, '/\\'); // Remove trailing slashes or backslashes

            // Define the full path to the new directory
            $basePath = dirname(__DIR__); // Assumes this script is in a subdirectory and goes up one level to the base path
            $fullPath = $basePath . '/' . $relativeLocation . '/' . $folderName;

            // Check if the directory already exists
            if (is_dir($fullPath)) {
                throw new Exception_('The directory already exists: ' . $fullPath);
            }

            // Ensure the parent location is a valid directory
            $parentPath = dirname($fullPath);
            if (!is_dir($parentPath)) {
                throw new Exception_('The specified location does not exist or is not a directory: ' . $parentPath);
            }

            // Attempt to create the directory
            if (mkdir($fullPath, 0755, true)) {
                return $fullPath;
            } else {
                throw new Exception_('Failed to create directory at: ' . $fullPath);
            }
        } catch (Exception_ $e) {
            // Handle the exception and return an error message
            return "Error: " . $e->getMessage();
        }
    }

    /**
     * Write content to a file (create if not exists).
     *
     * @param string $filePath The path to the file.
     * @param string $content The content to write to the file.
     * @return bool True on success, throws an exception on failure.
     */
    public static function writeFile($filePath, $content)
    {
        try {
            if (file_put_contents($filePath, $content) !== false) {
                return true; // Content written to the file successfully.
            } else {
                throw new Exception_('Failed to write content to the file.');
            }
        } catch (Exception_ $e) {
            System::displayErrorPage($e);
        }
    }

    /**
     * Read file content.
     *
     * @param string $filePath The path to the file.
     * @return string|false The file content as a string, or false if the file does not exist.
     */
    public static function readFile($filePath)
    {
        try {
            if (file_exists($filePath)) {
                return file_get_contents($filePath); // Read file content.
            } else {
                throw new Exception_('File does not exist.');
            }
        } catch (Exception_ $e) {
            System::displayErrorPage($e);
        }
    }
}
