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
        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'dashboard'));
        $this->view('admin/dashboard', array());
        $this->layout('admin/Footer');
    }

    public function users()
    {
        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'users'));
        $this->view('admin/users', array());
        $this->layout('admin/Footer');
    }

    public function activities()
    {
        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'activities'));
        $this->view('admin/activities', array());
        $this->layout('admin/Footer');
    }

    public function models()
    {
        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'models'));
        $this->view('admin/models', array());
        $this->layout('admin/Footer');
    }

    public function settings()
    {
        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'settings'));
        $this->view('admin/settings', array());
        $this->layout('admin/Footer');
    }
    public function accountSettings()
    {
        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'accountSettings'));
        $this->view('admin/accountSettings', array());
        $this->layout('admin/Footer');
    }
    public function contacted()
    {
        $this->layout('admin/Header');
        $this->layout('admin/Nav', array('nav' => 'contacted'));
        $this->view('admin/contacted', array());
        $this->layout('admin/Footer');
    }

    public function signOut()
    {
        header("Location: " . Generic::baseURL());
    }
    public static function checkSession()
    {
        if (!Session::has('uid')) {
            header("Location: " . Generic::baseURL());
        }
        if (!Session::has('role')) {
            header("Location: " . Generic::baseURL());
        }
    }
}
