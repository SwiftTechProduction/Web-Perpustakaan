<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeranjangController extends CI_Controller {

	 
	public function __construct(){  /*sebagai constructor*/
		parent::__construct();
		$this->load->model('Keranjang'); /*mulai meload model yang bernama file User dalam folder model*/
		$this->load->model('Buku');
		$this->load->helper('form','url'); /*mulai meload helper untuk penanganan form dan url*/
	}
	
	public function index() /*ketika controller dipanggil pertama kali dijalankan*/
	{
		$data['dataKeranjang']=$this->Buku->GetAllKeranjang();
		$this->load->view('keranjangbuku',$data); /*menuju halaman login di view*/
	}
	
	public function insertKeranjang($kode_buku,$username) 
	{
		//echo $kode_buku;
		$this->Buku->updateStokBuku($kode_buku);//update stok
		
		//cek apakah kode sudah ada
		$ketemu =$this->Keranjang->cariKeranjang($kode_buku,$username);
		
		if($ketemu==0){ //lakukan insert
			$data = array(
			"kode_buku" => $kode_buku,
            "qty" => 1,
			"username"=> $username
			);	
			$this->Keranjang->insertKeranjang($data);
			
		}else{
			$this->Keranjang->updateKeranjang($kode_buku,$username);//lakukan update
			
		}
		
		redirect(site_url('bukuController'));
	}
	

	public function deleteKeranjang() {
		$username = $_POST['user'];
		$ulang = $_POST['ulang'];
		
		//update buku by judul
		for($i=1;$i<=$ulang;$i++){
			$this->Buku->updateBukuByJudul($_POST['kodeBuku'.$i],$_POST['qtyz'.$i]);
		}
		
		//delete keranjang by id
		$this->Keranjang->del_by_idKeranjang('keranjang', $username);

		redirect(site_url('bukuController'));
	}
	
		public function lihatKeranjang($username) 
	{
		
		$data['dataKeranjang']=$this->Keranjang->getcariKeranjang($username);
		$this->load->view('daftar_buku',$data); 

	}

	
}
?>