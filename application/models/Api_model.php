<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
  public function get_users()
  {
      return $this->db->get('users')->result_array();
  }

  public function get_users_by_id($id)
  {
    return $this->db->where('id', $id)->get('users')->row();
  }
}
