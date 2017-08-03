<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiController extends CI_Controller {

	 
	public function __construct(){  /*sebagai constructor*/
		parent::__construct();
		$this->load->model('Transaksi'); 
		$this->load->model('Peminjaman');
		$this->load->model('Keranjang');
		$this->load->helper('form','url'); /*mulai meload helper untuk penanganan form dan url*/
	}
	
	public function index() /*ketika controller dipanggil pertama kali dijalankan*/
	{
		//$data['dataKeranjang']=$this->Buku->GetAllKeranjang();
		//$this->load->view('keranjangbuku',$data); /*menuju halaman login di view*/
	}
	
	public function insertTransaksi() 
	{ $perulangan = $_POST['perulangan'];
	  $username =$_POST['username'];
	  $id=0;
	 
	  
	  $data['dataID']=$this->Transaksi->hitungId();//cek idtransaksi
		  if(empty($data['dataID']->a)){
			  $id=1;
		  }
		  else{
			  
			  $id=$data['dataID']->a+1;
		  }
	  
	  //tanggal
	  $hariIni=date("Y-m-d");
	  $now=strtotime($hariIni);
	  $tanggalKembali=date('Y-m-j',strtotime('+10 day',$now));
	  $quantity=0;
	  
	  for($i=1;$i<=$perulangan;$i++){
		  $quantity=$quantity+$_POST['qty'.$i];
	  }
	  
	  $status="Belum Kembali";
	  //input Transaksi
	  $data = array(
          
            "kode_transaksi" => $id,
            "tanggal_pinjam" => $hariIni,
			"tanggal_kembali" =>$tanggalKembali,
			"jumlah_buku"=>$quantity ,
			"denda"=> 0,
			"status"=>$status,
			"username"=> $username
        );	
	  $this->Transaksi->insertTransaksi($data);
	  
	  
		
		for($a=1;$a<=$perulangan;$a++){ //input peminjaman
			$kodeBuku=$_POST['kode'.$a];
			$quantity=$_POST['qty'.$a];
			
			$data = array(
			"kode_buku" =>$kodeBuku,
			"qty" =>$quantity,
			"kode_transaksi"=>$id ,
			);	
			$this->Peminjaman->insertPeminjaman($data);
		}
		
		$this->Keranjang->del_by_idKeranjang('keranjang', $username); //delete keranjang
		
		$data['dataTransaksi']=$this->Transaksi->get_data_by_idTransaksi('transaksi',$id,$username)->row();//lihat transaksi byid
		$data['dataPeminjaman']=$this->Peminjaman->GetAllPeminjamanById($id);//lihat peminjaman byid
		
		$this->load->view('lihat_transaksi', $data);
		
	}
	

	public function cekTransaksi() 
	{
		$this->load->view('cek_peminjaman');

	}
	
		
	public function lihatTransaksi() 
	{	$username = $_POST['username'];
		$id = $_POST['id'];
		$data['dataTransaksi']=$this->Transaksi->get_data_by_idTransaksi('transaksi',$id,$username)->row();//lihat transaksi byid
		$data['dataPeminjaman']=$this->Peminjaman->GetAllPeminjamanById($id);//lihat peminjaman byid
		
		$this->load->view('lihat_transaksi', $data);

	}

	
}
?>