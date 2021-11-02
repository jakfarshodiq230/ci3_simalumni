<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_alumni extends CI_model {

	var $table = 'alumni';
	var $column_order = array(null, 'username','nama_lengkap','jenis_kelamin','id_asrama','telp','tahun_lulus','tempat_kerja'); //set column field database for datatable orderable
	var $column_search = array('username','nama_lengkap','jenis_kelamin','id_asrama','telp','tahun_lulus','tempat_kerja'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getdata($key)
	{
		$this->db->where('id', $key);
		$hasil = $this->db->get('alumni');
		return $hasil;
	}

	function getAlumni(){
		$this->db->select('*');
		$this->db->from('alumni a');
		$this->db->join('asrama j','j.id_asrama=a.id_asrama','LEFT');
		$this->db->order_by('username','ASC');

		return $query=$this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function get_by($id){
		$this->db->select('*');
		$this->db->from('alumni a');
		$this->db->join('asrama j','j.id_asrama=a.id_asrama');
		$this->db->join('kabupaten k','k.id_kabupaten=a.id_kabupaten');
		$this->db->join('provinsi p','p.id_provinsi=a.id_provinsi');
		$this->db->where('id',$id);

		$query=$this->db->get();
		if ($query->num_rows()>0) {
			return $query->row();
		}
	else{
		return false;
	}
}

public function get_detail($id){
	$this->db->select('*');
	$this->db->from('alumni a');
	$this->db->join('asrama j','j.id_asrama=a.id_asrama');
	$this->db->join('kabupaten k','k.id_kabupaten=a.id_kabupaten');
	$this->db->join('provinsi p','p.id_provinsi=a.id_provinsi');
	$this->db->where('id',$id);

	$query=$this->db->get();
	if ($query->num_rows()>0) {
		return $query->result();
	}
else{
	return false;
}
}

public function getinsert($data)
{	
	$this->db->insert('alumni',$data);
}

public function daftar_alumni($key,$data)
{
	//$this->db->where('username',$key);
	$this->db->insert('alumni',$data);
}

public function getupdateprofil($key,$data)
{
	$this->db->where('id',$key);
	$this->db->update('alumni',$data);
}

public function getinsert_username($data)
{
	$this->db->insert('alumni',$data);
}

public function getupdate_username($key,$data)
{
	$data['id'] 	= $this->input->post('id');
	$data['username'] 	= $this->input->post('username');

	$this->db->where('id',$key);
	$this->db->update('alumni',$data);
}

public function getdelete($key)
{
	$this->db->where('id',$key)
	->delete('alumni');
}

function cek_username($username){
	$sql = "SELECT * from alumni where username='$username'";
	
	$hasil = $this->db->query($sql);
	
	return $hasil->result();
}

public function simpan_password($key,$data)
{
	$data = array(
		'password'	  	=> md5($this->input->post('password', TRUE))
	);
	$this->db->where('id',$key)
	->update('alumni',$data);
}

private function _get_datatables_query()
{
	
		//add custom filter here
	if($this->input->post('nama'))
	{
		$this->db->like('nama_lengkap', $this->input->post('nama'));
	}
	if($this->input->post('tahun'))
	{
		$this->db->like('tahun_lulus', $this->input->post('tahun'));
	}
	if($this->input->post('asrama'))
	{
		$this->db->where('nama_asrama', $this->input->post('asrama'));
	}

	$this->db->select('*');
	$this->db->from('alumni a');
	$this->db->join('asrama j','j.id_asrama=a.id_asrama');
	$i = 0;
	
	foreach ($this->column_search as $item)
	{
		if($_POST['search']['value'])
		{
			
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
			else
			{
				$this->db->or_like($item, $_POST['search']['value']);
			}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}
}

public function get_datatables()
{
	$this->_get_datatables_query();
	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
	$query = $this->db->get();
	return $query->result();
}

public function count_filtered()
{
	$this->_get_datatables_query();
	$query = $this->db->get();
	return $query->num_rows();
}

public function count_all()
{
	$this->db->from($this->table);
	return $this->db->count_all_results();
}

}
