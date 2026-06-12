<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('MahasiswaModel');
    }

    public function index() {
        $sesi_user = $this->session->userdata('user');

        echo"<pre>";
        print_r($sesi_user);
        echo"</pre>";

        $semua_sesi = $this->session->userdata();
        echo"<pre>";
        print_r($semua_sesi);
        echo"</pre>";
    }

    public function login() {
    {
        $formulir['email'] = "clara@email.com";
        $formulir['password'] = "clara";

        $status = $this->MahasiswaModel->checkAccount($formulir);
        if ($status) {
            echo "Anda berhasil login";
        }
        else {
            echo "Periksa kembali akun anda";
        }
    }
}
}