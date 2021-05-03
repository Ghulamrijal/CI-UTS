<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

	public function getAllbarang(){
        $this->db->from('barangs');
        $this->db->join('pegawai', 'pegawai.idpegawai = barangs.idpegawai');
        $query = $this->db->get();
        return $query->result();

	}

    public function listpegawai(){
        $query = $this->db->get('pegawai');
        return $query->result();

	}

    
    function input_data($data){
		$this->db->insert('barangs',$data);
	}

    public function getdataid($id){
        $this->db->from('barangs');
        $this->db->join('pegawai', 'pegawai.idpegawai = barangs.idpegawai');
        $this->db->where('barangs.idbarang', $id);
        $query = $this->db->get();
        return $query->result();

	}

    function edit_data($id,$data){
		$this->db->where('idbarang', $id);
		$this->db->update('barangs',$data);
	}	

    function hapus_data($id){
        $this->db->where('idbarang', $id);
        $this->db->delete('barangs');
    }


}