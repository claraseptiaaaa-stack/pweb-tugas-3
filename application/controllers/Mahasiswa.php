<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    public function __construct()
	{
		parent::__construct();

		$this->load->model('MahasiswaModel');
	}

    public function index()
	{
        $data['mahasiswa'] = $this->MahasiswaModel->getAll();
		
        $header['title'] = "Mahasiswa";
		$this->load->view('layout/header', $header);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('layout/footer');
	}

	public function about()
{
    $header['title'] = "About";

    $this->load->view('layout/header', $header);
    $this->load->view('mahasiswa/about');
    $this->load->view('layout/footer');
}

public function service()
{
    $header['title'] = "Service";

    $this->load->view('layout/header', $header);
    $this->load->view('mahasiswa/service');
    $this->load->view('layout/footer');
}

public function contact()
{
    $header['title'] = "Contact";

    $this->load->view('layout/header', $header);
    $this->load->view('mahasiswa/contact');
    $this->load->view('layout/footer');
}

	public function tambah()
	{
		if ($this->input->post()) {
			$data = [
				'mahasiswa_nim' => $this->input->post('mahasiswa_nim', true),
				'mahasiswa_nama' => $this->input->post('mahasiswa_nama', true),
			];

			$this->MahasiswaModel->insert($data);
			redirect('mahasiswa');
		}

		$data['mahasiswa'] = null;
		$data['action'] = base_url('mahasiswa/tambah');
		$data['button'] = 'Simpan';
		
		$header['title'] = 'Tambah Mahasiswa';
		$this->load->view('layout/header', $header);
		$this->load->view('mahasiswa/form', $data);
		$this->load->view('layout/footer');
	}

	public function ubah($id)
	{
		$mahasiswa = $this->MahasiswaModel->getById($id);

		if (!$mahasiswa) {
			show_404();
		}

		if ($this->input->post()) {
			$data = [
				'mahasiswa_nim' => $this->input->post('mahasiswa_nim', true),
				'mahasiswa_nama' => $this->input->post('mahasiswa_nama', true),
			];

			$this->MahasiswaModel->update($id, $data);
			redirect('mahasiswa');
		}

		$data['mahasiswa'] = $mahasiswa;
		$data['action'] = base_url('mahasiswa/ubah/' . $id);
		$data['button'] = 'Update';
		
		$header['title'] = 'Ubah Mahasiswa';
		$this->load->view('layout/header', $header);
		$this->load->view('mahasiswa/form', $data);
		$this->load->view('layout/footer');
	}

	public function hapus($id)
	{
		$this->MahasiswaModel->delete($id);
		redirect('mahasiswa');
	}
}
