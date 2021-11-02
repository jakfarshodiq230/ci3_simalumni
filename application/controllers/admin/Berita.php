<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		admin_logged_in();
		$this->load->model('model_berita');
		$this->load->helper(array('form','url'));
	}
	
	public function index()
	{
		
		$isi['content'] 	= 'backend/berita/tampil_berita';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'berita';
		$isi['data']		= $this->db->get('berita');

		$this->load->view('backend/tampil_home', $isi);
	}

	public function tambah()
	{
		
		$isi['content'] 	= 'backend/berita/form_tambahberita';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Tambah berita';
		
		$isi['id_berita'] 		= '';
		$isi['judul_berita'] 	= '';
		$isi['penulis'] 		= '';
		$isi['isi'] 			= '';
		$isi['tanggal'] 		= '';
		$isi['gambar'] 			= '';

		$this->load->view('backend/tampil_home', $isi);
	}

	public function simpan()
	{
		$config['upload_path'] = './uploads/berita/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1000'; //KB
		$config['max_width']  = '2000'; //pixels
		$config['max_height']  = '2000'; //pixels
		
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('gambar')){
			$data['id_berita'] 		= $this->input->post('id_berita');
			$data['judul_berita'] 	= $this->input->post('judul_berita');
			$data['penulis'] 		= $this->input->post('penulis');
			$data['isi'] 			= $this->input->post('isi');
			$data['tanggal'] 		= $this->input->post('tanggal');
			
		} else {

			$img=$this->upload->data();
			
			$data['id_berita'] 		= $this->input->post('id_berita');
			$data['judul_berita'] 	= $this->input->post('judul_berita');
			$data['penulis'] 		= $this->input->post('penulis');
			$data['isi'] 			= $this->input->post('isi');
			$data['tanggal'] 		= $this->input->post('tanggal');
			$data['gambar'] 		= $img['file_name'];
		}

		$key= $this->input->post('id_berita'); 
		
		$query = $this->model_berita->getdata($key);
		if($query->num_rows() > 0)
		{
			
			$this->model_berita->getupdate($key,$data);
			$this->session->set_flashdata('Info','Data berhasil di update');
		}else{
			$this->model_berita->getinsert($data);
			$this->session->set_flashdata('Info','Data berhasil di simpan');
		}
		
		redirect('admin/berita/index');
	}

	public function edit()
	{
		
		$isi['content'] 	= 'backend/berita/form_tambahberita';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Edit berita';

		$key = $this->uri->segment(4);
		$this->db->where('id_berita',$key);
		$query = $this->db->get('berita');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['id_berita'] 		= $row->id_berita;
				$isi['judul_berita'] 	= $row->judul_berita;
				$isi['penulis'] 		= $row->penulis;
				$isi['isi'] 			= $row->isi;
				$isi['tanggal'] 		= $row->tanggal;
				$isi['gambar'] 			= $row->gambar;
			}
		}
	else{
		$isi['id_berita'] 		= '';
		$isi['judul_berita'] 	= '';
		$isi['penulis'] 		= '';
		$isi['isi'] 			= '';
		$isi['tanggal'] 		= '';
		$isi['gambar'] 			= '';
	}
	$this->load->view('backend/tampil_home', $isi);
}

public function delete()
{

	$key = $this->uri->segment(4);
	$this->db->where('id_berita',$key);
	$query = $this->db->get('berita');
	if($query->num_rows()>0)
	{
		$this->model_berita->getdelete($key);
	}
	redirect('admin/berita/index');
}

}
?>