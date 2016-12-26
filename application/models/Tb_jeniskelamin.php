<?php

  class Tb_jeniskelamin extends CI_Model {

    function __construct() {
      parent:: __construct();
    }

    public function getJenisKelamin($IDJenisKelamin = FALSE) {
      if ($IDJenisKelamin === FALSE) {
        $query = $this->db->get('tb_jeniskelamin');
        return $query->result_array();
      } else {
        $query = $this->db->get_where('tb_jeniskelamin', array('IDJenisKelamin' => $IDJenisKelamin));
        return $query->row_array();
      }
    }

    public function setJenisKelamin() {
      $data = array(
        'IDJenisKelamin' => $this->input->post('IDJenisKelamin'),
        'DetailJenisKelamin' => $this->input->post('DetailJenisKelamin')
      );

      return $this->db->insert('tb_jeniskelamin', $data);
    }

    public function updateJenisKelamin($IDJenisKelamin) {
      $data = array(
        'DetailJenisKelamin' => $this->input->post('DetailJenisKelamin')
      );

      $this->db->where('IDJenisKelamin', $IDJenisKelamin);
      return $this->db->update('tb_jeniskelamin', $data);
    }

    public function deleteJenisKelamin($IDJenisKelamin) {
      return $this->db->delete('tb_jeniskelamin', array('IDJenisKelamin' => $IDJenisKelamin));
    }
  }

 ?>
