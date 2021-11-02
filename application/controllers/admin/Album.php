<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		admin_logged_in();
		$this->load->helper(array('form','url'));
		$this->load->model('model_album');
	}

	public function index()
	{
		$isi['content'] 	= 'backend/album/tampil_dataalbum';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Album';
		$isi['data']		= $this->db->get('album');
		$this->load->view('backend/tampil_home', $isi);
	}

	public function tambah()
	{
		
		$isi['content'] 	= 'backend/album/form_tambahalbum';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Tambah Album';
		
		$isi['id_album'] 		= '';
		$isi['nama_album'] 		= '';

		$this->load->view('backend/tampil_home', $isi);
	}

	public function simpan()
	{
		$key= $this->input->post('id_album');
		
		$data['id_album'] 		= $this->input->post('id_album');
		$data['nama_album'] 	= $this->input->post('nama_album');

		$query = $this->model_album->getdata($key);
		if($query->num_rows() > 0)
		{
			
			$this->model_album->getupdate($key,$data);

		}else{
			$this->model_album->getinsert($data);
		}

		redirect('admin/album/index');
	}

	public function edit()
	{
		
		$isi['content'] 	= 'backend/album/form_tambahalbum';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Edit Album';

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

	public function delete()
	{
		
		$this->load->model('model_album');

		$key = $this->uri->segment(4);
		$this->db->where('id_album',$key);
		$query = $this->db->get('album');
		if($query->num_rows()>0)
		{
			$this->model_album->getdelete($key);
		}
		redirect('admin/album');
	}

	public function lihatgaleri(){
		$isi['content'] 	= 'backend/galeri/tampil_datagaleri';
		$isi['judul'] 		= 'Home';
		$isi['sub_judul'] 	= 'Galeri';
		
		$key = $this->uri->segment(4);
		$isi['data']	= $this->model_album->lihat_galeri($key);

		$this->db->where('id_galeri',$key);
		$query = $this->db->get('galeri');

		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['id_galeri'] 		= $row->id_galeri;
				$isi['judul_galeri'] 	= $row->judul;
				$isi['gambar'] 			= $row->gambar;
				$isi['id_album'] 		= $row->id_album;
			}
		}
	else{
		$isi['id_galeri'] 		= '';
		$isi['judul_galeri'] 	= '';
		$isi['gambar'] 			= '';
		$isi['id_album'] 		= '';
	}

	$this->load->view('backend/tampil_home', $isi);
}
}
