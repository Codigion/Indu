<?php
class DatabaseController
{
   



    public function getAllDatabase()
    {
        try {

            $result = System::loadModel('DatabaseModel')->getAllDatabase();
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
