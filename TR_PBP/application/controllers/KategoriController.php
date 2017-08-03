<?php

class KategoriController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori');
        $this->load->helper('form', 'url');
    }

    public function index() {
        $data['title'] = "Perpustakaan UKSW";
        $data['dataKategori'] = $this->Kategori->GetAllKategori();
        $this->load->view('kategori_view', $data);
    }

    public function InsertKategori() {
        $data = array(
            "kategori_buku" => $this->input->post('kategori_buku')
        );
        $this->Kategori->insertKategori($data);
        $this->index();
    }

    function EditKategori($kode_kategori) {
        $data['data_edit'] = $this->Kategori->get_data_by_idKategori('kategori', $kode_kategori)->row();
        $this->load->view('edit_kategori', $data);
    }

    function UpdateKategori() {
        $data = array(
            "kode_kategori" => $this->input->post('kode_kategori'),
            "kategori_buku" => $this->input->post('kategori_buku'),
        );
        $this->Kategori->updateKategori('kategori', $this->input->post('kode_kategori'), $data);
        $this->index();
    }

    function HapusKategori($kode_kategori) {
        $this->Kategori->del_by_idKategori('kategori', $kode_kategori);
        $this->index();
    }

}

?>