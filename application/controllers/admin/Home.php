<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		admin_logged_in();
		$this->load->helper(array('url', 'html'));
		$this->load->model('model_chart');
		$this->load->model('model_site');
	}

	public function index()
	{

		$isi['content'] 		= 'backend/tampil_content';
		$isi['judul'] 			= 'Home';
		$isi['sub_judul'] 		= '';
		$isi['chart_tahun'] 	= $this->model_chart->jml_tahun();
		$isi['chart_jk'] 		= $this->model_chart->jk();
		$isi['chart_asrama'] 	= $this->model_chart->asrama();
		$isi['jml_testi']		= $this->model_site->count('total_testi');
		$isi['jml_alumni']  	= $this->model_site->count('total_alumni');
		$isi['jml_berita']  	= $this->model_site->count('total_berita');
		$isi['jml_agenda']  	= $this->model_site->count('total_agenda');
		$isi['jml_foto']  		= $this->model_site->count('total_foto');
		$isi['hitung_kerja'] = $this->model_site->hitungkerja();
		$isi['hitung_nganggur'] = $this->model_site->hitungnganggur();
		$this->load->view('backend/tampil_home', $isi);
	}

	public function update()
	{
		$data = array(
			'password'	  	=> md5($this->input->post('password', TRUE))
		);

		$key = $this->input->post('id');

		$this->load->model('model_config');

		$this->model_config->simpan_password($key, $data);
		$this->session->set_flashdata('Info', 'Password berhasil di ubah');

		redirect('admin/config/ubah_profile');
	}
}
