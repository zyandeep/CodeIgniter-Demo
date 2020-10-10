<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comments extends CI_Controller
{
    private $language;

    public function __construct()
    {
        // MUST call parent's constructor

        parent::__construct();

        // load models
        $this->load->model('Mongo_model');

        // Load helper
        $this->load->helper('form');

        // Load library
        $this->load->library(array('form_validation', 'session'));

        /*
        Check application language and
        Load appropriate language files
         */

        $this->language = $this->session->userdata('language') ?? $this->config->item('language');
        $this->lang->load(array('general', 'message', 'form_validation_lang'), $this->language);

    }

    public function index()
    {
        // $comments_arr = $this->Comments_model->get_comments();
        // pre($data);

        $comments_arr = $this->Mongo_model->get_comments();

        // Render views
        $this->load->view('includes/header', array('title' => 'CI Demo | Comments', 'language' => $this->language));
        $this->load->view('comments', array('comments' => $comments_arr));
        $this->load->view('includes/footer.php');
    }

    public function insert()
    {

        // Add Form Validation Library
        $this->form_validation->set_rules('name', 'lang:form_username_label', 'trim|required', array(
            'trim' => $this->lang->line('username_err_msg'),
            'required' => $this->lang->line('username_err_msg'),
        ));
        $this->form_validation->set_rules('comment', 'lang:form_comment_label', 'trim|required|max_length[200]', array(
            'trim' => $this->lang->line('comment_err_msg'),
            'required' => $this->lang->line('comment_err_msg'),
            'max_length' => $this->lang->line('comment_err_msg'),
        ));

        if ($this->form_validation->run() === false) {
            $this->index();

            // redirect('comments');
        } else {

            // Get data from POST Request

            $data = array(
                'user' => $this->input->post('name', true),
                'comment' => $this->input->post('comment', true),
                'created_at' => new MongoDB\BSON\UTCDateTime(strtotime('now') * 1000),
            );

            // Insert into DB
            // $this->Comments_model->insert_comment($data);

            $this->Mongo_model->insert_comment($data);

            // Use Flashdata to display Success message
            $this->session->set_flashdata('message', $this->lang->line('form_success'));

            // Try Redirecting User
            redirect(site_url('comments'));

        }

    }
}
