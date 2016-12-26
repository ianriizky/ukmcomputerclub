<?php

class Tb_pengumuman extends CI_Model {

  function __construct() {
    parent:: __construct();
  }

  public function getPengumuman($Link = FALSE) {
    if ($Link === FALSE) {
      $this->db->select('IDPengumuman, tb_pengumuman.NIM, tb_user.Username, Judul, Isi, Link, tb_pengumuman.created_at, tb_pengumuman.updated_at');
      $this->db->from('tb_pengumuman');
      $this->db->join('tb_user', 'tb_pengumuman.NIM=tb_user.NIM', 'inner');
      $this->db->order_by('created_at', 'desc');
      $query = $this->db->get();
      return $query->result_array();
    } else {
      $this->db->select('IDPengumuman, tb_pengumuman.NIM, tb_user.Username, Judul, Isi, Link, tb_pengumuman.created_at, tb_pengumuman.updated_at');
      $this->db->from('tb_pengumuman');
      $this->db->join('tb_user', 'tb_pengumuman.NIM=tb_user.NIM', 'inner');
      $this->db->where('Link', $Link);
      $query = $this->db->get();
      return $query->row_array();
    }
  }

  public function getPengumumanPagination($limit=array(), $Cari = FALSE) {
    $this->db->select('IDPengumuman, tb_pengumuman.NIM, tb_user.Username, Judul, Isi, Link, tb_pengumuman.created_at, tb_pengumuman.updated_at');
    $this->db->from('tb_pengumuman');
    $this->db->join('tb_user', 'tb_pengumuman.NIM=tb_user.NIM', 'inner');
    if ($Cari !== FALSE) {
      $this->db->group_start();
      $this->db->like('tb_pengumuman.NIM', $Cari);
      $this->db->or_like('tb_user.Username', $Cari);
      $this->db->or_like('Judul', $Cari);
      $this->db->group_end();
    }
    if ($limit!=NULL) {
      $this->db->limit($limit['perpage'], $limit['offset']);
    }
    $this->db->order_by('created_at', 'desc');
    return $this->db->get()->result_array();
  }

  public function getPengumumanID($IDPengumuman = FALSE) {
    $query = $this->db->get_where('tb_pengumuman', array('IDPengumuman' => $IDPengumuman));
    return $query->row_array();
  }

  public function getLastIDPengumuman(){
    $this->db->select_max('IDPengumuman');
    $this->db->from('tb_pengumuman');
    $this->db->order_by('IDPengumuman', 'desc');
    //$this->db->limit('1');

    return $this->db->get()->row_array()['IDPengumuman'];
  }

  public function getJumlahPengumuman($Cari = FALSE) {
    $this->db->select('*');
    $this->db->from('tb_pengumuman');
    $this->db->join('tb_user', 'tb_pengumuman.NIM=tb_user.NIM', 'inner');
    $this->db->where('tb_pengumuman.created_at >=', date("Y-m-d").' 00:00:00');
    $this->db->where('tb_pengumuman.created_at <=', date("Y-m-d").' 23:59:59');
    if ($Cari !== FALSE) {
      $this->db->group_start();
      $this->db->like('tb_pengumuman.NIM', $Cari);
      $this->db->or_like('tb_user.Username', $Cari);
      $this->db->or_like('Judul', $Cari);
      $this->db->group_end();
    }
    return $this->db->get()->num_rows();
  }

  public function setPengumuman() {
    $Link = url_title($this->input->post('Judul'), 'dash', TRUE);

    $data = array(
      'IDPengumuman' => $this->input->post('IDPengumuman'),
      'NIM' => $this->input->post('NIM'),
      'Judul' => $this->input->post('Judul'),
      'Isi' => $this->input->post('Isi'),
      'Link' => $Link
    );

    return $this->db->insert('tb_pengumuman', $data);
  }

  public function updatePengumuman($IDPengumuman) {
    $Link = url_title($this->input->post('Judul'), 'dash', TRUE);

    $data = array(
      'NIM' => $this->input->post('NIM'),
      'Judul' => $this->input->post('Judul'),
      'Isi' => $this->input->post('Isi'),
      'Link' => $Link
    );

    $this->db->where('IDPengumuman', $IDPengumuman);
    return $this->db->update('tb_pengumuman', $data);
  }

  public function deletePengumuman($IDPengumuman) {
    return $this->db->delete('tb_pengumuman', array('IDPengumuman' => $IDPengumuman));
  }
}
