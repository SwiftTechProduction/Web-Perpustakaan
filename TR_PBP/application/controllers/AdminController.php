<?php

class AdminController extends CI_Controller{
	
	public function __construct(){  /*sebagai constructor*/
		parent::__construct();
		$this->load->model('Buku'); /*mulai meload model yang bernama file Buku dalam folder model*/
		$this->load->model('Kategori');
		$this->load->helper('form','url'); /*mulai meload helper untuk penanganan form dan url*/
	}
		
	public function index() /*memanggil halaman pertama kali*/
	{
		//$data['title']="Perpustakaan UKSW";/*set isi data*/
		//$data['dataBuku']=$this->Buku->GetAllBuku();
		//$data['dataKategori']=$this->Kategori->GetAllKategori();
		$this->load->view('admin_view');/*load halaman buku_view*/
	}
	
	public function formTambah()
{
	$data['title']="CRUD CodeIgniter Studi Kasus Buku";
	$data['dataBuku']=$this->Buku->GetAllBuku();
	$this->load->view('formTambah',$data);
}

public function buku_view1()
{
	$data['title']="CRUD CodeIgniter Studi Kasus Buku";
	$data['dataBuku']=$this->Buku->GetAllBuku();
	$this->load->view('formTambah',$data);
}

public function InsertBuku()
{
	$data = array(
	"kode_buku" =>$this->input->post('kode_buku'),
	"judul_buku" =>$this->input->post('judul_buku'),
	"pengarang" =>$this->input->post('pengarang'),
	"penerbit" =>$this->input->post('penerbit'),
	"stok_buku" =>$this->input->post('stok_buku'),
	"kode_kategori" =>$this->input->post('kode_kategori'),
	);
	$this->Buku->InsertBuku($data);
	$this->index();
}
	
}

?>