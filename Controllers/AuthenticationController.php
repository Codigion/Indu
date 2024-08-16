<?php
class AuthenticationController
{

      public function signIn()
    {
        try {
            
            if (Validation::isEmpty(Request::post('email'))) {
                throw new Exception('Oops! Incorrect Username.');
            }

            if (Validation::isEmpty(Request::post('password'))) {
                throw new Exception('Oops! Incorrect Password.');
            }

            $result = System::loadModel('AuthenticationModel')->signIn();
            if (isset($result[0])) {
                Session::set('uid', $result[0]->id);
                Session::set('email', $result[0]->email);
                Session::set('role', $result[0]->role);

                Response::json(array(
                    'err' => false,
                    'msg' => 'Welcome, ' . $result[0]->email . '!'
                ));
            } else {
                throw new Exception('Oops! Incorrect credentials.');
            }
        } catch (Exception $e) {
            Response::json(array(
                'err' => true,
                'msg' => $e->getMessage()
            ));
        }
    }

    public function signOut()
    {
        Session::unset('uid');
        Session::unset('name');
        Session::unset('role');
        Session::destroy();
        header("Location: " . Generic::baseURL());
    }


    public function updatePassword()
    {
        try {
            $AuthenticationModel = System::loadModel('AuthenticationModel');

            if (Validation::isEmpty(Request::post('old_password'))) {
                throw new Exception('Oops! Incorrect Old Password.');
            }

            if (Validation::isEmpty(Request::post('password'))) {
                throw new Exception('Oops! Incorrect Current Password.');
            }

            if ((Request::post('password') == Request::post('old_password'))) {
                throw new Exception('Oops! Old Password and New Password cannot be same.');
            }

            if (!Validation::isStrongPassword(Request::post('password'))) {
                throw new Exception('Oops! New Password must be 8 characters long, and it should contain at least 1 uppercase letter, 1 lower case letter, 1 digit (0...9) and 1 special characters (@,#,$, etc.)..');
            }

            // Check: If Password is correct!
            if (!$AuthenticationModel->isUserPassword(Session::get('uid'), Request::post('old_password'))) {
                throw new Exception('Oops! Old Password is incorrect.');
            }


            if ($AuthenticationModel->updatePassword()) {
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

}
