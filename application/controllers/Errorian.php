<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorian extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Tb_mahasiswa');
    $this->load->model('Tb_user');
		$this->load->view('assets/import');
    $this->load->library('pagination');
    $loggedIn = $this->session->userdata('loggedInUKM');
    $statusLevel = $this->session->userdata('LevelUKM');
		//isi dari variabel global
		$this->data = array('NIM' => $this->session->userdata('NIM'),
												'Username' => $this->Tb_user->getUserbyNIM($this->session->userdata('NIM')),
												'Mahasiswa' => $this->Tb_mahasiswa->getMahasiswaFull($this->session->userdata('NIM')),
												'LevelUKM' => $this->session->userdata('LevelUKM'),
                        'Mode' => $this->session->userdata('Mode'),
                        'loggedIn' => $loggedIn); //untuk penyesuaian link
  }

  public function index() {
    $data = $this->data;
    $data['title'] = "Error";

    $this->load->view('errors/html/errorian', $data);
  }
}
