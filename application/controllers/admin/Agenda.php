<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		admin_logged_in();
		$this->load->helper(array('form','url'));
		$this->load->model('model_agenda');
	}
	
	public function index()
	{
		$isi['content'] 	= 'backend/agenda/tampil_agenda';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Agenda';
		$isi['data']		= $this->db->get('agenda');

		$this->load->view('backend/tampil_home', $isi);
	}

	public function tambah()
	{
		$isi['content'] 	= 'backend/agenda/form_tambahagenda';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Tambah Agenda';
		
		$isi['id_agenda'] 		= '';
		$isi['judul_agenda'] 	= '';
		$isi['isi'] 			= '';
		$isi['tanggal_start'] 	= '';
		$isi['waktu_start'] 	= '';
		$isi['gambar'] 			= '';

		$this->load->view('backend/tampil_home', $isi);
	}

	public function simpan()
	{
		$config['upload_path'] = './uploads/agenda/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1000'; //KB
		$config['max_width']  = '2000'; //pixels
		$config['max_height']  = '2000'; //pixels

		//start insert date time//
		$tanggal_start =$this->input->post('tanggal_start');
		$waktu_start = $this->input->post('waktu_start');
		$s = strtotime("$waktu_start $tanggal_start");	  	
	  	//end insert date time//
		
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('gambar')){
			$data['id_agenda'] 		= $this->input->post('id_agenda');
			$data['judul_agenda'] 	= $this->input->post('judul_agenda');
			$data['isi'] 			= $this->input->post('isi');
			$data['waktu'] 			= date('Y:m:d H:i:s', $s);
		} else {

			$img=$this->upload->data();
			
			$data['id_agenda'] 		= $this->input->post('id_agenda');
			$data['judul_agenda'] 	= $this->input->post('judul_agenda');
			$data['isi'] 			= $this->input->post('isi');
			$data['waktu'] 			= date('Y:m:d H:i:s', $s);
			$data['gambar'] 		= $img['file_name'];
		}

		$key= $this->input->post('id_agenda');
		
		$query = $this->model_agenda->getdata($key);
		if($query->num_rows() > 0)
		{
			
			$this->model_agenda->getupdate($key,$data);
			$this->session->set_flashdata('Info','Data berhasil di update');
		}else{
			$this->model_agenda->getinsert($data);
			$this->session->set_flashdata('Info','Data berhasil di simpan');
		}
		
		redirect('admin/agenda');
		
	}

	public function edit()
	{
		$isi['content'] 	= 'backend/agenda/form_tambahagenda';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul'] 	= 'Edit Agenda';

		$key = $this->uri->segment(4);
		$this->db->where('id_agenda',$key);
		$query = $this->db->get('agenda');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$waktu = $row->waktu;
				$pecah 		= explode(" ", $waktu);
				$tanggal = $pecah[0];
				$jam	 = $pecah[1];

				$isi['id_agenda'] 		= $row->id_agenda;
				$isi['judul_agenda'] 	= $row->judul_agenda;
				$isi['isi'] 			= $row->isi;
				$isi['tanggal_start'] 	= date("d-m-Y", strtotime($tanggal));
				$isi['waktu_start'] 	= $jam;
				$isi['gambar'] 			= $row->gambar;
				
			}
		}
	else{
		$isi['id_agenda'] 		= '';
		$isi['judul_agenda'] 	= '';
		$isi['isi'] 			= '';
		$isi['tanggal_start'] 	= '';
		$isi['waktu_start'] 	= '';
		$isi['gambar'] 			= '';
		
	}
	$this->load->view('backend/tampil_home', $isi);
}

public function delete()
{
	$key = $this->uri->segment(4);

	$this->db->where('id_agenda',$key);
	$query = $this->db->get('agenda');
	//unlink("uploads/agenda/".);
	if($query->num_rows()>0)
	{
		$this->model_agenda->getdelete($key);
	}
	redirect('admin/agenda');
}

}