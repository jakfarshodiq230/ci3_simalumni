<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('model_site');
	}

	public function index()
	{
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		$kepsek				= $this->model_site->getConfig('WHERE id_config = 4')->result_array();
		$foto_kepsek		= $this->model_site->getConfig('WHERE id_config = 5')->result_array();
		$sambutan_kepsek	= $this->model_site->getConfig('WHERE id_config = 3')->result_array();
		$slider1			= $this->model_site->getConfig('WHERE id_config = 10')->result_array();
		$slider2			= $this->model_site->getConfig('WHERE id_config = 11')->result_array();
		
		$galeri				= $this->db->query("SELECT * from galeri order by id_galeri Desc limit 4")->result_array();
		$berita_terbaru		= $this->db->query('select * from berita order by id_berita desc limit 5')->result_array();
		$agenda_terbaru		= $this->db->query('select * from agenda order by id_agenda desc limit 6')->result_array();
		$testimoni			= $this->db->query("SELECT * from testimoni where publish='Ya' order by id_testimoni desc limit 3 ")->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			'nama_kepsek'		=> strip_tags($kepsek[0]['content']),
			'foto_kepsek'		=> strip_tags($foto_kepsek[0]['content']),
			'sambutan'		=> strip_tags($sambutan_kepsek[0]['content']),
			'slider1'			=> strip_tags($slider1[0]['content']),
			'slider2'			=> strip_tags($slider2[0]['content']),
			
			'galeri'			=> $galeri,
			'berita_terbaru'	=> $berita_terbaru,
			'agenda_terbaru'	=> $agenda_terbaru,
			'testimoni'		=> $testimoni,

		);

		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/slider');
		$this->load->view('frontend/navigasi/navi');
		$this->load->view('frontend/home');
		$this->load->view('frontend/footer');
	}

	public function login()
	{

		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),

			'judul'			=> 'Login dan Pendaftaran Alumni',
		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/login');
		$this->load->view('frontend/footer');
		
	}

	public function viewpage(){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		$visi 				= $this->model_site->getConfig('WHERE id_config = 7')->result_array();
		$misi 				= $this->model_site->getConfig('WHERE id_config = 9')->result_array();
		

		$berita_terbaru		= $this->db->query('select * from berita order by id_berita desc limit 6')->result_array();
		$agenda_terbaru		= $this->db->query('select * from agenda order by id_agenda desc limit 6')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			'visi'			=> strip_tags($visi[0]['content']),
			'misi'			=> strip_tags($misi[0]['content']),
			
			
			'agenda_terbaru'	=> $agenda_terbaru,
			'berita_terbaru'	=> $berita_terbaru,

			'judul'			=> 'Profil Hubungan Alumni',

		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/pages');
		$this->load->view('frontend/footer');
		
	}

	public function viewpageHumas(){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		$visi 				= $this->model_site->getConfig('WHERE id_config = 7')->result_array();
		$misi 				= $this->model_site->getConfig('WHERE id_config = 9')->result_array();
		

		$berita_terbaru		= $this->db->query('select * from berita order by id_berita desc limit 6')->result_array();
		$agenda_terbaru		= $this->db->query('select * from agenda order by id_agenda desc limit 6')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			'visi'			=> strip_tags($visi[0]['content']),
			'misi'			=> strip_tags($misi[0]['content']),
			
			
			'agenda_terbaru'	=> $agenda_terbaru,
			'berita_terbaru'	=> $berita_terbaru,

			'judul'			=> 'Profil Hubungan Alumni',

		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/pagesHumas');
		$this->load->view('frontend/footer');
		
	}

	public function viewpageSosial(){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		$visi 				= $this->model_site->getConfig('WHERE id_config = 7')->result_array();
		$misi 				= $this->model_site->getConfig('WHERE id_config = 9')->result_array();
		

		$berita_terbaru		= $this->db->query('select * from berita order by id_berita desc limit 6')->result_array();
		$agenda_terbaru		= $this->db->query('select * from agenda order by id_agenda desc limit 6')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			'visi'			=> strip_tags($visi[0]['content']),
			'misi'			=> strip_tags($misi[0]['content']),
			
			
			'agenda_terbaru'	=> $agenda_terbaru,
			'berita_terbaru'	=> $berita_terbaru,

			'judul'			=> 'Profil Hubungan Alumni',

		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/pagesSosial');
		$this->load->view('frontend/footer');
		
	}

	public function viewpagePendidikan(){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		$visi 				= $this->model_site->getConfig('WHERE id_config = 7')->result_array();
		$misi 				= $this->model_site->getConfig('WHERE id_config = 9')->result_array();
		

		$berita_terbaru		= $this->db->query('select * from berita order by id_berita desc limit 6')->result_array();
		$agenda_terbaru		= $this->db->query('select * from agenda order by id_agenda desc limit 6')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			'visi'			=> strip_tags($visi[0]['content']),
			'misi'			=> strip_tags($misi[0]['content']),
			
			
			'agenda_terbaru'	=> $agenda_terbaru,
			'berita_terbaru'	=> $berita_terbaru,

			'judul'			=> 'Profil Hubungan Alumni',

		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/pagesPendidikan');
		$this->load->view('frontend/footer');
		
	}

	public function viewpageKaderisasi(){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		$visi 				= $this->model_site->getConfig('WHERE id_config = 7')->result_array();
		$misi 				= $this->model_site->getConfig('WHERE id_config = 9')->result_array();
		

		$berita_terbaru		= $this->db->query('select * from berita order by id_berita desc limit 6')->result_array();
		$agenda_terbaru		= $this->db->query('select * from agenda order by id_agenda desc limit 6')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			'visi'			=> strip_tags($visi[0]['content']),
			'misi'			=> strip_tags($misi[0]['content']),
			
			
			'agenda_terbaru'	=> $agenda_terbaru,
			'berita_terbaru'	=> $berita_terbaru,

			'judul'			=> 'Profil Hubungan Alumni',

		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/pagesKaderisasi');
		$this->load->view('frontend/footer');
		
	}

	public function viewpageWazis(){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		$visi 				= $this->model_site->getConfig('WHERE id_config = 7')->result_array();
		$misi 				= $this->model_site->getConfig('WHERE id_config = 9')->result_array();
		

		$berita_terbaru		= $this->db->query('select * from berita order by id_berita desc limit 6')->result_array();
		$agenda_terbaru		= $this->db->query('select * from agenda order by id_agenda desc limit 6')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			'visi'			=> strip_tags($visi[0]['content']),
			'misi'			=> strip_tags($misi[0]['content']),
			
			
			'agenda_terbaru'	=> $agenda_terbaru,
			'berita_terbaru'	=> $berita_terbaru,

			'judul'			=> 'Profil Hubungan Alumni',

		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/pagesWazis');
		$this->load->view('frontend/footer');
		
	}

	public function viewpageDakwah(){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		$visi 				= $this->model_site->getConfig('WHERE id_config = 7')->result_array();
		$misi 				= $this->model_site->getConfig('WHERE id_config = 9')->result_array();
		

		$berita_terbaru		= $this->db->query('select * from berita order by id_berita desc limit 6')->result_array();
		$agenda_terbaru		= $this->db->query('select * from agenda order by id_agenda desc limit 6')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			'visi'			=> strip_tags($visi[0]['content']),
			'misi'			=> strip_tags($misi[0]['content']),
			
			
			'agenda_terbaru'	=> $agenda_terbaru,
			'berita_terbaru'	=> $berita_terbaru,

			'judul'			=> 'Profil Hubungan Alumni',

		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/pagesDakwah');
		$this->load->view('frontend/footer');
		
	}

}
