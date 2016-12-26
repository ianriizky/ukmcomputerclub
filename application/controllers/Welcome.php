<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $data = array(); //membuat variabel global

	function __construct() {
		parent::__construct();
		$this->load->view('assets/import');
		$this->load->model('Tb_mahasiswa');
		$this->load->model('Tb_user');
		$loggedIn = $this->session->userdata('loggedInUKM');
		//isi dari variabel global
		if ($loggedIn) {
			$this->data = array('NIM' => $this->session->userdata('NIM'),
													'Username' => $this->Tb_user->getUserbyNIM($this->session->userdata('NIM')),
													'Mahasiswa' => $this->Tb_mahasiswa->getMahasiswa($this->session->userdata('NIM')),
													'LevelUKM' => $this->session->userdata('LevelUKM'));
		}
		if ($this->session->userdata('LevelUKM') == 1) {
			$this->data['Mode'] = 'admin';
		} elseif ($this->session->userdata('LevelUKM') == 2 ) {
			$this->data['Mode'] = 'anggota';
		}
	}

	public function index() {
		$data = $this->data;
		$data['title'] = "Home";
    $this->load->view('welcome/home', $data);
	}

	public function about() {
		$data = $this->data;
		$data['title'] = "About";
		$this->load->view('welcome/about', $data);
	}
}
