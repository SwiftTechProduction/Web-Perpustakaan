<?php

class UserController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
        $this->load->helper('form', 'url');
    }

    public function index() {
        $data['title'] = "Perpustakaan UKSW";
        $data['dataUser'] = $this->User->GetAllUser();
        $this->load->view('user_view', $data);
    }

    public function InsertUser() {
        $data = array(
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "status" => $this->input->post('status'),
        );
        $this->User->insertUser($data);
        $this->index();
    }

    function EditUser($username) {
        $data['data_edit'] = $this->User->get_data_by_idUser('user', $username)->row();
        $this->load->view('edit_user', $data);
    }

    function UpdateUser() {
        $data = array(
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "status" => $this->input->post('status'),
        );
        $this->User->updateUser('user', $this->input->post('username'), $data);
        $this->index();
    }

    function HapusUser($username) {
        $this->User->del_by_id('user', $username);
        $this->index();
    }

}

?>