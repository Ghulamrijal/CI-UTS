<?php
// class Login extends CI_Controller{
//     function __construct(){
//         parent::__construct();
//         $this->load->model('login_model');
//     }
 
    // function index(){
    //     if ($this->session->userdata('masuk')== TRUE) {
    //         redirect(base_url().'users');
    //     }else {
    //     $this->load->view('login');
    //     }
    // }
 
//     function auth(){
//         $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
//         $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
//         $cek_role=$this->login_model->auth_dosen($username,$password);
 
//         if($cek_role->num_rows() > 0){ 
//                         $data=$cek_role->row_array();
//                 $this->session->set_userdata('masuk',TRUE);
//                  if($data['role']=='ADMIN'){ 
//                     $this->session->set_userdata('akses','1');
//                     $this->session->set_userdata('ses_id',$data['iduser']);
//                     $this->session->set_userdata('ses_nama',$data['nama']);
//                     redirect('pegawai');
 
//                  }else{ 
//                     $this->session->set_userdata('akses','2');
//                                 $this->session->set_userdata('ses_id',$data['iduser']);
//                     $this->session->set_userdata('ses_nama',$data['nama']);
//                     redirect('users');
//                  }
 
//         }
 
//     }
 
//     public function logout(){
//         $this->load->library('session');
//         $this->session->set_userdata('masuk', FALSE);
//         $this->session->sess_destroy();
//         $this->load->view('login');

//     }
 
// }


class Login extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');

	}

	function index(){
		if ($this->session->userdata('logged_in') == 1) {
			redirect(base_url() .'users');
		}else{
			$this->auth();	
		}
	}

	function auth(){
		if ($this->input->post()) {
			$login = $this->login_model->login($this->input->post('username'), $this->input->post('password')); 
				if ($login == NULL) {
					redirect(base_url() .'login');
				}else {
				$this->session->set_userdata(array(
					'iduser' => $login->iduser,
					'role' => $login->role,
					'logged_in' => 1));
					redirect(base_url() .'users');
			}
		} else {
			$this->load->view('login');
		}
	}

	function logout(){
		$this->session->unset_userdata('iduser');
		$this->session->unset_userdata('logged_in');
		session_destroy();
		$this->load->view('login');
	}
}