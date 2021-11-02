<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Agenda extends CI_model {
	
	public function __construct() {
		parent::__construct();
	}

	public function getdata($key)
	{
		$this->db->where('id_agenda', $key);
		$hasil = $this->db->get('agenda');
		return $hasil;
	}

	public function getinsert($data)
	{
		$this->db->insert('agenda',$data);
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_agenda',$key);
		$this->db->update('agenda',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_agenda',$key)
		->delete('agenda');
	}

	function getAgenda($where = ''){
		return $this->db->query("select * from agenda $where;");
	}

	public function select_time(){
		$this->db->select('*');
		$this->db->from('agenda');
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->row();
		}
	}

	public function paging($number,$offset){
		return $query = $this->db->get('agenda',$number,$offset)->result_array();
	}

	public function jumlah_data(){
		return $this->db->get('agenda')->num_rows();
	}

	public function klik($key){
		return $this->db->query("UPDATE agenda SET status = status + 1 WHERE id_agenda ='$key' ");
	}

}
?>