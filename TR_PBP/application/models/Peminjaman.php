<?php
class Peminjaman extends CI_Model{
	var $tabel='peminjaman';
	function __construct(){
		parent::__construct();
	}
	
	function GetAllPeminjaman(){ /*fungsi memanggil query view*/
		$hasil=$this->db->query("SELECT * FROM peminjaman ");
		if($hasil->num_rows()>0){
			foreach($hasil->result() as $row){
				$data[]=$row;
			}
			return $data;
		}
		
		
		/*$query=$this->db->get('peminjaman');
		foreach($query->result() as $row){
			$data[]=$row;
		}
		return $data;*/
	}
	
	function insertPeminjaman($data){ /*fungsi memanggil active record insert*/
		$this->db->insert('peminjaman',$data);
		return;
	}
	
	function get_data_by_idPeminjaman($table,$kode){ /*fungsi memangil active record Get by ID*/
		$this->db->where('kode_transaksi',$kode);
		return $this->db->get($table);
	}
	
	function updatePeminjaman($table,$kode,$data){ /*fungsi memangil active record update*/
		$this->db->where('kode_peminjaman',$kode);
		return $this->db->update($table,$data);
	}
	
	function del_by_idPeminjaman($table,$kode){ /*fungsi memanggil active record delete*/
		$this->db->where('kode_peminjaman',$kode);/*ative record*/
		$this->db->delete($table);
	}
	
	function GetAllPeminjamanById($kode_transaksi){ 
		$query = $this->db->select('buku.judul_buku, buku.pengarang, buku.penerbit,buku.tahun, peminjaman.qty, peminjaman.tgl_kembali, peminjaman.kode_peminjaman, peminjaman.kode_buku ')->join('buku','buku.kode_buku=peminjaman.kode_buku')->where('peminjaman.kode_transaksi',$kode_transaksi);
		return $this->db->get('peminjaman')->result();
		foreach($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	
	
	function updatePeminjamanPulang($kodePeminjaman,$kodeTransaksi,$tgl){ /*fungsi memangil active record update*/
		$hasil=$this->db->query("UPDATE peminjaman SET qty=qty-1 , tgl_kembali='".$tgl."'   WHERE kode_peminjaman='".$kodePeminjaman."' AND kode_transaksi='".$kodeTransaksi."'");
		return;	
	}
	
	

}

?>