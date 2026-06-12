<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('FakultasModel');
        // Load library yang diperlukan untuk validasi dan alert
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['fakultas'] = $this->FakultasModel->getAll();

        $header['title'] = "Fakultas";
        $header['menu_aktif'] = "fakultas"; // Untuk sidebar aktif (bold)

        $this->load->view('layout/header', $header);
        $this->load->view('fakultas/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        // Atur aturan validasi (Server-side validation)
        $this->form_validation->set_rules('fakultas_nama', 'Nama Fakultas', 'required', [
            'required' => '%s harus diisi!'
        ]);

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'fakultas_name' => $this->input->post('fakultas_nama', true)
            ];

            $this->FakultasModel->insert($data);
            
            // Set Flashdata untuk SweetAlert Success
            $this->session->set_flashdata('success', 'Data Fakultas berhasil ditambahkan!');
            redirect('fakultas');
        }

        $data['action'] = base_url('fakultas/tambah');
        $data['button'] = 'Simpan';
        $data['fakultas'] = null;

        $header['title'] = 'Tambah Fakultas';
        $header['menu_aktif'] = "fakultas";

        $this->load->view('layout/header', $header);
        $this->load->view('fakultas/form', $data);
        $this->load->view('layout/footer');
    }

    public function ubah($id)
    {
        $fakultas = $this->FakultasModel->getById($id);

        // Jika data tidak ditemukan -> redirect + SweetAlert warning
        if (!$fakultas) {
            $this->session->set_flashdata('warning', 'Data Fakultas tidak ditemukan!');
            redirect('fakultas');
        }

        $this->form_validation->set_rules('fakultas_nama', 'Nama Fakultas', 'required', [
            'required' => '%s harus diisi!'
        ]);

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'fakultas_name' => $this->input->post('fakultas_nama', true)
            ];

            $this->FakultasModel->update($id, $data);
            
            // Set Flashdata untuk SweetAlert Success
            $this->session->set_flashdata('success', 'Data Fakultas berhasil diubah!');
            redirect('fakultas');
        }

        $data['fakultas'] = $fakultas;
        $data['action'] = base_url('fakultas/ubah/'.$id);
        $data['button'] = 'Update';

        $header['title'] = 'Ubah Fakultas';
        $header['menu_aktif'] = "fakultas";

        $this->load->view('layout/header', $header);
        $this->load->view('fakultas/form', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id)
    {
        $fakultas = $this->FakultasModel->getById($id);
        
        if (!$fakultas) {
            $this->session->set_flashdata('warning', 'Data gagal dihapus, data tidak ditemukan!');
            redirect('fakultas');
        }

        $this->FakultasModel->delete($id);
        
        // Set Flashdata untuk SweetAlert Warning (sesuai instruksi: hapus = warning)
        $this->session->set_flashdata('warning', 'Data Fakultas telah dihapus!');
        redirect('fakultas');
    }
}