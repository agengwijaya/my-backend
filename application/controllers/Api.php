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
    // Users from a data store e.g. database
    $users = $this->Api_model->get_users();

    $id = $this->get( 'id' );

    if ( $id === null )
    {
        // Check if the users data store contains users
        if ( $users )
        {
            // Set the response and exit
            $this->response( $users, 200 );
        }
        else
        {
            // Set the response and exit
            $this->response( [
                'status' => false,
                'message' => 'No users were found'
            ], 404 );
        }
    }
    else
    {
        if ( array_key_exists( $id, $users ) )
        {
            $this->response( $users[$id], 200 );
        }
        else
        {
            $this->response( [
                'status' => false,
                'message' => 'No such user found'
            ], 404 );
        }
    }

  }
}
