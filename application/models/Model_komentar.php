<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_komentar extends CI_model {
	public $table ="komentar";

	public function getdata($key)
	{
		$this->db->where('id_komentar', $key);
		$hasil = $this->db->get('komentar');
		return $hasil;
	}

	function simpan($data) {
		$this->db->insert('komentar',$data);
	}

	function update($key,$data)
	{
		$this->db->where('id_komentar',$key);
		$this->db->update('komentar',$data);
	}

	public function delete_komentar($key)
	{
		$this->db->where('id_komentar',$key)
		->delete('komentar');
	}

}
?>