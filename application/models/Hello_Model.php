<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello_Model extends CI_Model {

  public function __construct() {
    // MUST call parent's constructor
    parent::__construct();
  }

  public function get_home_data() {
    return $this->lang->line('msg_welcome');
  }

  public function get_about_us_data() {
    return $this->lang->line('about_content');
  }
}
