<?php

  class Tb_fungsionaris extends CI_Model {

    function __construct() {
      parent:: __construct();
    }

    public function getFungsionaris($IDFungsionaris = FALSE) {
      if ($IDFungsionaris === FALSE) {
        $query = $this->db->get('tb_fungsionaris');
        return $query->result_array();
      } else {
        $query = $this->db->get_where('tb_fungsionaris', array('IDFungsionaris' => $IDFungsionaris));
        return $query->row_array();
      }
    }

    public function getLastIDFungsionaris(){
      $this->db->select_max('IDFungsionaris');
      $this->db->from('tb_fungsionaris');
      $this->db->order_by('IDFungsionaris', 'desc');
      //$this->db->limit('1');

      return $this->db->get()->row_array()['IDFungsionaris'];
    }

    public function setFungsionaris() {
      $data = array(
        'IDFungsionaris' => $this->getLastIDFungsionaris()+1,
        'NIM' => $this->input->post('NIM'),
        'Jabatan' => $this->input->post('Jabatan'),
        'Tahun' => $this->input->post('Tahun')
      );

      return $this->db->insert('tb_fungsionaris', $data);
    }

    public function updateFungsionaris($IDFungsionaris) {
      $data = array(
        'NIM' => $this->input->post('NIM'),
        'Jabatan' => $this->input->post('Jabatan'),
        'Tahun' => $this->input->post('Tahun')
      );

      $this->db->where('IDFungsionaris', $IDFungsionaris);
      return $this->db->update('tb_fungsionaris', $data);
    }

    public function deleteFungsionaris($IDFungsionaris) {
      return $this->db->delete('tb_fungsionaris', array('IDFungsionaris' => $IDFungsionaris));
    }

    public function deleteFungsionarisByNIM($NIM) {
      return $this->db->delete('tb_fungsionaris', array('NIM' => $NIM));
    }
  }

 ?>
