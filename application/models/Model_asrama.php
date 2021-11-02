<?php

class Model_asrama extends CI_model
{

	public $table = "asrama";

	function getdata($key)
	{
		$this->db->where('id_asrama', $key);
		$hasil = $this->db->get('asrama');
		return $hasil;
	}

	function simpan($data)
	{
		$this->db->insert($this->table, $data);
	}

	function update($key, $data)
	{
		$data = array(
			'nama_asrama'  	=> $this->input->post('nama_asrama', TRUE),
			'singkatan'  	=> $this->input->post('singkatan', TRUE)
		);

		$this->db->where('id_asrama', $key);
		$this->db->update('asrama', $data);
	}
}
