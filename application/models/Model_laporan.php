<?php
class Model_laporan extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function semua_alumni() {
	$query = $this->db->query("SELECT *
		FROM 
		alumni 
		INNER JOIN asrama ON asrama.id_asrama = alumni.id_asrama
		INNER JOIN kabupaten ON kabupaten.id_kabupaten = alumni.id_kabupaten
		INNER JOIN provinsi ON kabupaten.id_provinsi = provinsi.id_provinsi order by username ");
	return $query->result();
}

public function semua_alumni_tahun($tahun) {
	$query = $this->db->query("SELECT *
		FROM 
		asrama 
		INNER JOIN alumni ON alumni.id_asrama = asrama.id_asrama
		INNER JOIN kabupaten ON kabupaten.id_kabupaten = alumni.id_kabupaten
		INNER JOIN provinsi ON kabupaten.id_provinsi = provinsi.id_provinsi where tahun_lulus like '%$tahun%' order by username ");
	return $query->result();
}

public function semua_alumni_asrama($asrama) {
	$query = $this->db->query("SELECT *	
		FROM 
		asrama 
		INNER JOIN alumni ON alumni.id_asrama = asrama.id_asrama
		INNER JOIN kabupaten ON kabupaten.id_kabupaten = alumni.id_kabupaten
		INNER JOIN provinsi ON kabupaten.id_provinsi = provinsi.id_provinsi where nama_asrama='$asrama' order by username ");
	return $query->result();
}

}
?>