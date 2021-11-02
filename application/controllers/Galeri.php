<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_site');
		$this->load->model('model_galeri');
	}

	public function index()
	{
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();

		$album				= $this->db->query('SELECT * from album order by id_album')->result_array();
		$galeri				= $this->db->query("SELECT * from galeri INNER JOIN album ON album.id_album=galeri.id_album")->result_array();
		$berita_terbaru		= $this->db->query('SELECT * from berita order by id_berita desc limit 3')->result_array();
		$agenda_terbaru		= $this->db->query('SELECT * from agenda order by id_agenda desc limit 3')->result_array();

		$jumlah_data=$this->model_galeri->jumlah_data();
		$config['base_url']=base_url().'index.php/galeri/index/';
		$config['total_rows']=$jumlah_data;
		$config['per_page']=10;
		$from=$this->uri->segment(3);
		$this->pagination->initialize($config);

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),

			'judul'			=> 'Foto Alumni',
			'album'			=> $album,
			'galeri'			=> $this->model_galeri->getAll(),
			'berita_terbaru'	=> $berita_terbaru,
			'agenda_terbaru'	=> $agenda_terbaru,
		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/galeri');
		$this->load->view('frontend/footer');
	}

}
