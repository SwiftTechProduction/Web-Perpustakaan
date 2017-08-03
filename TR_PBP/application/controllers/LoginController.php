<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logincontroller extends CI_Controller {

	 
	public function __construct(){  /*sebagai constructor*/
		parent::__construct();
		$this->load->model('User'); /*mulai meload model yang bernama file User dalam folder model*/
		$this->load->helper('form','url'); /*mulai meload helper untuk penanganan form dan url*/
	}
	
	public function index() /*ketika controller dipanggil pertama kali dijalankan*/
	{
		$this->load->view('login'); /*menuju halaman login di view*/
	}
	
	
	public function admin() 
	{
		$this->load->view('loginadmin'); /*menuju halaman loginadmin di view*/
	}
	
	
	public function pegawai() 
	{
		$this->load->view('loginpegawai'); /*menuju halaman loginadmin di view*/
	}
	
	public function ceklogin() /*cek login*/
	{
		
		$username = (!isset($_POST["txt_username"])?" " : $_POST["txt_username"]);/*jika null di isi " "*/
		$password = (!isset($_POST["txt_password"])?" " : $_POST["txt_password"]);
		
		$data['dataUser'] = $this->User->get_data_by_idUser('user',$username)->row();
		
			//echo $data['dataUser']->status;
		if(empty($data['dataUser'])){
			$this->load->view('login');
		}else if($username==$data['dataUser']->username && $password==$data['dataUser']->password && $data['dataUser'] && $data['dataUser']->status=="user")	/*jika username dan pasword benar*/
		{
			
				$_SESSION['username'] = $username; 
				redirect(site_url('bukuController')); /*load BukuController, otomatis akan meload metod index*/
		
			
		}
			
		else
		{
			$this->load->view('login');/*balk lagi ke login*/
		}
	
	}
	
	
	public function cekloginadmin() /*cek login admin*/
	{
		
		$username = (!isset($_POST["txt_username"])?" " : $_POST["txt_username"]);/*jika null di isi " "*/
		$password = (!isset($_POST["txt_password"])?" " : $_POST["txt_password"]);
		
		$data['dataUser'] = $this->User->get_data_by_idUser('user',$username)->row();
		
			//echo $data['dataUser']->status;
			
		if(empty($data['dataUser'])){
			$this->load->view('loginadmin'); /*menuju halaman loginadmin di view*/
		}else if($username==$data['dataUser']->username && $password==$data['dataUser']->password && $data['dataUser']->status=="admin")	/*jika username dan pasword benar*/
		{
				$_SESSION['usernameadmin'] = $username; 
				redirect(site_url('adminController/')); 
		}
		else
		{
			$this->load->view('loginadmin');/*balk lagi ke login*/
		}
	
	}
	
	public function cekloginpegawai() /*cek login admin*/
	{
		
		$username = (!isset($_POST["txt_username"])?" " : $_POST["txt_username"]);/*jika null di isi " "*/
		$password = (!isset($_POST["txt_password"])?" " : $_POST["txt_password"]);
		
		$data['dataUser'] = $this->User->get_data_by_idUser('user',$username)->row();
		
			//echo $data['dataUser']->status;
			
		if(empty($data['dataUser'])){
			$this->load->view('loginpegawai'); /*menuju halaman loginadmin di view*/
		}else if($username==$data['dataUser']->username && $password==$data['dataUser']->password && $data['dataUser']->status=="pegawai")	/*jika username dan pasword benar*/
		{
			
				$_SESSION['usernamepegawai'] = $username; 
				redirect(site_url('bukuPController/')); 
		
		}
		else
		{
			$this->load->view('loginpegawai');/*balk lagi ke login*/
		}
	
	}
	
	public function logout() /*untuk logout*/
	{
		unset($_SESSION['username']);/*melepas session*/
		session_destroy();/*hancurkan session*/
		$this->load->view('login');/*balk lagi ke login*/

	}
	
	public function logoutadmin() /*untuk logout*/
	{
		unset($_SESSION['usernameadmin']);/*melepas session*/
		session_destroy();/*hancurkan session*/
		$this->load->view('loginadmin');/*balk lagi ke login*/

	}
	
	public function logoutpegawai() /*untuk logout*/
	{
		unset($_SESSION['usernamepegawai']);/*melepas session*/
		session_destroy();/*hancurkan session*/
		$this->load->view('loginpegawai');/*balk lagi ke login*/

	}
	
}
?>