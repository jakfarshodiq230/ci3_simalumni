<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_site');
		$this->load->model('model_chart');
	}

	public function index()
	{
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();

		$provinsi 			= $this->model_chart->provinsi();
		$profesi 			= $this->model_chart->profesi();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),

			'provinsi'		=> $provinsi,
			'profesi'			=> $profesi,
			
			'judul'			=> 'Statistik',
			'chart_tahun'		=> $this->model_chart->jml_tahun(),
			'chart_jk'			=> $this->model_chart->jk(),
			'chart_asrama'		=> $this->model_chart->asrama(),
		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/statistik');
		$this->load->view('frontend/footer');
	}

}
