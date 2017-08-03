<?php
class Kategori extends CI_Model{
	var $tabel='kategori';
	function __construct(){
		parent::__construct();
	}
	
	function GetAllKategori(){ /*fungsi memanggil query view*/
		/*$hasil=$this->db->query("SELECT * FROM buku ORDER BY judul_buku");
		if($hasil->num_rows()>0){
			foreach($hasil->result() as $row){
				$data[]=$row;
			}
			return $data;
		}
		*/
		$query=$this->db->get('kategori');
		foreach($query->result() as $row){
			$data[]=$row;
		}
		return $data;
	}
	
	function insertKategori($data){ /*fungsi memanggil active record insert*/
		$this->db->insert('kategori',$data);
		return;
	}
	
	function get_data_by_idKategori($table,$kode){ /*fungsi memangil active record Get by ID*/
		$this->db->where('kode_kategori',$kode);
		return $this->db->get($table);
	}
	
	function updateKategori($table,$kode,$data){ /*fungsi memangil active record update*/
		$this->db->where('kode_kategori',$kode);
		return $this->db->update($table,$data);
	}
	
	function del_by_idKategori($table,$kode){ /*fungsi memanggil active record delete*/
		$this->db->where('kode_kategori',$kode);/*ative record*/
		$this->db->delete($table);
	}

}

?>