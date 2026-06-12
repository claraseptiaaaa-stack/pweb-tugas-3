<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdiModel');
        $this->load->model('FakultasModel');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['prodi'] = $this->ProdiModel->getAll();

        $header['title'] = "Program Studi";
        $header['menu_aktif'] = "prodi"; // Untuk sidebar aktif (bold)

        $this->load->view('layout/header', $header);
        $this->load->view('prodi/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        // Atur aturan validasi Server-side
        $this->form_validation->set_rules('fakultas_id', 'Fakultas', 'required', ['required' => '%s wajib dipilih!']);
        $this->form_validation->set_rules('prodi_name', 'Nama Prodi', 'required', ['required' => '%s wajib diisi!']);
        $this->form_validation->set_rules('prodi_strata', 'Strata', 'required', ['required' => '%s wajib dipilih!']);

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'fakultas_id' => $this->input->post('fakultas_id'),
                'prodi_name' => $this->input->post('prodi_name'),
                'prodi_strata' => $this->input->post('prodi_strata')
            ];

            $this->ProdiModel->insert($data);
            
            $this->session->set_flashdata('success', 'Data Program Studi berhasil ditambahkan!');
            redirect('prodi');
        }

        $data['fakultas'] = $this->FakultasModel->getAll();
        $data['prodi'] = null;
        $data['button'] = 'Simpan';
        $data['action'] = base_url('prodi/tambah');

        $header['title'] = "Tambah Prodi";
        $header['menu_aktif'] = "prodi";

        $this->load->view('layout/header', $header);
        $this->load->view('prodi/form', $data);
        $this->load->view('layout/footer');
    }

    public function ubah($id)
    {
        $prodi = $this->ProdiModel->getById($id);

        // Jika data tidak ditemukan -> redirect + SweetAlert warning
        if (!$prodi) {
            $this->session->set_flashdata('warning', 'Data Program Studi tidak ditemukan!');
            redirect('prodi');
        }

        $this->form_validation->set_rules('fakultas_id', 'Fakultas', 'required', ['required' => '%s wajib dipilih!']);
        $this->form_validation->set_rules('prodi_name', 'Nama Prodi', 'required', ['required' => '%s wajib diisi!']);
        $this->form_rules = $this->form_validation->set_rules('prodi_strata', 'Strata', 'required', ['required' => '%s wajib dipilih!']);

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'fakultas_id' => $this->input->post('fakultas_id'),
                'prodi_name' => $this->input->post('prodi_name'),
                'prodi_strata' => $this->input->post('prodi_strata')
            ];

            $this->ProdiModel->update($id, $data);
            
            $this->session->set_flashdata('success', 'Data Program Studi berhasil diubah!');
            redirect('prodi');
        }

        $data['prodi'] = $prodi;
        $data['fakultas'] = $this->FakultasModel->getAll();
        $data['button'] = 'Update';
        $data['action'] = base_url('prodi/ubah/'.$id);

        $header['title'] = "Ubah Prodi";
        $header['menu_aktif'] = "prodi";

        $this->load->view('layout/header', $header);
        $this->load->view('prodi/form', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id)
    {
        $prodi = $this->ProdiModel->getById($id);
        
        if (!$prodi) {
            $this->session->set_flashdata('warning', 'Data gagal dihapus, data tidak ditemukan!');
            redirect('prodi');
        }

        $this->ProdiModel->delete($id);
        
        $this->session->set_flashdata('warning', 'Data Program Studi telah dihapus!');
        redirect('prodi');
    }
}