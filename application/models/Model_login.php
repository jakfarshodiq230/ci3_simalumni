<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function ceknum($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('admin');
	}

	public function ceknum_alumni($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('alumni');
	}

	// cek data alumni
	public function cek_alumni($nim)
	{
		$hsl=$this->db->query("SELECT * FROM alumni,asrama WHERE alumni.id_asrama=asrama.id_asrama AND username='$nim'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nim' => $data->username,
                    'nama_lengkap' => $data->nama_lengkap,
                    'tahun_lulus' => $data->tahun_lulus,
                    'jurusan' => $data->nama_asrama,
					'id' => $data->id,
                    );
            }
        }
        return $hasil;
	}
}