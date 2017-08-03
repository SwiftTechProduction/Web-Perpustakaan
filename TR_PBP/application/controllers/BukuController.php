<?php

class BukuController extends CI_Controller{
	
	public function __construct(){  /*sebagai constructor*/
		parent::__construct();
		$this->load->model('Buku'); /*mulai meload model yang bernama file Buku dalam folder model*/
		$this->load->model('Kategori');
		$this->load->helper('form','url'); /*mulai meload helper untuk penanganan form dan url*/
	}
		
	public function index() /*memanggil halaman pertama kali*/
	{
		$data['title']="Perpustakaan UKSW";/*set isi data*/
		$data['dataBuku']=$this->Buku->GetAllBuku();
		$data['dataKategori']=$this->Kategori->GetAllKategori();
		$this->load->view('buku_view',$data);/*load halaman buku_view*/
	}
	
	public function search()
	{
		$kategori=$_POST['kategori'];
		$kata=$_POST['cari'];
		$data['title']="Data Search";
			$data['dataKategori']=$this->Kategori->GetAllKategori();
		$data['dataSearch']=$this->Buku->searchBuku($kategori,$kata);
		$this->load->view('buku_search',$data);
	}
	
}

?>