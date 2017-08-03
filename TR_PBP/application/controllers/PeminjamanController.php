<?php

class PeminjamanController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Peminjaman');
        $this->load->helper('form', 'url');
    }

    public function index() {
        $data['title'] = "Perpustakaan UKSW";
        $data['dataPeminjaman'] = $this->Peminjaman->GetAllPeminjaman();
        $this->load->view('peminjaman_view', $data);
    }
    
}

?>