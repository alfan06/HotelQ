<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }
        $data['title'] = 'Hotel AZA(AL&REZ)';
        $this->load->view('auth/template/header', $data);
        $this->load->view('auth/index');
    }

    public function login()
    {
        $data['title'] = 'User Login';
        $this->load->view('auth/template/header', $data);
        $this->load->view('auth/login');
    }

    public function register()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }
        $data['title'] = 'User Register';
        $this->load->view('auth/template/header', $data);
        $this->load->view('auth/register');
    }

    public function prosesLogin()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars(MD5($this->input->post('password')));

        $cekLogin = $this->auth_model->login($username, $password);

        if ($cekLogin) {
            foreach ($cekLogin as $row);
            $this->session->set_userdata('id_user', $row->id_user);
            $this->session->set_userdata('user', $row->username);
            $this->session->set_userdata('level', $row->level);
            $this->session->set_userdata('status', $row->status);
            if ($this->session->userdata('level') == "admin") {
                redirect('admin');
            } elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Not Active") {
                $this->session->sess_destroy();
                $data['pesan'] = "Sorry You Are Not Active, Please Contact Admin!!";
                $data['title'] = 'Login User';
                $this->load->view('auth/template/header', $data);
                $this->load->view('auth/login', $data);
            } elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Active") {
                redirect('user/index');
            }
        } else {
            $data['pesan'] = "Sorry, username and password are incorrect!";
            $data['title'] = 'Login';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login');
        }
    }

    public function prosesRegister()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[passwordConf]', [
            'matches' => 'Password Doesn"t Match',
            'min_length' => 'Password minimum 6 character'
        ]);
        $this->form_validation->set_rules('passwordConf', 'Confirmation Password', 'required|trim|min_length[6]|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'User Register';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/register');
        } else {
            $this->auth_model->register();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations, your account has been created.
          </div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth', 'refresh');
    }
}
