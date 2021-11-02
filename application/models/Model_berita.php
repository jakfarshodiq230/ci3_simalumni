<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_berita extends CI_model {

	public function getdata($key)
	{
		$this->db->where('id_berita', $key);
		$hasil = $this->db->get('berita');
		return $hasil;
	}

	function getBerita($where = ''){
		return $this->db->query("select * from berita $where;");
	}

	public function getinsert($data)
	{
		$this->db->insert('berita',$data);
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_berita',$key);
		$this->db->update('berita',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_berita',$key)
		->delete('berita');
	}

	public function paging($number,$offset){
		return $query = $this->db->get('berita',$number,$offset)->result_array();
	}

	public function jumlah_data(){
		return $this->db->get('berita')->num_rows();
	}

	public function klik($key){
		return $this->db->query("UPDATE berita SET status = status + 1 WHERE id_berita ='$key' ");
	}

}
?>