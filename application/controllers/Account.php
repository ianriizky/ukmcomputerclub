<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('date');
    $this->load->model('Tb_divisi');
    $this->load->model('Tb_programstudi');
    $this->load->model('Tb_mahasiswa');
    $this->load->model('Tb_user');
    $this->load->model('Tb_jeniskelamin');
    $this->load->view('assets/import');
  }

  public function login() {
    $data['title'] = "Login";
    $this->form_validation->set_rules('Username', 'Username', 'required');
    $this->form_validation->set_rules('Password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('account/form-login', $data);
    } else {
      $account = $this->Tb_user->checkLogin();
      if (count($account) > 1 ) {
          // kalau ada set session
          $arrayItems = array('NIM' => $account['NIM'],
                              'LevelUKM' => $account['Level'],
                              'loggedInUKM' => true);
          $this->session->sess_expire_on_close = 'true';
          $this->session->set_userdata($arrayItems);
          $this->checkLevel();
      } else {
          // kalau gak ada di redirect lagi ke halaman Login
          $this->session->set_flashdata(array(
    				'message' => "Username atau Password anda salah",
    				'messageTitle' => "Gagal",
    				'messageType' => "error"
    			));
          $this->load->view('account/form-login', $data);
      }
    }
  }

  public function signup() {
    $data['tahun'] =  mdate('%Y', now());
    $data['jeniskelamin'] = $this->Tb_jeniskelamin->getJenisKelamin();
    $data['divisi'] = $this->Tb_divisi->getDivisi();
    $data['jurusan'] = $this->Tb_programstudi->getJurusan();
    $data['title'] = "Sign-Up";

    $this->form_validation->set_rules('NIM', "NIM", 'required|min_length[10]|is_unique[Tb_mahasiswa.NIM]|numeric',
      array('required' => 'Anda belum memasukkan %s',
            'min_length' => '%s anda kurang dari 10 digit',
            'is_unique' => '%s ini sudah terdaftar sebelumnya',
            'numeric' => '%s anda tidak valid'));
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
      $this->load->view('account/form-signup', $data);
    } else {
      //konfigurasi upload
      $config['upload_path'] = './picture/mahasiswa/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['max_size'] = '2048000';
      $config['file_name'] = 'default.png';
      $this->load->library('upload', $config);
      if (isset($_FILES['Foto']['size']) && $_FILES['Foto']['size']>0) {
        $config['file_name'] = $this->input->post('NIM').'ukm';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('Foto')) {
          $data['error'] = $this->upload->display_errors();
          $this->load->view('account/form-signup', $data);
        }
      }
      $this->Tb_mahasiswa->setMahasiswa(); //Masukkan data ke Tb_mahasiswa
      $this->Tb_user->setUser(); //Masukkan data ke Tb_user sebagai calon (Level = 0)
      $this->load->view('assets/success');
    }
  }

  public function ambilData() {
    $Jurusan=$this->input->post('Jurusan');
    foreach ($this->Tb_programstudi->getProgramStudibyJurusan($Jurusan) as $data) {
      echo "<option value=".$data['ProgramStudi'].">".$data['DetailProgramStudi']."</option>";
    }
  }

  public function checkLevel() { //khusus admin
    $data['Username'] = $this->Tb_user->getUserbyNIM($this->session->userdata('NIM'));
		$data['Mahasiswa'] = $this->Tb_mahasiswa->getMahasiswa($this->session->userdata('NIM'));
    $data['LevelUKM'] = $this->session->userdata('LevelUKM');
    if ($this->session->userdata('LevelUKM')==1) { //Jika Administrator
      $data['title'] = "Level";
      $data['Mode'] = "admin"; //penyesuaian link agar dinamis
      $this->load->view('account/form-level', $data);
    } else if ($this->session->userdata('LevelUKM')==2) { //Jika Anggota
      redirect(site_url('anggota'));
    } else if ($this->session->userdata('LevelUKM')==0){ //Jika Calon
      $data['title'] = "Konfirmasi";
      $this->session->sess_destroy();
      $this->load->view('assets/konfirmasi');
    } else {
      redirect(site_url());
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect(site_url());
  }
}
