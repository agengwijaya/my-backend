<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
  public function get_users() {
    return $this->db->get('users')->result_array();
  }
}
