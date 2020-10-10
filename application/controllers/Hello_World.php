<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello_World extends CI_Controller
{
    private $language;

    public function __construct()
    {
        // MUST call parent's constructor
        parent::__construct();

        // load models
        $this->load->model('hello_model');

        /*
        Check application language and
        Load appropriate language files
         */

        $this->language = $this->session->userdata('language') ?? $this->config->item('language');
        $this->lang->load(array('general', 'message', 'form_validation_lang'), $this->language);
    }

    public function index()
    {
        // Cache this Page for 2min
        // $this->output->cache(2);
        /*  $this->load->helper('my_helper');
        debug_to_console('hi from php'); */

        $this->load->library('http_library');

        $data = array('content' => $this->hello_model->get_home_data());

        // Get dashboard data
        $result = $this->http_library->get_dashboard_data();
        $data['dashboard'] = $result;

        // Render views
        $this->load->view('includes/header', array('title' => 'CI Demo | Home', 'language' => $this->language));
        $this->load->view('home', $data);
        $this->load->view('includes/footer.php');

    }

    public function about_us()
    {
        $data = array('content' => $this->hello_model->get_about_us_data());

        // Render views
        $this->load->view('includes/header', array('title' => 'CI Demo | About Us', 'language' => $this->language));
        $this->load->view('about_us', $data);
        $this->load->view('includes/footer.php');

    }
}
