<?php
defined('BASEPATH') or exit('No direct scrip accsess allowed');

class Admin extends CI_Controller
{
    public function__construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])-row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['bukku'] = $this->ModelBuku->getBuku()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/index', $data);
        $this->load->view('templates/footer');

    }
}