<?php
class SettingsController
{
    public function updateSettings()
    {
        try {


            if (
                !Validation::isNumeric(Request::post('threshold')) ||
                Request::post('threshold') <= 0
            ) {
                throw new Exception('Oops! Incorrect Threshold.');
            }
            if (
                !Validation::isNumeric(Request::post('temperature')) ||
                Request::post('temperature') <= 0
            ) {
                throw new Exception('Oops! Incorrect Temperature.');
            }

            if (System::loadModel('SettingsModel')->updateSettings()) {
                Response::json(array(
                    'err' => false,
                    'msg' => 'Updated!'
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

    public function getAllSetting()
    {
        try {
          
            $result = System::loadModel('SettingsModel')->getAllSetting();
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
