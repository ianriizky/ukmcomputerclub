<?php
  /**
   *
   */
  class Tb_programstudi extends CI_Model {
    function __construct() {
      parent:: __construct();
    }

    public function setProgramStudi($data) {
      $this->db->insert('tb_programstudi', $data);
    }

    public function getProgramStudi($ProgramStudi = FALSE) { //multifungsi, bisa select all dan juga select by ProgramStudi
      if ($ProgramStudi === FALSE) {
        $query = $this->db->get('tb_programstudi');
        return $query->result_array();
      }else {
        $query = $this->db->get_where('tb_programstudi', array('ProgramStudi' => $ProgramStudi));
        return $query->row_array();
      }
    }

    public function getJurusan() {
      $this->db->select('Jurusan, DetailJurusan');
      $this->db->from('tb_programstudi');
      $this->db->group_by('Jurusan');

      return $this->db->get()->result_array();
    }

    public function getProgramStudibyJurusan($Jurusan = FALSE) { //menampilkan progam studi berdasarkan jurusan (ajax)
      $query = $this->db->get_where('tb_programstudi', array('Jurusan' => $Jurusan));
      return $query->result_array();
    }

    public function updateProgramStudi($ProgramStudi, $data) {
      $this->db->where('ProgramStudi', $ProgramStudi);
      $this->db->update('tb_programstudi', $data);
    }

    public function deleteProgramStudi($ProgramStudi) {
      return $this->db->delete('tb_programstudi', array('ProgramStudi' => $ProgramStudi));
    }
  }

 ?>
