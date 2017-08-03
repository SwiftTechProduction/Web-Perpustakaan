<?php
class Buku extends CI_Model{
	var $tabel='buku';
	function __construct(){
		parent::__construct();
	}
	
	function GetAllBuku(){ /*fungsi memanggil query view*/
		/*$hasil=$this->db->query("SELECT * FROM buku ORDER BY judul_buku");
		if($hasil->num_rows()>0){
			foreach($hasil->result() as $row){
				$data[]=$row;
			}
			return $data;
		}
		*/
		
		$query=$this->db->get('buku');
		foreach($query->result() as $row){
			$data[]=$row;
		}
		return $data;
		
		/*$query= $this=->db->select('buku.judul_buku, buku.pengarang,buku.penerbit,buku.stok_buku,kategori.kategori_buku')->join('kategori','kategori.kode_kategori=buku.kode_kategori');
		return $this->db->get('buku')->result();
		foreach($query->result() as row){
			$data[]=$row;
		}
		return $data;*/
	}
	
	function searchBuku($kategori,$kata)
	{
		
		$hasil=$this->db->query("SELECT * FROM buku WHERE kode_kategori='".$kategori."' AND (kode_buku LIKE '%".$kata."%' OR judul_buku  LIKE '%".$kata."%' OR pengarang  LIKE '%".$kata."%' OR penerbit  LIKE '%".$kata."%' OR tahun LIKE '%".$kata."%'  OR stok_buku  LIKE '%".$kata."%')");
		if($hasil->num_rows()>0){
		foreach($hasil->result() as $row){
			$data[]=$row;
		}
		return $data;
		}
		
	}
	
	
	function insertBuku($data){ /*fungsi memanggil active record insert*/
		$this->db->insert('buku',$data);
		return;
	}
	
	function get_data_by_idBuku($table,$kode){ /*fungsi memangil active record Get by ID*/
		$this->db->where('kode_buku',$kode);
		return $this->db->get($table);
	}
	
	function updateBuku($table,$kode,$data){ /*fungsi memangil active record update*/
		$this->db->where('kode_buku',$kode);
		return $this->db->update($table,$data);
	}
	
	
	
	function del_by_idBuku($table,$kode){ /*fungsi memanggil active record delete*/
		$this->db->where('kode_buku',$kode);/*ative record*/
		$this->db->delete($table);
	}
	
	function get_data_byKategori($kategori,$kata){ /*fungsi memangil active record Get by ID*/
		//$hasil= $this->db->where($kategori,$kata)->or_like($kategori,$kata)->order_by($kategori)->get('buku');
		
	}
	
	function updateStokBuku($kode_buku){ 
		
		$hasil=$this->db->query("UPDATE buku SET stok_buku=stok_buku-1 WHERE kode_buku=".$kode_buku);
		return;	
	}
	
	
	function updateBukuByJudul($kode_buku,$qty){ 
		$hasil=$this->db->query("UPDATE buku SET stok_buku=stok_buku+".$qty." WHERE kode_buku=".$kode_buku);
		return;	
	}
	

}

?>