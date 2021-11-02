<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		admin_logged_in();
		$this->load->model('model_config');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{

		$isi['content'] 	= 'backend/config/tampil_config';
		$isi['judul'] 		= 'Home';
		$isi['sub_judul'] 	= 'Config';
		$isi['data']		= $this->model_config->get_config();
		$isi['foto_header']	= $this->model_config->get_config_foto_header();
		$isi['foto_kepsek']	= $this->model_config->get_config_foto_kepsek();
		$isi['foto_slider1'] = $this->model_config->get_config_foto_slider1();
		$isi['foto_slider2'] = $this->model_config->get_config_foto_slider2();
		$this->load->view('backend/tampil_home', $isi);
	}

	public function tambahadmin()
	{

		$isi['content'] 	= 'backend/config/form_tambahconfig';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Tambah admin';

		$isi['id_config'] 			= '';
		$isi['username'] 		= '';
		$isi['password'] 			= '';

		$this->load->view('backend/tampil_home', $isi);
	}

	function simpanadmin()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$telp = $this->input->post('telp');

		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => md5($password),
			'telp' => $telp
		);
		$this->model_config->simpanadmin($data, 'admin');
		redirect('admin/config');
	}

	public function ubah_profile()
	{

		$isi['content'] 	= 'backend/config/form_ubah_profile';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Ubah Profile';

		$key = $this->uri->segment(4);
		$this->db->where('id', $key);
		$query = $this->db->get('admin');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$isi['id'] 				= $row->id;
				$isi['nama'] 			= $row->nama;
				$isi['username'] 		= $row->username;
				$isi['username'] 		= $row->username;
				$isi['password'] 		= $row->password;
				$isi['telp'] 			= $row->telp;
				$isi['foto'] 			= $row->foto;
			}
		} else {
			$isi['id'] 				= "";
			$isi['nama'] 			= "";
			$isi['username'] 		= "";
			$isi['password'] 		= "";
			$isi['telp'] 			= "";
			$isi['foto'] 			= "";
		}

		$this->load->view('backend/tampil_home', $isi);
	}

	public function simpan_profile()
	{
		$config['upload_path'] = './uploads/foto_user/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']	= '1000'; //KB
		$config['max_width']  = '2000'; //pixels
		$config['max_height']  = '2000'; //pixels

		$this->upload->initialize($config);

		$key = $this->input->post('id');

		if (!$this->upload->do_upload('foto')) {
			$data['id'] 			= $this->input->post('id');
			$data['nama'] 			= $this->input->post('nama');
			$data['username'] 		= $this->input->post('username');
			$data['telp'] 			= $this->input->post('telp');
		} else {

			$img = $this->upload->data();

			$data['id'] 			= $this->input->post('id');
			$data['nama'] 			= $this->input->post('nama');
			$data['username'] 		= $this->input->post('username');
			$data['telp'] 			= $this->input->post('telp');
			$data['foto'] 			= $img['file_name'];
		}

		$this->model_config->getupdate($key, $data);
		$this->session->set_flashdata('Info', 'Data berhasil di update');

		redirect('admin/config/ubah_profile');
	}

	public function simpan()
	{
		$data = array(
			'content'	  	=> $this->input->post('konten', TRUE)
		);

		$key = $this->input->post('id_config');

		$this->model_config->update($key, $data);
		$this->session->set_flashdata('Info', 'Data berhasil di update');

		redirect('admin/config');
	}

	public function edit()
	{

		$isi['content'] 	= 'backend/config/form_editconfig';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Edit Config';

		$key = $this->uri->segment(4);
		$this->db->where('id_config', $key);
		$query = $this->db->get('config');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$isi['id_config'] 		= $row->id_config;
				$isi['title'] 			= $row->title;
				$isi['konten'] 			= $row->content;
			}
		} else {
			$isi['id_config'] 		= '';
			$isi['title'] 			= '';
			$isi['konten'] 			= '';
		}
		$this->load->view('backend/tampil_home', $isi);
	}

	public function delete()
	{

		$key = $this->uri->segment(4);
		$this->db->where('id_config', $key);
		$query = $this->db->get('config');
		if ($query->num_rows() > 0) {
			$this->model_config->delete_config($key);
		}
		redirect('admin/config');
	}

	function cek_status_username()
	{
		$username = $_POST['username'];

		$hasil_username = $this->model_config->cek_username($username);

		if (count($hasil_username) != 0) {
			echo "1";
		} else {
			echo "2";
		}
	}

	public function ubah_foto()
	{
		$config['upload_path'] = './uploads/web/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1000'; //KB
		$config['max_width']  = '2000'; //pixels
		$config['max_height']  = '2000'; //pixels

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('konten')) {
			$this->session->set_flashdata('error', 'Foto gagal di update');
			redirect('admin/config');
		} else {

			$img = $this->upload->data();
			$key = $this->input->post('id_config');

			$data['id_config'] 		= $this->input->post('id_config');
			$data['content'] 		= $img['file_name'];
		}
		$query = $this->model_config->getdata($key);

		$this->model_config->getupdate_foto_config($key, $data);
		$this->session->set_flashdata('Info', 'Foto berhasil di update');

		redirect('admin/config');
	}
}
