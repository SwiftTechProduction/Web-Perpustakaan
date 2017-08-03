<?php

class TransaksiAController extends CI_Controller {

    public function __construct() { /* sebagai constructor */
        parent::__construct();
        $this->load->model('Transaksi'); /* mulai meload model yang bernama file Buku dalam folder model */
        $this->load->helper('form', 'url'); /* mulai meload helper untuk penanganan form dan url */
    }

    public function index() /* memanggil halaman pertama kali */ {
        $data['title'] = "Perpustakaan UKSW"; /* set isi data */
        $data['dataTransaksi'] = $this->Transaksi->GetAllTransaksi();
        $this->load->view('transaksi_view', $data); /* load halaman buku_view */
    }

    function EditTransaksi($kode_transaksi) {
        $data['data_edit'] = $this->Transaksi->get_data_by_idTransaksi('transaksi', $kode_transaksi)->row();
        $this->load->view('edit_transaksi', $data);
    }

   function UpdateTranskai() {
        
		$now = strtotime(date("Y-m-d"));
		$kembali= strtotime($this->input->post('tanggal_kembali'));
		$selisih = $now -  $kembali;
		$hari = $selisih/(60*60*24);
		$denda=0;
		$jumlah_awal=$this->input->post('jumlah_awal');
		$jumlah_buku=$this->input->post('jumlah_buku');
		if($now>$kembali){
			$denda=$hari*1000*($jumlah_awal-$jumlah_buku);
		}
		if( $jumlah_buku==0){
			$status="Selesai Pinjam";
		}else{
			$status="Belum Kembali";
		}
		
		$data = array(
            "kode_transaksi" => $this->input->post('kode_transaksi'),
            "tanggal_pinjam" => $this->input->post('tanggal_pinjam'),
            "tanggal_kembali" => $this->input->post('tanggal_kembali'),
            "jumlah_buku" => $this->input->post('jumlah_buku'),
            "denda" => $denda,
			"status"=> $status,
            "username" => $this->input->post('username'),
        );
        $this->Transaksi->updateTransaksi('transaksi', $this->input->post('kode_transaksi'), $data);
        $this->index();
    }

    function HapusTransaksi($kode_transaksi) {
        $this->Transaksi->del_by_idTransaksi('transaksi', $kode_transaksi);
        $this->index();
    }

}

?>