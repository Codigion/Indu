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

        self::checkSession();

        $this->layout('Header');
        $this->view('Welcome', array());
        $this->layout('Footer');
    }

    public function activity()
    {


        $result = System::loadModel('ModelsModel')->getActiveModel();
        if (empty($result[0])) {
            header("Location: " . Generic::baseURL() . "/404");
        }

        $this->layout('Header');
        $this->view('activity', array('models' => $result));
        $this->layout('Footer');
    }

    public function contact()
    {
        $this->layout('Header');
        $this->view('contact', array());
        $this->layout('Footer');
    }

    public function about()
    {
        $this->layout('Header');
        $this->view('about', array());
        $this->layout('Footer');
    }

    public function privacy()
    {
        $this->layout('privacy');
        $this->view('contact', array());
        $this->layout('Footer');
    }

    public function terms_condition()
    {
        $this->layout('Header');
        $this->view('termsCondition', array());
        $this->layout('Footer');
    }
    public function faq()
    {

        $this->layout('Header');
        $this->view('faq', array());
        $this->layout('Footer');
    }
    public function notFound()
    {

        $this->layout('Header');
        $this->view('404', array());
        $this->layout('Footer');
    }


    public static function checkSession()
    {
        if (Cookie::cookieExists('cid')) {
            header("Location: " . Generic::baseURL() . "/activity");
        }
    }
}
