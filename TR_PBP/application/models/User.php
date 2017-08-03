<?php
class User extends CI_Model{
	var $tabel='user';
	function __construct(){
		parent::__construct();
	}
	
	function GetAllUser(){ /*fungsi memanggil query view*/
		/*$hasil=$this->db->query("SELECT * FROM buku ORDER BY judul_buku");
		if($hasil->num_rows()>0){
			foreach($hasil->result() as $row){
				$data[]=$row;
			}
			return $data;
		}
		*/
		$query=$this->db->get('user');
		foreach($query->result() as $row){
			$data[]=$row;
		}
		return $data;
	}
	
	function insertUser($data){ /*fungsi memanggil active record insert*/
		$this->db->insert('user',$data);
		return;
	}
	
	function get_data_by_idUser($table,$kode){ /*fungsi memangil active record Get by ID*/
		/*$hasil=$this->db->query("SELECT * FROM user WHERE username='".$kode."'");
		if($hasil->num_rows()>0){
		foreach($hasil->result() as $row){
			$data[]=$row;
		}
		return $data;*/
		
		$this->db->where('username',$kode);
		return $this->db->get($table);
	}
	
	function updateUser($table,$kode,$data){ /*fungsi memangil active record update*/
		$this->db->where('username',$kode);
		return $this->db->update($table,$data);
	}
	
	function del_by_id($table,$kode){ /*fungsi memanggil active record delete*/
		$this->db->where('username',$kode);/*ative record*/
		$this->db->delete($table);
	}

}

?>