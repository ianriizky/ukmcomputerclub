<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Tb_mahasiswa');
    $this->load->model('Tb_fungsionaris');
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

  public function index() { //with pagination
    $data = $this->data;
    $data['title'] = "Mahasiswa";

    $data['jumlahCalon'] = $this->Tb_mahasiswa->getJumlahCalon();
    $data['jumlahAnggota'] = $this->Tb_mahasiswa->getJumlahAnggota();
    $data['jumlahFungsionaris'] = $this->Tb_mahasiswa->getJumlahFungsionaris();
    $this->load->view('mahasiswa/home', $data);
  }

  public function daftarCalon($offset = 0) {
    if ($this->uri->segment(4) == 'all') {
      $this->session->unset_userdata('Cari');
    }
    $data = $this->data;
    $data['title'] = "Calon Anggota UKM";
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
      'base_url' => site_url($this->session->userdata('Mode').'/mahasiswa/daftar-calon/'),
      'total_rows' => $this->Tb_mahasiswa->getJumlahCalon($this->session->userdata('Cari')),
      'per_page' => $perpage,
      'full_tag_open' => "<ul class='pagination'>",
      'full_tag_close' => "</ul>",
      'num_tag_open' => "<li>",
      'num_tag_close' => "</li>",
      'cur_tag_open' => "<li class='active teal'><a href='#'>",
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
    $data['calon'] = $this->Tb_mahasiswa->getCalonMahasiswaPagination($limit, $this->session->userdata('Cari'));
    $this->load->view('mahasiswa/daftar-calon', $data);
  }

  public function daftarAnggota($offset = 0) {
    if ($this->uri->segment(4) == 'all') {
      $this->session->unset_userdata('Cari');
    }
    $data = $this->data;
    $data['title'] = "Anggota UKM";
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
      'base_url' => site_url($this->session->userdata('Mode').'/mahasiswa/daftar-anggota/'),
      'total_rows' => $this->Tb_mahasiswa->getJumlahAnggota($this->session->userdata('Cari')),
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
    $data['anggota'] = $this->Tb_mahasiswa->getMahasiswaPagination($limit, $this->session->userdata('Cari'));
    $this->load->view('mahasiswa/daftar-anggota', $data);
  }

  public function daftarFungsionaris($offset = 0) {
    if ($this->uri->segment(4) == 'all') {
      $this->session->unset_userdata('Cari');
    }
    $data = $this->data;
    $data['title'] = "Fungsionaris UKM";
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
      'base_url' => site_url($this->session->userdata('Mode').'/mahasiswa/daftar-fungsionaris/'),
      'total_rows' => $this->Tb_mahasiswa->getJumlahFungsionaris($this->session->userdata('Cari')),
      'per_page' => $perpage,
      'full_tag_open' => "<ul class='pagination'>",
      'full_tag_close' => "</ul>",
      'num_tag_open' => "<li>",
      'num_tag_close' => "</li>",
      'cur_tag_open' => "<li class='active red'><a href='#'>",
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
    $data['admin'] = $this->Tb_mahasiswa->getAdminPagination($limit, $this->session->userdata('Cari'));
    $this->load->view('mahasiswa/daftar-fungsionaris', $data);
  }

  public function lihatProfil($NIM = FALSE) {
    $data = $this->data;
    $data['title'] = "Lihat Profil";
    if ($NIM === FALSE) {
      echo "LOL";
    } else {
      $data['mahasiswa_item'] = $this->Tb_mahasiswa->getMahasiswaFull($NIM);
      $this->load->view('mahasiswa/lihat-profil', $data);
    }
  }

  public function tambahFungsionaris($NIM = FALSE) {
    $data = $this->data;
    $data['title'] = "Tambah Fungsionaris";
    if ($NIM === FALSE) {
      echo "LOL";
    } else {
      $this->form_validation->set_rules('NIM', 'NIM', 'required',
        array('required' => 'Anda belum memasukkan %s'));
      $this->form_validation->set_rules('Jabatan', 'jabatan', 'required',
        array('required' => 'Anda belum memasukkan %s'));
      $this->form_validation->set_rules('Tahun', 'tahun', 'required',
        array('required' => 'Anda belum memasukkan %s'));

      if ($this->form_validation->run() === FALSE) {
        $this->load->model('Tb_jabatan');
        $data['IDFungsionaris'] = $this->Tb_fungsionaris->getLastIDFungsionaris();
        $data['jabatan'] = $this->Tb_jabatan->getJabatan();
        $data['mahasiswa_item'] = $this->Tb_mahasiswa->getMahasiswaFull($NIM);
        $this->load->view('mahasiswa/tambah-fungsionaris', $data);
      } else {
        $this->Tb_fungsionaris->setFungsionaris();
        $this->Tb_user->toAdmin($this->input->post('NIM'));
        $this->session->set_flashdata(array(
  				'message' => "Status mahasiswa berhasil dinaikkan menjadi fungsionaris",
  				'messageTitle' => "Sukses",
  				'messageType' => "success"
  			));
        redirect($this->session->userdata('Mode').'/mahasiswa/daftar-anggota');
      }
    }
  }

  public function hapusMahasiswa($NIM) {
    $this->Tb_mahasiswa->deleteMahasiswa($NIM);
    $this->Tb_user->deleteUser($NIM);
    $this->Tb_fungsionaris->deleteFungsionarisByNIM($NIM);
  }

  public function hapusFungsionaris($NIM) {
    $this->Tb_fungsionaris->deleteFungsionarisByNIM($NIM);
    $this->Tb_user->toAnggota($NIM);
  }

  public function verifikasiAnggota($NIM) {
    $this->Tb_user->calonToAnggota($NIM);
  }
}
