<?php
class Transaksi extends CI_Model{
	var $tabel='transaksi';
	function __construct(){
		parent::__construct();
	}
	
	function GetAllTransaksi(){ /*fungsi memanggil query view*/
		$hasil=$this->db->query("SELECT * FROM transaksi ");
		if($hasil->num_rows()>0){
			foreach($hasil->result() as $row){
				$data[]=$row;
			}
			return $data;
		}
		/*$query=$this->db->get('transaksi');
		foreach($query->result() as $row){
			$data[]=$row;
		}
		return $data;*/
	}
	
	function insertTransaksi($data){ /*fungsi memanggil active record insert*/
		$this->db->insert('transaksi',$data);
		return;
	}
	
	function get_data_by_idTransaksi($table,$kode,$username){ /*fungsi memangil active record Get by ID*/
		$this->db->where('kode_transaksi',$kode);
		$this->db->where('username',$username);
		return $this->db->get($table);
	}
	
	function get_data_by_idTransaksiP($table,$kode){ /*fungsi memangil active record Get by ID*/
		$this->db->where('kode_transaksi',$kode);
		return $this->db->get($table);
	}
	
	
	function updateTransaksi($table,$kode,$data){ /*fungsi memangil active record update*/
		$this->db->where('kode_transaksi',$kode);
		return $this->db->update($table,$data);
	}
	
	function del_by_idTransaksi($table,$kode){ /*fungsi memanggil active record delete*/
		$this->db->where('kode_transaksi',$kode);/*ative record*/
		$this->db->delete($table);
	}

	
	function hitungId(){
		$this->db->select('MAX(kode_transaksi) AS `a`',false);
		
		$result=$this->db->get('transaksi')->row();
		
		return $result;
		
	}
	
	function updateTransaksiPulang($kodeTransaksi,$denda){ /*fungsi memangil active record update*/
		$hasil=$this->db->query("UPDATE transaksi SET denda=denda+".$denda.", jumlah_buku=jumlah_buku-1 WHERE kode_transaksi='".$kodeTransaksi."'");
		return;	
	}
	
	function updateStatusTransaksi($kodeTransaksi){ /*fungsi memangil active record update*/
		$hasil=$this->db->query("UPDATE transaksi SET status='Sudah Selesai' WHERE kode_transaksi='".$kodeTransaksi."'");
		return;	
	}
	
	
}

?>