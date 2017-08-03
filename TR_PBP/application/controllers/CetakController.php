<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakController extends CI_Controller {

	 
	public function __construct(){  /*sebagai constructor*/
		parent::__construct();
		$this->load->model('Transaksi'); 
		$this->load->model('Peminjaman');
		$this->load->helper('form','url'); /*mulai meload helper untuk penanganan form dan url*/
	}
	
	public function index() /*ketika controller dipanggil pertama kali dijalankan*/
	{
		//$data['dataKeranjang']=$this->Buku->GetAllKeranjang();
		//$this->load->view('keranjangbuku',$data); /*menuju halaman login di view*/
	}
	
	
	public function cetak($id) 
	{
		$data['dataTransaksi']=$this->Transaksi->get_data_by_idTransaksi('transaksi',$id)->row();//lihat transaksi byid
		$data['dataPeminjaman']=$this->Peminjaman->GetAllPeminjamanById($id);//lihat peminjaman byid
		
		$this->load->view('cetak', $data);
		
	}
	

	
}
?>