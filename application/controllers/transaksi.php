<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
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
        } elseif ($this->session->userdata('level') != "admin" and $this->session->userdata('level') != "user") {
            redirect('auth', 'refresh');
        }
    }


    public function index()
    {
        $data['title'] = 'List Transaksi';
        $result =  $this->curl->simple_get($this->API . '/transaksi');
        $data['transaksi'] = json_decode($result, true);
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('user/header', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function tambah()
    {
        $result =  $this->curl->simple_get($this->API . '/penyewa');
        $data['penyewa'] = json_decode($result, true);
        $result =  $this->curl->simple_get($this->API . '/kamar');
        $data['kamar'] = json_decode($result, true);
        if ($this->session->userdata('level') == "user") {
            if (isset($_POST['submit'])) {
                $data = array(
                    "id_kamar" => $this->input->post('id_kamar', true), // ini sama dengan htmlspecialchars($_POST['nama'])
                    "id_penyewa" => $this->input->post('id_penyewa', true),
                    "tgl_sewa" => $tgl_sewa,
                    "tgl_checkout" => $tgl_checkout,
                    "status" => 'Booked'
                );
                $insert =  $this->curl->simple_post($this->API . '/transaksi', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($insert) {
                    $this->session->set_flashdata('result', 'Added data successfully!!');
                } else {
                    $this->session->set_flashdata('result', 'Add data failed!!');
                }
                redirect('transaksi');
            } else {
                $data['title'] = "Added Tenant Data";
                $this->load->view('user/header', $data);
                $this->load->view('transaksi/tambah');
            }
        } else {
            redirect('auth');
        }
    }
}