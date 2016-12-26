<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Tb_pengumuman');
    $this->load->model('Tb_mahasiswa');
		$this->load->model('Tb_user');
		$this->load->view('assets/import');
		$this->load->helper('date');
    $this->load->library('pagination');
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

  public function index($offset = 0) { //with pagination
    if ($this->uri->segment(3) == 'all') {
      $this->session->unset_userdata('Cari');
    }
    $data = $this->data;
    $data['title'] = "Pengumuman";
    $data['no'] = $offset+1; //memberikan isi nomor pada tabel
    //tentukan jumlah data per halaman
    $perpage = 10;
    if ($this->input->post('Cari') != NULL) {
      $this->session->set_userdata('Cari', $this->input->post('Cari'));
    }
    $limit['perpage'] = $perpage;
    $limit['offset'] = $offset;
    //konfigurasi tampilan paging
    $config = array(
      'base_url' => site_url($this->session->userdata('Mode').'/pengumuman'),
      'total_rows' => $this->Tb_pengumuman->getJumlahPengumuman($this->session->userdata('Cari')),
      'per_page' => $perpage,
      'full_tag_open' => "<ul class='pagination'>",
      'full_tag_close' => "</ul>",
      'num_tag_open' => "<li>",
      'num_tag_close' => "</li>",
      'cur_tag_open' => "<li class='active blue'><a href='#'>",
      'cur_tag_close' => "</a></li>",
      'next_tag_open' => "<li>",
      'next_tagl_close' => "</li>",
      'prev_tag_open' => "<li>",
      'prev_tagl_close' => "</li>",
      'first_tag_open' => "<li>",
      'first_tagl_close' => "</li>",
      'last_tag_open' => "<li>",
      'last_tagl_close' => "</li>",
    );
    $this->pagination->initialize($config);
    $data['pengumuman'] = $this->Tb_pengumuman->getPengumumanPagination($limit, $this->session->userdata('Cari'));
    $data['waktulalu'] = array();
    foreach ($this->Tb_pengumuman->getPengumumanPagination($limit, $this->session->userdata('Cari')) as $waktulalu) {
      $data['waktulalu'][$waktulalu['IDPengumuman']] = $this->checkDifferenceNow($waktulalu['created_at'])." yang lalu";
    }
    $this->load->view('pengumuman/home', $data);
  }

  public function lihat($Link) {
    $data = $this->data;
    $data['title'] = "Lihat Pengumuman";
    $data['pengumuman_item'] = $this->Tb_pengumuman->getPengumuman($Link);
    $this->load->view('pengumuman/lihat', $data);
  }

  public function tambah() {
    $data = $this->data;
    $data['title'] = "Tambah Pengumuman";
    $data['IDPengumuman'] = $this->Tb_pengumuman->getLastIDPengumuman()+1;
    $this->form_validation->set_rules('IDPengumuman', 'ID Pengumuman', 'required',
      array('required' => 'Anda belum memasukkan %s'));
    $this->form_validation->set_rules('NIM', 'NIM', 'required',
      array('required' => 'Anda belum memasukkan %s'));
    $this->form_validation->set_rules('Judul', 'Judul pengumuman', 'required|max_length[20]|is_unique[Tb_pengumuman.Judul]',
      array('required' => 'Anda belum memasukkan %s',
            'max_length' => 'Jumlah karakter anda lebih dari 20 karakter',
            'is_unique' => '%s ini sudah terdaftar sebelumnya'));
    $this->form_validation->set_rules('Isi', 'Isi pengumuman', 'required|max_length[500]',
      array('required' => 'Anda belum memasukkan %s',
            'max_length' => 'Jumlah karakter anda lebih dari 250 karakter'));

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('pengumuman/tambah', $data);
    } else {
      $this->Tb_pengumuman->setPengumuman();
      $this->session->set_flashdata(array(
				'message' => "Pengumuman berhasil ditambah",
				'messageTitle' => "Sukses",
				'messageType' => "success"
			));
      redirect($this->session->userdata('Mode').'/pengumuman');
    }
  }

  public function ubah($IDPengumuman) {
    $data = $this->data;
    $data['title'] = 'Ubah Pengumuman';
    $this->form_validation->set_rules('IDPengumuman', 'IDPengumuman', 'required',
      array('required' => 'Anda belum memasukkan %s'));
    $this->form_validation->set_rules('NIM', 'NIM', 'required',
      array('required' => 'Anda belum memasukkan %s'));
    $this->form_validation->set_rules('Judul', 'judul pengumuman', 'required|max_length[20]',
      array('required' => 'Anda belum memasukkan %s',
            'max_length' => 'Jumlah karakter anda lebih dari 20 karakter'));
    $this->form_validation->set_rules('Isi', 'isi pengumuman', 'required|max_length[500]',
      array('required' => 'Anda belum memasukkan %s',
            'max_length' => 'Jumlah karakter anda lebih dari 500 karakter'));

    if ($this->form_validation->run() === FALSE) {
      $data['pengumuman_item'] = $this->Tb_pengumuman->getPengumumanID($IDPengumuman);
      $this->load->view('pengumuman/ubah', $data);
    } else {
      $this->Tb_pengumuman->updatePengumuman($IDPengumuman);
      $this->session->set_flashdata(array(
				'message' => "Pengumuman berhasil diubah",
				'messageTitle' => "Sukses",
				'messageType' => "success"
			));
      redirect($this->session->userdata('Mode').'/pengumuman');
    }
  }

  public function hapus($IDPengumuman) {
    $this->Tb_pengumuman->deletePengumuman($IDPengumuman);
  }

  public function checkDifferenceNow($content) {
    date_default_timezone_set("Asia/Makassar");
		$now = new DateTime();
    $content = new DateTime($content);
    $interval = $content->diff($now);
		if ($interval->y > 0) {
			return $time->y." tahun ";
		}
		else if ($interval->m > 0) {
			return $interval->m." bulan ";
		}
		else if ($interval->d > 0) {
			return $interval->d." hari ";
		}
		else if ($interval->h > 0) {
			return $interval->h." jam ";
		}
		else if ($interval->i > 0) {
			return $interval->i." menit ";
		}
		else if ($interval->s >= 0) {
			return $interval->s." detik ";
		}
	}
}
