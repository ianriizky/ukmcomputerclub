<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $data = array(); //membuat variabel global

	function __construct() {
		parent::__construct();
		$this->load->model('Tb_mahasiswa');
		$this->load->model('Tb_user');
		$this->load->view('assets/import');
		$loggedIn = $this->session->userdata('loggedInUKM');
		$this->session->set_userdata(array('Mode' => 'anggota')); //mengeset mode yang digunakan saat mengakses sistem
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
		$this->load->model('Tb_pengumuman');
		$this->load->model('Tb_divisi');
		$this->load->model('Tb_jabatan');
		$data['title'] = "Anggota";
		$data['jumlahPengumuman'] = $this->Tb_pengumuman->getJumlahPengumuman();
		$data['jumlahDivisi'] = $this->Tb_divisi->getJumlahDivisi();
		$data['jumlahJabatan'] = $this->Tb_jabatan->getJumlahJabatan();
    $this->load->view('user/home', $data);
	}

	public function profil() {
		$data = $this->data;
		$data['title'] = "Lihat Profil";
		$this->load->view('assets/view-profile', $data);
	}

	public function ubahProfil() {
		$this->load->helper('date');
		$this->load->model('Tb_divisi');
    $this->load->model('Tb_programstudi');
		$this->load->model('Tb_jeniskelamin');

		$data = $this->data;
		$data['title'] = "Ubah Profil";
		$data['jeniskelamin'] = $this->Tb_jeniskelamin->getJenisKelamin();
		$data['divisi'] = $this->Tb_divisi->getDivisi();
    $data['jurusan'] = $this->Tb_programstudi->getJurusan();
		$data['Mahasiswa'] = $this->Tb_mahasiswa->getMahasiswaFull($this->session->userdata('NIM'));

    $this->form_validation->set_rules('Nama', "Nama Lengkap", 'required|max_length[50]',
      array('required' => 'Anda belum memasukkan %s',
            'max_length' => '%s anda lebih dari 50 karakter'));
    $this->form_validation->set_rules('TanggalLahir', "Tanggal Lahir", 'required',
      array('required' => 'Anda belum memasukkan %s'));
		$this->form_validation->set_rules('JenisKelamin', 'Jenis Kelamin', 'required',
      array('required' => 'Anda belum memilih %s'));
    $this->form_validation->set_rules('Jurusan', 'Jurusan', 'required',
      array('required' => 'Anda belum memilih %s'));
    $this->form_validation->set_rules('ProgramStudi', "Program Studi", 'required',
      array('required' => 'Anda belum memilih %s'));
    $this->form_validation->set_rules('Email', "E-mail", 'valid_email',
      array('valid_email' => '%s anda tidak valid'));
    $this->form_validation->set_rules('NomorHP1', "Nomor HP", 'required|numeric',
      array('required' => 'Anda belum memasukkan %s',
            'numeric' => '%s anda tidak valid'));
    $this->form_validation->set_rules('Divisi', 'Divisi', 'required',
      array('required' => 'Anda belum memilih %s'));
		$this->form_validation->set_rules('Foto', 'Foto', 'trim|xss_clean');

		if ($this->form_validation->run() === FALSE) {
      $this->load->view('assets/form-ubah', $data);
    } else {
			$config['upload_path'] = './picture/mahasiswa/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['max_size'] = '2048000';
			$config['file_name'] = 'default.png';
			if ($this->input->post('FotoDefault') == 1) {
				 unlink('./picture/mahasiswa/'.$this->input->post('NIM').'ukm.jpg');
				 unlink('./picture/mahasiswa/'.$this->input->post('NIM').'ukm.png');
				 unlink('./picture/mahasiswa/'.$this->input->post('NIM').'ukm.jpeg');
				 $config['file_name'] = 'default.png';
			}
			$this->load->library('upload', $config);
      if (isset($_FILES['Foto']['size']) && $_FILES['Foto']['size']>0) {
        $config['file_name'] = $this->input->post('NIM').'ukm';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('Foto')) {
          $data['error'] = $this->upload->display_errors();
          $this->load->view('account/form-signup', $data);
        }
      }
			$this->Tb_mahasiswa->updateMahasiswa();
			$this->session->set_flashdata(array(
				'message' => "Profil anda berhasil diganti",
				'messageTitle' => "Sukses",
				'messageType' => "success"
			));
			redirect(site_url('anggota/profil'));
		}
	}

	public function ubahUser() {
		$data = $this->data;
		$data['title'] = "Lihat Profil";
		$this->form_validation->set_rules('Username', 'Username', 'required|min_length[7]|max_length[12]|alpha_dash',
			array('required' => 'Anda belum memasukkan %s',
						'min_length' => '%s anda kurang dari 7 karakter',
						'max_length' => '%s anda lebih dari 12 karakter',
						'alpha_numeric_spaces' => '%s harus terdiri dari karakter, angka, simbol - dan _ saja'
					));
		$this->form_validation->set_rules('Password', 'Password', 'required|min_length[5]|max_length[10]|alpha_numeric_spaces',
			array('required' => 'Anda belum memasukkan %s',
						'min_length' => '%s anda kurang dari 5 karakter',
						'max_length' => '%s anda lebih dari 10 karakter',
						'alpha_numeric_spaces' => '%s harus terdiri dari karakter dan angka saja'
					));

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata(array(
				'message' => "Username dan Password anda tidak berhasil diganti",
				'messageTitle' => "Gagal",
				'messageType' => "error"
			));
			$this->load->view('assets/view-profile', $data);
    } else {
      $this->Tb_user->updateUser($this->session->userdata('NIM'));
			$this->session->set_flashdata(array(
				'message' => "Username dan Password anda berhasil diganti",
				'messageTitle' => "Sukses",
				'messageType' => "success"
			));
			redirect(site_url('anggota/profil'));
    }
	}

	public function pengumuman() {
		redirect('anggota/pengumuman'); //diset supaya $mode tetap terjaga
	}
}
