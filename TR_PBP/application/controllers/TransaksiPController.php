<?php

class TransaksiPController extends CI_Controller {

    public function __construct() { /* sebagai constructor */
        parent::__construct();
        $this->load->model('Transaksi'); /* mulai meload model yang bernama file Buku dalam folder model */
        $this->load->model('Peminjaman'); 
		$this->load->model('Buku'); 
		$this->load->helper('form', 'url'); /* mulai meload helper untuk penanganan form dan url */
    }

    public function index() /* memanggil halaman pertama kali */ {
        $data['title'] = "Perpustakaan UKSW"; /* set isi data */
        $data['dataTransaksi'] = $this->Transaksi->GetAllTransaksi();
        $this->load->view('transaksiP_view', $data); /* load halaman buku_view */
    }

    function EditTransaksi($kode_transaksi) {
        $data['data_edit'] = $this->Transaksi->get_data_by_idTransaksiP('transaksi', $kode_transaksi)->row();
		$data['dataPeminjaman']=$this->Peminjaman->GetAllPeminjamanById($kode_transaksi);//lihat peminjaman byid
        $this->load->view('edit_transaksiP', $data);
    }

    function UpdateTransaksi($kode_peminjaman,$kode_transaksi,$kbl,$kodeBuku) {
        $this->Buku->updateBukuByJudul($kodeBuku,1);//update buku
		
		$tgl = date("Y-m-d");
		$this->Peminjaman->updatePeminjamanPulang($kode_peminjaman,$kode_transaksi,$tgl);//update peminjaman
	   
		//update transaksi
		$now = strtotime($tgl); //hitung denda
		$kembali= strtotime($kbl);
		
		$selisih = $now - $kembali; 
		$hari = $selisih/(60*60*24);
		$denda=0;
		
		if($now>$kembali){ //jika tanggal sekarang > jatuh tempo,denda+
				$denda=$hari*1000;
		} else{
				$denda=0; 
				} //jika belum denda = 0
		
		$this->Transaksi->updateTransaksiPulang($kode_transaksi,$denda);//update transaksi
		$this->EditTransaksi($kode_transaksi);
    }
	
	function UpdateStatusTransaksi($kodeTransaksi,$jumlahBuku){
		if($jumlahBuku==0){
			$this->Transaksi->updateStatusTransaksi($kodeTransaksi);//update status
		}
		
		$this->index();
	}

    function HapusTransaksi($kode_transaksi) {
        $this->Transaksi->del_by_idTransaksi('transaksi', $kode_transaksi);
        $this->index();
    }

}

?>