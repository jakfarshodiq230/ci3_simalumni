<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_login');
	}

	public function index()
	{
		//Check session
		if($this->session->userdata('username'))
		{
			redirect('admin/home');
		}
	elseif($this->session->userdata('username'))
	{
		redirect('alumni/profile_alumni');
	}
else
{
	
	$this->load->view('frontend/login');
}
}


public function login()
{
	$username  = $this->input->post('username');
	$password  = md5($this->input->post('pass'));

	$cek_admin = $this->model_login->ceknum($username,$password);
	$cek_member = $this->model_login->ceknum_alumni($username,$password);

	if($cek_admin->num_rows() == 1)
	{
		foreach($cek_admin->result() as $row)
		{
			$pass_auth = $row->password;

			if($password == $pass_auth)
			{
				
				$row_data['id'] 	   	= $row->id;
				$row_data['username'] 	= $row->username;
				//$row_data['password'] 	= $row->password;
				
				$this->session->set_userdata($row_data);
				redirect('admin/home');
			}
		else
		{
					//$data['error']='Wrong Password!';
			$this->session->set_flashdata('error','Username / Password Salah.');
			redirect('frontend/login');
		}

	}
}
elseif($cek_member->num_rows() == 1)
{
	foreach($cek_member->result() as $row)
	{
		$pass_auth = $row->password;

		if($password == $pass_auth)
		{
			
			$row_data['id']   = $row->id;
			$row_data['username'] = $row->username;
			
			$this->session->set_userdata($row_data);
			redirect('alumni/profile_alumni');
		}
	else
	{
					//$data['error']='Wrong Password!';
		$this->session->set_flashdata('error','username / Password Salah.');
		redirect('frontend/login');
	}

}
}
else
{
			//$data['error']='Wrong Username!';
	$this->session->set_flashdata('error','Username / Password Salah.');
	redirect('frontend/login');
}

}

public function logout()
{
	$this->session->sess_destroy();
	redirect('frontend/login');
}

// cek alumni
public function daftar_alumni()
{
	$nim  = $this->input->post('nim');
	$hasil_alumni = $this->model_login->cek_alumni($nim);
	echo json_encode($hasil_alumni);
}

}
