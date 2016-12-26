<?php

  class Tb_jabatan extends CI_Model {

    function __construct() {
      parent:: __construct();
    }

    public function getJabatan($IDJabatan = FALSE) {
      if ($IDJabatan === FALSE) {
        $query = $this->db->get('tb_jabatan');
        return $query->result_array();
      } else {
        $query = $this->db->get_where('tb_jabatan', array('IDJabatan' => $IDJabatan));
        return $query->row_array();
      }
    }

    public function getJumlahJabatan() {
      return $this->db->get('tb_jabatan')->num_rows();
    }

    public function getJabatanByDetail($Jabatan) {
      $query = $this->db->get_where('tb_jabatan', array('Jabatan' => $Jabatan));
      return $query->row_array();
    }

    public function setJabatan() {
      $data = array(
        'IDJabatan' => $this->input->post('IDJabatan'),
        'Jabatan' => $this->input->post('Jabatan')
      );

      return $this->db->insert('tb_jabatan', $data);
    }

    public function updateJabatan($IDJabatan) {
      $data = array(
        'Jabatan' => $this->input->post('Jabatan')
      );

      $this->db->where('IDJabatan', $IDJabatan);
      return $this->db->update('tb_jabatan', $data);
    }

    public function deleteJabatan($IDJabatan) {
      return $this->db->delete('tb_jabatan', array('IDJabatan' => $IDJabatan));
    }
  }

 ?>
