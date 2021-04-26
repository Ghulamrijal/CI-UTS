<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('users_model');
    }

	public function index()	{
         $data['users'] = $this->users_model->getAllUsers();
        //  print_r($this->users_model->getAllUsers());
        //  exit;
		$this->load->view('dashbord', $data);
	}
}
