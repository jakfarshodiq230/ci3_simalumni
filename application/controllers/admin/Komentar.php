<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	function __construct() {
        parent::__construct();
		admin_logged_in();
        $this->load->model('model_komentar');
    }

	public function index()
	{
		
		$isi['content'] 	= 'backend/komentar/tampil_komentar';
		$isi['judul'] 		= 'Home';
		$isi['sub_judul'] 	= 'Komentar';
		$isi['data']		= $this->db->get('komentar');
		$this->load->view('backend/tampil_home', $isi);
	}

	public function simpan()
	{
		$data = array(
			'publish'=>$this->input->post('publish', TRUE)
		);

		$key= $this->input->post('id_komentar');

		$query = $this->model_komentar->getdata($key);
		if($query->num_rows() > 0)
		{
		
		$this->model_komentar->update($key,$data);
		$this->session->set_flashdata('Info','Data berhasil di update');
		}else{
		$this->model_komentar->simpan();
		}

        redirect('admin/komentar');
    }

	public function delete()
	{

	$key = $this->uri->segment(4);
	$this->db->where('id_komentar',$key);
	$query = $this->db->get('komentar');
	if($query->num_rows()>0)
	{
		$this->model_komentar->delete_komentar($key);
	}
	redirect('admin/komentar');
	}
}
