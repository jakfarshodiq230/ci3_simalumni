<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	function __construct() {
		parent::__construct();
		admin_logged_in();
		$this->load->model('model_testimoni');
	}

	public function index()
	{
		
		$isi['content'] 	= 'backend/testimoni/tampil_testimoni';
		$isi['judul'] 		= 'Home';
		$isi['sub_judul'] 	= 'Testimoni';
		$isi['data']		= $this->db->get('testimoni');
		$this->load->view('backend/tampil_home', $isi);
	}

	public function simpan()
	{	
		$config['upload_path'] = './uploads/testimoni/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1000'; //KB
		$config['max_width']  = '2000'; //pixels
		$config['max_height']  = '2000'; //pixels
		
		$this->upload->initialize($config);
		$key= $this->input->post('id_testimoni');

		if(!$this->upload->do_upload('foto')){
			$data['id_testimoni'] 		= $this->input->post('id_testimoni');
			$data['nama'] 				= $this->input->post('nama');
			$data['isi_testimoni'] 		= $this->input->post('isi_testimoni');
			$data['publish'] 			= $this->input->post('publish');
		} else {

			$img=$this->upload->data();
			
			$data['id_testimoni'] 		= $this->input->post('id_testimoni');
			$data['nama'] 				= $this->input->post('nama');
			$data['isi_testimoni'] 		= $this->input->post('isi_testimoni');
			$data['foto'] 				= $img['file_name'];
			$data['keterangan'] 		= $this->input->post('keterangan');
			$data['publish'] 			= $this->input->post('publish');
		}
		
		$query = $this->model_testimoni->getdata($key);
		if($query->num_rows() > 0)
		{
			
			$this->model_testimoni->getupdate($key,$data);
			$this->session->set_flashdata('Info','Data berhasil di update');
			redirect('admin/testimoni');
		}else{
			$this->model_testimoni->getinsert($data);
			$this->session->set_flashdata('Info','Pesan berhasil di kirim');
			redirect('frontend');
		}
		
	}

	public function edit()
	{
		
		$key= $this->input->post('id_testimoni');

		$data['publish'] 	= $this->input->post('publish');

		$query = $this->model_testimoni->getdata($key);
		if($query->num_rows() > 0)
		{
			
			$this->model_testimoni->getupdate($key,$data);
			$this->session->set_flashdata('Info','Data berhasil di update');
		}else{
			$this->model_testimoni->getinsert();
		}

		redirect('admin/testimoni');
	}

	public function delete()
	{
		

		$key = $this->uri->segment(4);
		$this->db->where('id_testimoni',$key);
		$query = $this->db->get('testimoni');
		if($query->num_rows()>0)
		{
			$this->model_testimoni->getdelete($key);
		}
		redirect('admin/testimoni');
	}
}
