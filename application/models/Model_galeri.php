<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_galeri extends CI_model {

	public function getinsert($data)
	{
		$this->db->insert('galeri',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_galeri',$key)
		->delete('galeri');
	}

	public function getAll(){
		return $query = $this->db->query('SELECT * from galeri INNER JOIN album ON album.id_album=galeri.id_album')->result_array();
	}

	public function jumlah_data(){
		return $this->db->get('galeri')->num_rows();
	}

}
