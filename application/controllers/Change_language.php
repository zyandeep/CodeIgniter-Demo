<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Change_language extends CI_Controller
{
    public function __construct()
    {
        // MUST call parent's constructor
        parent::__construct();
    }

    public function switch_lanuage()
    {
        $language = $this->input->post('language', true);
        $redirect_url = $this->input->post('redirect-url', true);

        // Store the language in the session
        $this->session->set_userdata('language', $language);

        // Redirect to 'redirect_url' URL
        redirect($redirect_url);
    }
}
