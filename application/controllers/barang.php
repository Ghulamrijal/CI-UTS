<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('barang_model');
    }

	public function index()	{
         $data['users'] = $this->barang_model->getAllbarang();
		$this->load->view('barang/barang', $data);
	}

    public function add_barang() {
        $data['pegawai'] = $this->barang_model->listpegawai();
        $this->load->view('barang/add', $data);
    }

    function tambah(){
		$idpegawai = $this->input->post('idpegawai');
		$namabarang = $this->input->post('nama_brg');
		$spesifikasi = $this->input->post('spesifikasi');
 
		$data = array(
			'idpegawai' => $idpegawai,
			'nama_brg' => $namabarang,
			'spesifikasi' => $spesifikasi
			);
		$this->barang_model->input_data($data);
		redirect('barang');
	}

    function edit_barang($id){
		$data['barang'] = $this->barang_model->getdataid($id);
        // print_r( $this->barang_model->getdataid($id));
        // exit;
		$this->load->view('barang/edit',$data);
	}

    function edit(){
        $idpegawai = $this->input->post('idpegawai');
        $id = $this->input->post('idbarang');
		$namabarang = $this->input->post('nama_brg');
		$spesifikasi = $this->input->post('spesifikasi');
 
		$data = array(
			'idpegawai' => $idpegawai,
            'idbarang' => $id,
			'nama_brg' => $namabarang,
			'spesifikasi' => $spesifikasi
			);

		$this->barang_model->edit_data($id,$data);
		redirect('barang');
	}

	function hapus($id){
		$this->barang_model->hapus_data($id);
		redirect('barang');
	}


}
