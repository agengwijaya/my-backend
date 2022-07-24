<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Api_model');
  }

  public function users_get()
  {
    $this->benchmark->mark('code_start');
    $id = $this->get('id');

    if ($id === null) {
      $users = $this->Api_model->get_users();
    } else {
      $users = $this->Api_model->get_users_by_id($id);
    }

    if ($users) {
      $this->benchmark->mark('code_end');
      $duration = $this->benchmark->elapsed_time('code_start', 'code_end');
      $this->response([
        'status' => true,
        'message' => 'Data found',
        'data' => $users,
        'duration' => $duration,
      ], 200);
    } else {
      $this->benchmark->mark('code_end');
      $duration = $this->benchmark->elapsed_time('code_start', 'code_end');
      $this->response([
        'status' => false,
        'message' => 'No users were found',
        'data' => null,
        'duration' => $duration,
      ], 404);
    }
  }
}
