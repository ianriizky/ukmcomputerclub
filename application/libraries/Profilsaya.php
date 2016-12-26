<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class Profilsaya {

    public function ubahProfil($Mode) {
      $this->load->helper('date');
  		$this->load->model('tb_divisi');
      $this->load->model('tb_programstudi');

  		$data = $this->data;
  		$data['title'] = "Ubah Profil";
  		$data['divisi'] = $this->tb_divisi->getDivisi();
      $data['jurusan'] = $this->tb_programstudi->getJurusan();
  		$data['Mahasiswa'] = $this->tb_mahasiswa->getMahasiswaFull($this->session->userdata('NIM'));

      $this->form_validation->set_rules('Nama', "Nama Lengkap", 'required|max_length[50]',
        array('required' => 'Anda belum memasukkan %s',
              'max_length' => '%s anda lebih dari 50 karakter'));
      $this->form_validation->set_rules('TanggalLahir', "Tanggal Lahir", 'required',
        array('required' => 'Anda belum memasukkan %s'));
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

  		if ($this->form_validation->run() === FALSE) {
        $this->load->view('assets/form-ubah', $data);
      } else {
  			$this->load->library('upload', array(
          'upload_path' => './picture/mahasiswa/', //mengatur lokasi penyimpanan gambar
          'allowed_types' => 'jpg|jpeg|png',
          'overwrite' => TRUE,
          'max_size' => '2048000', //max 2MB
          'file_name' => $this->input->post('NIM')."ukm",
  				'overwrite' => TRUE
        ));
  			if (!$this->upload->do_upload('Foto')) {
          $data['error'] = $this->upload->display_errors();
        }
  			$this->tb_mahasiswa->updateMahasiswa();
  			$this->session->set_flashdata(array(
  				'message' => "Profil anda berhasil diganti",
  				'messageTitle' => "Sukses",
  				'messageType' => "success"
  			));
  			redirect(site_url($Mode.'/profil'));
  		}
    }

    public function ubahUser($Mode) {
      $data = $this->data;
  		$data['title'] = "Lihat Profil";
  		$this->form_validation->set_rules('Username', 'Username', 'required|min_length[7]|max_length[12]|alpha_numeric_spaces',
  			array('required' => 'Anda belum memasukkan %s',
  						'min_length' => '%s anda kurang dari 7 karakter',
  						'max_length' => '%s anda lebih dari 12 karakter',
  						'alpha_numeric_spaces' => '% harus terdiri dari karakter dan angka saja'
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
        $this->tb_user->updateUser($this->session->userdata('NIM'));
  			$this->session->set_flashdata(array(
  				'message' => "Username dan Password anda berhasil diganti",
  				'messageTitle' => "Sukses",
  				'messageType' => "success"
  			));
  			redirect(site_url($Mode.'/profil'));
      }
    }
  }
