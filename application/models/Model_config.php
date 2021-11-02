<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_config extends CI_model
{

	public $table = "admin";

	public function getdata($key)
	{
		$this->db->where('id_config', $key);
		$hasil = $this->db->get('config');
		return $hasil;
	}
	function getadmin($key)
	{
		$this->db->where('id_config', $key);
		$hasil = $this->db->get('config');
		return $hasil;
	}
	function simpanadmin($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function tampil_admin()
	{
		return $this->db->get('admin');
	}

	public function get_config()
	{
		$id = array('2', '3', '4', '6', '7', '8', '9');
		$this->db->where_in('id_config', $id);
		$hasil = $this->db->get('config');
		return $hasil;
	}

	public function get_config_foto_header()
	{

		$this->db->where_in('id_config', '1');
		$hasil = $this->db->get('config');
		return $hasil;
	}

	public function get_config_foto_kepsek()
	{

		$this->db->where_in('id_config', '5');
		$hasil = $this->db->get('config');
		return $hasil;
	}

	public function get_config_foto_slider1()
	{

		$this->db->where_in('id_config', '10');
		$hasil = $this->db->get('config');
		return $hasil;
	}

	public function get_config_foto_slider2()
	{

		$this->db->where_in('id_config', '11');
		$hasil = $this->db->get('config');
		return $hasil;
	}

	public function getupdate_foto_config($key, $data)
	{

		$this->db->where('id_config', $key);
		$this->db->update('config', $data);
	}

	public function simpan_password($key, $data)
	{
		$this->db->where('id', $key)
			->update('admin', $data);
	}

	public function getupdate($key, $data)
	{
		$this->db->where('id', $key);
		$this->db->update('admin', $data);
	}

	public function update($key, $data)
	{
		$this->db->where('id_config', $key)
			->update('config', $data);
	}

	public function delete_config($key)
	{
		$this->db->where('id_config', $key)
			->delete('config');
	}

	public function cek_username($username)
	{
		$sql = "select * from admin where username='$username'";

		$hasil = $this->db->query($sql);

		return $hasil->result();
	}
}
