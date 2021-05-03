<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

	public function getAllpegawai(){
        $query = $this->db->get('pegawai');
        return $query->result();

	}

    function input_data($data){
		$this->db->insert('pegawai',$data);
	}

    public function getdataid($id){
        $this->db->where('idpegawai', $id);
        $query = $this->db->get('pegawai');
        return $query->result();

	}

    function edit_data($id,$data){
		$this->db->where('idpegawai', $id);
		$this->db->update('pegawai',$data);
	}	

    function hapus_data($id){
        $this->db->where('idpegawai', $id);
        $this->db->delete('pegawai');
    }


}