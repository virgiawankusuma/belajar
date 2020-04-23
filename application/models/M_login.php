<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function getlogin($user, $pass)
	{
		$u = $user;
		$p = md5($pass);

		$cek_login = $this->db->get_where('user', array('username' => $u, 'password' => $p));

		if ($cek_login->num_rows() > 0) {
			$data = $cek_login->row();
			if ($data->username == $u && $data->password == $p) {
				{
					$sess = array(
						'iduser'	=> $data->iduser,
						'nama' 		=> $data->nama,
						'username' 	=> $data->username,
					);
					$this->session->set_userdata($sess);
					redirect('dashboard', 'refresh');
				}
			}
		}else {
			redirect('login','refresh');
		}
	}

}