<?php
Class pegawai_model extends CI_Model{
	
	function getData()
	{
		$data_pegawai = $this->db->get('pegawai');
		return $data_pegawai->result();
	}
}
?>