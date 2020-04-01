<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kamar extends CI_Controller
{
    var $API = "";

    public function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/pesanHotel/api/";

        if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Sorry You Are Not Active, Please Contact Admin!!";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
    }
    public function index()
    {
        $data['title'] = 'List Room';
        $result =  $this->curl->simple_get($this->API . '/kamar');
        $data['kamar'] = json_decode($result, true);
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('kamar/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('user/header', $data);
            $this->load->view('kamar/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }
}