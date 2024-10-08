<?php

/**
 * Portal Controller
 *
 * This controller handles the main portal page.
 */
class Portal extends Controller
{

    public function index()
    {
        self::logSession();
        self::checkSession();

        $this->layout('Header');
        $this->view('Welcome', array());
        $this->layout('Footer');
    }

    public function activity()
    {
        self::logSession();

        if (!Cookie::cookieExists('cid')) {
            header("Location: " . Generic::baseURL() . "/");
        }

        $username = System::loadModel('UsersModel')->getUserName(Cookie::get('cid'));
        $model = System::loadModel('ModelsModel')->getActiveModel();
        if (empty($model[0])) {
            header("Location: " . Generic::baseURL() . "/404");
        }
        $this->layout('Header',array('username' => $username));
        $this->view('activity', array('models' => $model));
        $this->layout('Footer');
    }

    public function contact()
    {
        self::logSession();

        $this->layout('Header');
        $this->view('contact', array());
        $this->layout('Footer');
    }

    public function about()
    {
        self::logSession();

        $this->layout('Header');
        $this->view('about', array());
        $this->layout('Footer');
    }

    public function privacy()
    {
        self::logSession();

        $this->layout('Header');
        $this->view('privacy', array());
        $this->layout('Footer');
    }

    public function terms_condition()
    {
        self::logSession();

        $this->layout('Header');
        $this->view('termsCondition', array());
        $this->layout('Footer');
    }
    public function faq()
    {
        self::logSession();

        $this->layout('Header');
        $this->view('faq', array());
        $this->layout('Footer');
    }
    public function notFound()
    {
        self::logSession();

        $this->layout('Header');
        $this->view('404', array());
        $this->layout('Footer');
    }
    public function ourTeam()
    {
        self::logSession();

        $this->layout('Header');
        $this->view('team', array());
        $this->layout('Footer');
    }


    public static function checkSession()
    {
        if (Cookie::cookieExists('name')) {
            header("Location: " . Generic::baseURL() . "/activity");
        }
    }

    /**
     * Log Session
     */
    public function logSession()
    {
        System::loadModel('DashboardModel')->logVisitor();
    }
}
