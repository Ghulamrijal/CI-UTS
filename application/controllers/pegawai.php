<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('pegawai_model');
    }

	public function index()	{
         $data['users'] = $this->pegawai_model->getAllpegawai();
		$this->load->view('pegawai/pegawai', $data);
	}

    public function add_pegawai() {
        $this->load->view('pegawai/add');
    }

    function tambah(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');
        $email = $this->input->post('email');
        $umur = $this->input->post('umur');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'jabatan' => $jabatan,
            'email' => $email,
            'umur' => $umur
			);
		$this->pegawai_model->input_data($data);
		redirect('pegawai');
	}

    function edit_pegawai($id){
		$data['pegawai'] = $this->pegawai_model->getdataid($id);
		$this->load->view('pegawai/edit',$data);
	}

    function edit(){
        $id = $this->input->post('idpegawai');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');
        $email = $this->input->post('email');
        $umur = $this->input->post('umur');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'jabatan' => $jabatan,
            'email' => $email,
            'umur' => $umur
			);

		$where = array('pegawai' => $id);
		$this->pegawai_model->edit_data($id,$data);
		redirect('pegawai');
	}

	function hapus($id){
		$this->pegawai_model->hapus_data($id);
		redirect('pegawai');
	}


}
