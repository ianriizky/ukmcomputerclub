<?php
  /**
   *
   */
  class Tb_divisi extends CI_Model {
    function __construct() {
      parent:: __construct();
    }

    public function setDivisi($data) {
      $data = array(
        'IDDivisi' => $this->input->post('IDDivisi'),
        'DetailDivisi' => $this->input->post('DetailDivisi'),
        'Keterangan' => $this->input->post('Keterangan'),
      );

      $this->db->insert('tb_divisi', $data);
    }

    public function getDivisi($IDDivisi = FALSE) { //multifungsi, bisa select all dan juga select by IDivisi
      if ($IDDivisi === FALSE) {
        $query = $this->db->get('tb_divisi');
        return $query->result_array();
      }else {
        $query = $this->db->get_where('tb_divisi', array('IDDivisi' => $IDDivisi));
        return $query->row_array();
      }
    }

    public function getDivisiByDetail($DetailDivisi) {
      $query = $this->db->get_where('tb_divisi', array('DetailDivisi' => $DetailDivisi));
      return $query->row_array();
    }

    public function getJumlahDivisi() {
      return $this->db->get('tb_divisi')->num_rows();
    }

    public function updateDivisi($IDDivisi) {
      $data = array(
        'DetailDivisi' => $this->input->post('DetailDivisi'),
        'Keterangan' => $this->input->post('Keterangan'),
      );
      $this->db->where('IDDivisi', $IDDivisi);
      return $this->db->update('tb_divisi', $data);
    }

    public function deleteDivisi($IDDivisi) {
      return $this->db->delete('tb_divisi', array('IDDivisi' => $IDDivisi));
    }
  }

 ?>
