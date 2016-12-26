<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Tb_mahasiswa');
    $this->load->model('Tb_user');
    $this->load->model('Tb_divisi');
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
    $data['title'] = "Divisi";
    $data['divisi'] = $this->Tb_divisi->getDivisi();
    $this->load->view('divisi/home', $data);
  }

  public function lihat($DetailDivisi) {
    $data = $this->data;
    $data['title'] = "Lihat Divisi";
    $data['divisi_item'] = $this->Tb_divisi->getDivisiByDetail($DetailDivisi);
    $this->load->view('divisi/lihat', $data);
  }

  public function tambah() {
    $data = $this->data;
    $data['title'] = "Tambah Divisi";
    $this->form_validation->set_rules('IDDivisi', 'ID Divisi', 'required|is_unique[Tb_divisi.IDDivisi]|max_length[3]',
      array('required' => 'Anda belum memasukkan %s',
            'is_unique' => '%s ini sudah terdaftar sebelumnya',
            'max_length' => 'Jumlah karakter anda lebih dari 3 karakter'));
    $this->form_validation->set_rules('DetailDivisi', 'nama divisi', 'required|is_unique[Tb_divisi.DetailDivisi]',
      array('required' => 'Anda belum memasukkan %s',
            'is_unique' => '%s ini sudah terdaftar sebelumnya'));
    $this->form_validation->set_rules('Keterangan', 'Keterangan', 'required|max_length[500]',
      array('required' => 'Anda belum memasukkan %s',
            'max_length' => 'Jumlah karakter anda lebih dari 500 karakter'));

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('divisi/tambah', $data);
    } else {
      $this->Tb_divisi->setDivisi();
      $this->session->set_flashdata(array(
				'message' => "Divisi berhasil ditambah",
				'messageTitle' => "Sukses",
				'messageType' => "success"
			));
      redirect($this->session->userdata('Mode').'/divisi');
    }
  }

  public function ubah($IDDivisi) {
    $data = $this->data;
    $data['title'] = "Ubah Divisi";
    $this->form_validation->set_rules('IDDivisi', 'ID Divisi', 'required|max_length[3]',
      array('required' => 'Anda belum memasukkan %s',
            'max_length' => 'Jumlah karakter anda lebih dari 3 karakter'));
    $this->form_validation->set_rules('DetailDivisi', 'nama divisi', 'required',
      array('required' => 'Anda belum memasukkan %s'));
    $this->form_validation->set_rules('Keterangan', 'Keterangan', 'required|max_length[500]',
      array('required' => 'Anda belum memasukkan %s',
            'max_length' => 'Jumlah karakter anda lebih dari 500 karakter'));

    if ($this->form_validation->run() === FALSE) {
      $data['divisi_item'] = $this->Tb_divisi->getDivisi($IDDivisi);
      $this->load->view('divisi/ubah', $data);
    } else {
      $this->Tb_divisi->updateDivisi($IDDivisi);
      $this->session->set_flashdata(array(
				'message' => "Divisi berhasil diubah",
				'messageTitle' => "Sukses",
				'messageType' => "success"
			));
      redirect($this->session->userdata('Mode').'/divisi');
    }
  }

  public function hapus($IDDivisi) {
    $this->Tb_divisi->deleteDivisi($IDDivisi);
  }
}
