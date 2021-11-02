<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_site');
		$this->load->model('model_berita');
		$this->load->model('model_komentar');
	}

	public function index()
	{
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		
		$berita				= $this->db->query('SELECT * from berita order by id_berita desc limit 10')->result_array();
		$berita_terbaru		= $this->db->query('SELECT * from berita order by id_berita desc limit 3')->result_array();
		$agenda_terbaru		= $this->db->query('SELECT * from agenda order by id_agenda desc limit 3')->result_array();

		$jumlah_data=$this->model_berita->jumlah_data();
		$config['base_url']=base_url().'index.php/berita/index/';
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

			'berita'			=> $this->model_berita->paging($config['per_page'],$from),
			'berita_terbaru'	=> $berita_terbaru,
			'agenda_terbaru'	=> $agenda_terbaru,

		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_news');
		$this->load->view('frontend/news');
		$this->load->view('frontend/footer');
	}

	public function lihatberita($id_berita = ''){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 6')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();
		
		$berita_terbaru		= $this->db->query('SELECT * from berita order by id_berita desc limit 3')->result_array();
		$agenda_terbaru		= $this->db->query('SELECT * from agenda order by id_agenda desc limit 3')->result_array();
		$komentar			= $this->db->query("SELECT 
			alumni.foto,
			alumni.nama_lengkap,
			komentar.komen,
			komentar.waktu 
			from 
			komentar,alumni 
			where alumni.id=komentar.id AND publish='Ya' AND id_berita= '$id_berita' ")->result_array();

		$data_konten		= $this->model_berita->getBerita("where id_berita='$id_berita'")->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			
			'title'			=> strip_tags($home[0]['content']),
			'berita_terbaru'	=> $berita_terbaru,
			'agenda_terbaru'	=> $agenda_terbaru,
			'komentar'		=> $komentar,

			'kode'			=> $data_konten[0]['id_berita'],
			'judul'			=> $data_konten[0]['judul_berita'],
			'content'			=> $data_konten[0]['isi'],
			'date'			=> $data_konten[0]['tanggal'],
			'author'			=> $data_konten[0]['penulis'],
			'images'			=> $data_konten[0]['gambar'],
		);
		
		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_news_detail');
		$this->load->view('frontend/news_detail');
		$this->load->view('frontend/footer');
	}

	public function simpan_komentar(){
		
		$key= $this->input->post('id_komentar');

		$data['id_komentar'] 	= $this->input->post('id_komentar');
		$data['komen'] 			= $this->input->post('komen');
		$data['publish'] 		= $this->input->post('publish');
		$data['id_berita'] 		= $this->input->post('id_berita');
		$data['id'] 			= $this->input->post('id');
		
		$query = $this->model_komentar->getdata($key);
		if($query->num_rows() > 0)
		{
			$this->model_komentar->update($key,$data);
			$this->session->set_flashdata('Info','Komentar berhasil di update');
		}else{
			$this->model_komentar->simpan($data);
			$this->session->set_flashdata('Info','Komentar Anda telah terkirim untuk selanjutnya akan di verifikasi oleh Admin.');
		}

		redirect('berita/komentar');
		
	}

	public function komentar(){
		
		$logoheader			= $this->model_site->getConfig('WHERE id_config = 1')->result_array();
		$teks_kontak		= $this->model_site->getConfig('WHERE id_config = 8')->result_array();
		$footer 			= $this->model_site->getConfig('WHERE id_config = 10')->result_array();
		$home 				= $this->model_site->getConfig('WHERE id_config = 2')->result_array();

		$berita_terbaru		= $this->db->query('SELECT * from berita order by id_berita desc limit 3')->result_array();
		$agenda_terbaru		= $this->db->query('SELECT * from agenda order by id_agenda desc limit 3')->result_array();

		$data = array(
			'title'			=> strip_tags($home[0]['content']),		
			'teks_kontak'		=> strip_tags($teks_kontak[0]['content']),
			'footer'			=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'home'			=> strip_tags($home[0]['content']),
			
			'judul'			=> 'Komentar',
			'title'			=> strip_tags($home[0]['content']),
			'berita_terbaru'	=> $berita_terbaru,
			'agenda_terbaru'	=> $agenda_terbaru,
		);

		$this->load->view('frontend/head',$data);
		$this->load->view('frontend/navigasi/navi_page');
		$this->load->view('frontend/komentar');
		$this->load->view('frontend/footer');
	}

}
