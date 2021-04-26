<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

	public function getAllUsers(){
        $query = $this->db->get('pegawai');
        return $query->result();

	}
}
