<?php
class ModelsController
{

    public function deleteModel()
    {
        try {


            $ModelsModel = System::loadModel('ModelsModel');

            if (
                Validation::isEmpty(Request::post('id')) ||
                !Validation::isNumeric(Request::post('id'))
            ) {
                throw new Exception('Oops! Incorrect Model.');
            }


            if ($ModelsModel->deleteModel(Request::post('id'))) {
                Response::json(array(
                    'err' => false,
                    'msg' => 'Deleted Model!'
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
    public function changeStatus()
    {
        try {


            $ModelsModel = System::loadModel('ModelsModel');

            if (
                Validation::isEmpty(Request::post('is_active')) ||
                !Validation::isNumeric(Request::post('is_active'))
            ) {
                throw new Exception('Oops! Incorrect Model (Active / Inactive).');
            }

            if (
                Validation::isEmpty(Request::post('id')) ||
                !Validation::isNumeric(Request::post('id'))
            ) {
                throw new Exception('Oops! Incorrect Model.');
            }


            if ($ModelsModel->changeStatus(Request::post('id'),Request::post('is_active'))) {
                Response::json(array(
                    'err' => false,
                    'msg' => 'Deleted Model!'
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


   

    public function addModel()
    {
        try {

            if (Validation::isEmpty(Request::post('name'))) {
                throw new Exception('Oops! Incorrect Model Name.');
            }
            if (Validation::isEmpty(Request::post('version'))) {
                throw new Exception('Oops! Incorrect Version.');
            }

            $version_path = File::createDirectory(Request::post('version'),  '/Assets/admin/models/versions');
            $version_path = rtrim($version_path, '/\\') . '/';

            $Yolo = File::uploadFile(Request::fileHandle('yolo'), $version_path, array('pt'));
            if ($Yolo['err']) {
                throw new Exception('Oops! Yolo Error: ' . $Yolo['msg']);
            }

            $ResNet = File::uploadFile(Request::fileHandle('resnet'), $version_path, array('h5'));
            if ($ResNet['err']) {
                throw new Exception('Oops! ResNet Error: ' . $ResNet['msg']);
            }

            $Yml = File::uploadFile(Request::fileHandle('yml'), $version_path, array('yaml', 'yml'));
            if ($Yml['err']) {
                throw new Exception('Oops! Yml Error: ' . $Yml['msg']);
            }

            if (System::loadModel('ModelsModel')->addModel(basename($Yolo['dat']), basename($ResNet['dat']), basename($Yml['dat']))) {
                Response::json(array(
                    'err' => false,
                    'msg' => 'Added the Model!'
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
