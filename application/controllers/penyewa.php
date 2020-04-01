<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penyewa extends CI_Controller
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
        // } elseif ($this->session->userdata('level') == "user") {
        //     redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') != "admin" and $this->session->userdata('level') != "user") {
            redirect('auth', 'refresh');
        }
    }


    public function index()
    {
        $data['title'] = 'List Penyewa';
        $result =  $this->curl->simple_get($this->API . '/penyewa');
        $data['penyewa'] = json_decode($result, true);
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('penyewa/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('template/header', $data);
            $this->load->view('penyewa/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            redirect('user', 'refresh');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('level') == "user") {
            if (isset($_POST['submit'])) {
                $data = array(
                    'nama_penyewa'      =>  $this->input->post('nama_penyewa'),
                    'no_hp'             =>  $this->input->post('no_hp'),
                    'jenis_kelamin'     =>  $this->input->post('jenis_kelamin')
                );
                $insert =  $this->curl->simple_post($this->API . '/penyewa', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($insert) {
                    $this->session->set_flashdata('result', 'Added data successfully!!');
                } else {
                    $this->session->set_flashdata('result', 'Add data failed!!');
                }
                redirect('penyewa');
            } else {
                $data['title'] = "Added Tenant Data";
                $this->load->view('user/header', $data);
                $this->load->view('penyewa/tambah');
            }
        } else {
            redirect('auth');
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('level') == "user") {
            if (isset($_POST['submit'])) {
                $data = array(
                    'id_penyewa'        =>  $this->input->post('id_penyewa'),
                    'nama_penyewa'      =>  $this->input->post('nama_penyewa'),
                    'no_hp'             =>  $this->input->post('no_hp'),
                    'jenis_kelamin'     =>  $this->input->post('jenis_kelamin')
                );
                $update =  $this->curl->simple_put($this->API . '/penyewa', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($update) {
                    $this->session->set_flashdata('result', 'Added data successfully');
                } else {
                    $this->session->set_flashdata('result', 'Add data failed!!');
                }
                redirect('penyewa');
            } else {
                $data['penyewa'] = json_decode($this->curl->simple_get($this->API . '/penyewa?id_penyewa=' . $id));
                $data['title'] = "Form Edit Tenant";
                $this->load->view('user/header', $data);
                $this->load->view('penyewa/edit', $data);
            }
        } else {
            redirect('auth');
        }
    }
}