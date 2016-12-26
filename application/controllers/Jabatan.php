<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Tb_mahasiswa');
    $this->load->model('Tb_user');
    $this->load->model('Tb_jabatan');
		$this->load->view('assets/import');
    $loggedIn = $this->session->userdata('loggedInUKM');
    $statusLevel = $this->session->userdata('LevelUKM');
		//isi dari variabel global
		$this->data = array('NIM' => $this->session->userdata('NIM'),
												'Username' => $this->Tb_user->getUserbyNIM($this->session->userdata('NIM')),
												'Mahasiswa' => $this->Tb_mahasiswa->getMahasiswaFull($this->session->userdata('NIM')),
												'LevelUKM' => $this->session->userdata('LevelUKM'),
                        'Mode' => $this->session->userdata('Mode')); //untuk penyesuaian link
    if (!$loggedIn) {
      redirect(site_url());
    }
  }

  public function index() {
    $data = $this->data;
    $data['title'] = "Jabatan";
    $data['jabatan'] = $this->Tb_jabatan->getJabatan();
    $this->load->view('jabatan/home', $data);
  }

  public function lihat($Jabatan) {
    $data = $this->data;
    $data['title'] = "Lihat Divisi";
    $data['jabatan_item'] = $this->Tb_jabatan->getJabatanByDetail($Jabatan);
    $this->load->view('jabatan/lihat', $data);
  }

  public function tambah() {
    $data = $this->data;
    $data['title'] = "Tambah Jabatan";
    $this->form_validation->set_rules('IDJabatan', 'ID Jabatan', 'required|is_unique[Tb_jabatan.IDJabatan]|max_length[3]',
      array('required' => 'Anda belum memasukkan %s',
            'is_unique' => '%s ini sudah terdaftar sebelumnya',
            'max_length' => 'Jumlah karakter anda lebih dari 3 karakter'));
    $this->form_validation->set_rules('Jabatan', 'jabatan', 'required|is_unique[Tb_jabatan.Jabatan]',
      array('required' => 'Anda belum memasukkan %s',
            'is_unique' => '%s ini sudah terdaftar sebelumnya'));

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('jabatan/tambah', $data);
    } else {
      $this->Tb_jabatan->setJabatan();
      $this->session->set_flashdata(array(
				'message' => "Jabatan berhasil ditambah",
				'messageTitle' => "Sukses",
				'messageType' => "success"
			));
      redirect($this->session->userdata('Mode').'/jabatan');
    }
  }

  public function ubah($IDJabatan) {
    $data = $this->data;
    $data['title'] = "Ubah Jabatan";
    $this->form_validation->set_rules('IDJabatan', 'jabatan', 'required',
      array('required' => 'Anda belum memasukkan %s'));
    $this->form_validation->set_rules('Jabatan', 'jabatan', 'required',
      array('required' => 'Anda belum memasukkan %s'));

    if ($this->form_validation->run() === FALSE) {
      $data['jabatan_item'] = $this->Tb_jabatan->getJabatan($IDJabatan);
      $this->load->view('jabatan/ubah', $data);
    } else {
      $this->Tb_jabatan->updateJabatan($IDJabatan);
      $this->session->set_flashdata(array(
				'message' => "Jabatan berhasil diubah",
				'messageTitle' => "Sukses",
				'messageType' => "success"
			));
      redirect($this->session->userdata('Mode').'/jabatan');
    }
  }

  public function hapus($IDJabatan) {
    $this->Tb_jabatan->deleteJabatan($IDJabatan);
  }
}
