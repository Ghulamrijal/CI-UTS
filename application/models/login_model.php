<?php
class Login_model extends CI_Model{
    //cek nip dan password dosen
    function auth_dosen($username,$password){
        $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }

    function login($user, $pass){
		$this->db->where('username', $user);
        $this->db->where('password', $pass);
		$query = $this->db->get('user')->row();
		return $query;
	}
 
 
}