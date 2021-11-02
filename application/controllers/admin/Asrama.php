<?php
defined('BASEPATH') or exit('No direct script access allowed');

class asrama extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		admin_logged_in();
		$this->load->model('Model_asrama');
	}

	public function index()
	{

		$isi['content'] 	= 'backend/asrama/tampil_dataasrama';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'jurusan';

		$isi['data']		= $this->db->get('asrama');

		$this->load->view('backend/tampil_home', $isi);
	}

	public function tambah()
	{

		$isi['content'] 	= 'backend/asrama/form_tambahasrama';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Tambah asrama';

		$isi['id_asrama'] 			= '';
		$isi['nama_asrama'] 		= '';
		$isi['singkatan'] 			= '';

		$this->load->view('backend/tampil_home', $isi);
	}

	public function simpan()
	{
		$data = array(
			'nama_asrama'  => $this->input->post('nama_asrama', TRUE),
			'singkatan'  	=> $this->input->post('singkatan', TRUE)
		);

		$key = $this->input->post('id_asrama');

		$query = $this->Model_asrama->getdata($key);
		if ($query->num_rows() > 0) {

			$this->Model_asrama->update($key, $data);
			$this->session->set_flashdata('Info', 'Data berhasil di update');
		} else {
			$this->Model_asrama->simpan($data);
			$this->session->set_flashdata('Info', 'Data berhasil di simpan');
		}

		redirect('admin/asrama');
	}

	public function edit()
	{

		$isi['content'] 	= 'backend/asrama/form_tambahasrama';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Edit asrama';

		$key = $this->uri->segment(4);
		$this->db->where('id_asrama', $key);
		$query = $this->db->get('asrama');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$isi['id_asrama'] 				= $row->id_asrama;
				$isi['nama_asrama'] 			= $row->nama_asrama;
				$isi['singkatan'] 				= $row->singkatan;
			}
		} else {
			$isi['id_asrama'] 				= '';
			$isi['nama_asrama'] 			= '';
			$isi['singkatan'] 				= '';
		}
		$this->load->view('backend/tampil_home', $isi);
	}
}
