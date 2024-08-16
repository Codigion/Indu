<?php

/**
 * Portal Controller
 *
 * This controller handles the main portal page.
 */

class Admin extends Controller
{

    public function admin_login()
    {
        $this->layout('admin/Header');

        $this->view('admin/login', array());
    }

    public function dashboard()
    {
        self::checkSession();

        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'dashboard'));
        $this->view('admin/dashboard', array());
        $this->layout('admin/Footer');
    }

    public function users()
    {
        self::checkSession();

        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'users'));
        $this->view('admin/users', array());
        $this->layout('admin/Footer');
    }

    public function activities()
    {
        self::checkSession();

        $result = System::loadModel('UsersModel')->getUserDetails(Request::get('id'));
        if (empty($result[0])) {
            header("Location: " . Generic::baseURL());
        }

        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'activities'));
        $this->view('admin/activities', array('activities' => $result));
        $this->layout('admin/Footer');
    }

    public function models()
    {
        self::checkSession();

        $result = System::loadModel('ModelsModel')->getAllModel();
        if (empty($result[0])) {
            header("Location: " . Generic::baseURL());
        }

        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'models'));
        $this->view('admin/models', array('models' => $result));
        $this->layout('admin/Footer');
    }

    public function database()
    {
        self::checkSession();

        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'database'));
        $this->view('admin/database', array());
        $this->layout('admin/Footer');
    }
    public function accountSettings()
    {
        self::checkSession();

        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'accountSettings'));
        $this->view('admin/accountSettings', array());
        $this->layout('admin/Footer');
    }
    public function modelSettings()
    {

        self::checkSession();

        $result = System::loadModel('SettingsModel')->getAllSetting();
        if (empty($result[0])) {
            header("Location: " . Generic::baseURL());
        }

        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'modelSettings'));
        $this->view('admin/modelSettings', array('settings' => $result[0]));
        $this->layout('admin/Footer');
    }
    public function contacted()
    {
        self::checkSession();

        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'contacted'));
        $this->view('admin/contacted', array());
        $this->layout('admin/Footer');
    }

    public function signOut()
    {
        Session::unset('uid');
        Session::unset('email');
        Session::unset('role');
        Session::destroy();
        header("Location: " . Generic::baseURL() . "/admin");
    }

    public static function checkSession()
    {
        if (!Session::has('uid')) {
            header("Location: " . Generic::baseURL());
        }
    }
}
