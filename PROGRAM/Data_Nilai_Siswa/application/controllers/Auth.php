<?php

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_user');
        $this->load->model('Model_guru');
    }

    function index() {
        $this->load->view('auth/login');
    }

    function chek_login() {
    if (isset($_POST['submit'])) {
            // proses login disini

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $loginUser = $this->Model_user->chekLogin($username, $password);
            $loginGuru = $this->Model_guru->chekLogin($username, $password);
    if (!empty($loginUser)) {
                // sukses login user
                $session = array(
                    'foto'       =>  $loginUser['foto'],
                    'username'       =>  $loginUser['username']);
                $this->session->set_userdata($session);
                $this->session->set_userdata($loginUser);
                redirect('dash');
            }
            // elseif (!empty($loginGuru)) {
                
            //     $session = array(
            //         'nama_lengkap'  =>  $loginGuru['nama_guru'],
            //         'id_level_user' =>  3,
            //         'NIP'       =>  $loginGuru['NIP']);
            //     $this->session->set_userdata($session);
            //     $this->session->set_userdata($loginGuru);
            //     redirect('dash');
                // login guru
                // $session = array(

 elseif (!empty($loginGuru)) {
                // login guru
                $session = array(
                    'nama_lengkap'  =>  $loginGuru['nama_guru'],
                    'id_level_user' =>  3,
                    'id_guru'       =>  $loginGuru['id_guru']);
                $this->session->set_userdata($session);
                redirect('dash');
            }


                // 'nama_lengkap'  =>  $loginGuru['nama_guru'],
                // // 'id_level_user' =>  3,
                // 'id_guru'       =>  $loginGuru['NIP']);
                // $this->session->set_userdata($session);
                // $this->session->set_userdata($loginGuru);
                // redirect('dash');
            // }     
            else {
                // gagal login
                $this->session->set_flashdata('error','username atau password salah !!');
                redirect('auth');
            }
        } 
    }

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('auth');
    }

}