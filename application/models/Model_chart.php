<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_chart extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function jml_tahun()
	{
		$data = $this->db->query("SELECT tahun_lulus, COUNT(id) as hasil FROM alumni where tahun_lulus!='NULL' GROUP BY tahun_lulus");
		return $data;
	}

	public function asrama()
	{
		$data = $this->db->query("SELECT asrama.nama_asrama, COUNT(id) as hasil FROM asrama INNER JOIN alumni ON alumni.id_asrama = asrama.id_asrama where nama_asrama!='NULL' GROUP BY nama_asrama");
		return $data;
	}

	public function jk()
	{
		$data = $this->db->query("SELECT jenis_kelamin, COUNT(id) as hasil FROM alumni where jenis_kelamin!='NULL' GROUP BY jenis_kelamin");
		return $data;
	}

	public function provinsi()
	{
		$data = $this->db->query('SELECT provinsi.nama_provinsi, COUNT(id) as hasil FROM alumni INNER JOIN kabupaten ON alumni.id_kabupaten = kabupaten.id_kabupaten INNER JOIN provinsi ON provinsi.id_provinsi=kabupaten.id_provinsi GROUP BY nama_provinsi order by hasil DESC')->result_array();
		return $data;
	}

	public function profesi()
	{
		$data = $this->db->query("SELECT tempat_kerja, COUNT(id) as hasil FROM alumni where profesi!='NULL' GROUP BY tempat_kerja order by hasil DESC")->result_array();
		return $data;
	}
}
