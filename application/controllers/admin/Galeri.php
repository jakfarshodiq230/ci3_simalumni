<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		admin_logged_in();
		$this->load->model('model_galeri');
	}

	public function index()
	{
		
		$isi['content'] 	= 'backend/galeri/tampil_datagaleri';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Galeri';
		$isi['data']		= $this->db->get('galeri');
		$this->load->view('backend/tampil_home', $isi);
	}

	public function tambah()
	{
		
		$isi['content'] 	= 'backend/galeri/form_uploadgaleri';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Upload Foto';

		$key = $this->uri->segment(4);

		$this->db->where('id_album',$key);
		$query = $this->db->get('album');
		
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['id_album'] 		= $row->id_album;
				$isi['nama_album'] 		= $row->nama_album;
			}
		}else{
			$isi['id_album'] 		= '';
			$isi['nama_album'] 		= '';
		}

		$this->load->view('backend/tampil_home', $isi);
	}

	public function upload()
	{
		$config['upload_path'] = './uploads/galeri/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1000'; //KB
		$config['max_width']  = '2000'; //pixels
		$config['max_height']  = '2000'; //pixels
		
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('gambar')){
			$error=array('error'=>$this->upload->display_errors());
			echo $error['error'];
		} else {

			$img=$this->upload->data();
			
			$data['id_galeri'] 		= $this->input->post('id_galeri');
			$data['judul'] 			= $img['file_name'];
			$data['gambar'] 		= $img['file_name'];
			$data['id_album'] 		= $this->input->post('id_album');

			$this->model_galeri->getinsert($data);
		}
	}

	public function delete()
	{

		$key = $this->uri->segment(4);
		$this->db->where('id_galeri',$key);
		$query = $this->db->get('galeri');
		if($query->num_rows()>0)
		{
			$this->model_galeri->getdelete($key);
		}
		redirect('admin/album');
	}
}
