<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_site');
		$this->load->model('model_agenda');
	}

	public function index()
	{
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();

		$berita_terbaru		= $this->db->query('SELECT * from berita order by id_berita desc limit 3')->result_array();
		$agenda_terbaru		= $this->db->query('SELECT * from agenda order by id_agenda desc limit 3')->result_array();
		$agenda				= $this->db->query('SELECT * from agenda order by id_agenda desc limit 15')->result_array();

		$jumlah_data=$this->model_agenda->jumlah_data();
		$config['base_url']=base_url().'index.php/agenda/index/';
		$config['total_rows']=$jumlah_data;
		$config['per_page']=3;
		$from=$this->uri->segment(3);
		$this->pagination->initialize($config);

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),

			'berita_terbaru'	=> $berita_terbaru,
			'agenda_terbaru'	=> $agenda_terbaru,
			'agenda'			=> $this->model_agenda->paging($config['per_page'],$from),
		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_agenda');
		$this->load->view('frontend/agenda');
		$this->load->view('frontend/footer');
	}

	function lihatagenda($id_agenda = ''){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		
		$berita_terbaru		= $this->db->query('SELECT * from berita order by id_berita desc limit 3')->result_array();
		$agenda_terbaru		= $this->db->query('SELECT * from agenda order by id_agenda desc limit 3')->result_array();
		$agenda				= $this->db->query('SELECT * from agenda order by id_agenda desc limit 15')->result_array();

		$data_konten		= $this->model_agenda->getAgenda("where id_agenda='$id_agenda'")->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			
			'berita_terbaru'	=> $berita_terbaru,
			'agenda_terbaru'	=> $agenda_terbaru,
			'agenda'			=> $agenda,

			'kode'			=> $data_konten[0]['id_agenda'],
			'judul'			=> $data_konten[0]['judul_agenda'],
			'content'			=> $data_konten[0]['isi'],
			'waktu'			=> $data_konten[0]['waktu'],
			'images'			=> $data_konten[0]['gambar'],
		);
		$query = $this->db->get('agenda');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$data['waktu'] 			= $row->waktu;				
			}
		} else{
			$data['waktu'] 		= '';			
		}
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_agenda_detail');
		$this->load->view('frontend/agenda_detail');
		$this->load->view('frontend/footer');
	}

}
