<?php
class Keranjang extends CI_Model{
	var $tabel='keranjang';
	function __construct(){
		parent::__construct();
	}
	
	function GetAllKeranjang(){ /*fungsi memanggil query view*/
		
		
		$query=$this->db->get('keranjang');
		foreach($query->result() as $row){
			$data[]=$row;
		}
		return $data;
		
		
	}
	
	function insertKeranjang($data){ /*fungsi memanggil active record insert*/
		$this->db->insert('keranjang',$data);
		return;
	}
	

	
	function cariKeranjang($cari,$username){
		$hasil=$this->db->query("SELECT kode_buku FROM keranjang WHERE kode_buku=".$cari." AND username='".$username."'");
		$ketemu=$hasil->num_rows();
		return $ketemu;
	}
	
	function updateKeranjang($kode_buku,$username){ /*fungsi memangil active record update*/
		
		$hasil=$this->db->query("UPDATE keranjang SET qty=qty+1 WHERE kode_buku=".$kode_buku." AND username='".$username."'");
		return;	
	}
	
	function getcariKeranjang($username){
    $query = $this->db->select('buku.judul_buku, buku.pengarang, buku.penerbit,buku.tahun, keranjang.qty, keranjang.kode_buku')->join('buku','buku.kode_buku=keranjang.kode_buku')->where('keranjang.username',$username);
	return $this->db->get('keranjang')->result();
		foreach($query->result() as $row)
		{
			$data[] = $row;
		}
	return $data;
    }
	
	function del_by_idKeranjang($table, $username) {
        $this->db->where('username', $username);
        $this->db->delete($table);
    }
	
	
}
	



?>