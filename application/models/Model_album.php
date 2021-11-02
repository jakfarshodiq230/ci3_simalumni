<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_album extends CI_model {

	public function getdata($key)
	{
		$this->db->where('id_album', $key);
		$hasil = $this->db->get('album');
		return $hasil;
	}

	public function getinsert($data)
	{
		$this->db->insert('album',$data);
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_album',$key);
		$this->db->update('album',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_album',$key)
		->delete('album');
	}
	
	public function lihat_galeri($key){
		$this->db->where('id_album', $key);
		$hasil = $this->db->get('galeri');
		return $hasil;
	}
}
