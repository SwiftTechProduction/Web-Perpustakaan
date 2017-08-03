<?php

class BukuAController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Buku');
        $this->load->model('Kategori');
        $this->load->helper('form', 'url');
    }

    public function index() {
        $data['title'] = "Perpustakaan UKSW";
        $data['dataBuku'] = $this->Buku->GetAllBuku();
        $data['dataKategori']=$this->Kategori->GetAllKategori();
        $this->load->view('bukuA_view', $data);
    }

    public function InsertBuku() {
        $data = array(
            
            "judul_buku" => $this->input->post('judul_buku'),
            "pengarang" => $this->input->post('pengarang'),
            "penerbit" => $this->input->post('penerbit'),
            "stok_buku" => $this->input->post('stok_buku'),
			"tahun" => $this->input->post('tahun'),
            "kode_kategori" => $this->input->post('kategori'),
        );
        $this->Buku->insertBuku($data);
        $this->index();
    }

    function EditBuku($kode_buku) {
        $data['data_edit'] = $this->Buku->get_data_by_idBuku('buku', $kode_buku)->row();
		$data['dataKategori']=$this->Kategori->GetAllKategori();
        $this->load->view('edit_bukuA', $data);
    }

    function UpdateBuku() {
        $data = array(
            "kode_buku" => $this->input->post('kode_buku'),
            "judul_buku" => $this->input->post('judul_buku'),
            "pengarang" => $this->input->post('pengarang'),
            "penerbit" => $this->input->post('penerbit'),
			"tahun" => $this->input->post('tahun'),
            "stok_buku" => $this->input->post('stok_buku'),
            "kode_kategori" => $this->input->post('kategori'),
        );
        $this->Buku->updateBuku('buku', $this->input->post('kode_buku'), $data);
        $this->index();
    }

    function HapusBuku($kode_buku) {
        $this->Buku->del_by_idBuku('buku', $kode_buku);
        $this->index();
    }

}

?>