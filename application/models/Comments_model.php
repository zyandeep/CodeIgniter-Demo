<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

  public function __construct() {
    parent::__construct();

    $this->load->database();
  }

  // Get all comments
  public function get_comments() {

/*     $this->db->order_by('created_at', 'DESC');
$query = $this->db->get('comments'); */

    // Using SQL directly

    $query = $this->db->query('SELECT * FROM comments ORDER BY created_at DESC');
    return $query->result_array(); // array of rows, each row is an assoc. array

    // return $query->result();    // array of rows, each row is an object
  }

  // Insert a comment
  public function insert_comment($data) {

    // $this->db->insert('comments', $data);

    // Using SQL directly
    $sql = 'INSERT INTO comments(user, comment) VALUES(?, ?)';
    $this->db->query($sql, array($data['user'], $data['comment']));

  }

}
