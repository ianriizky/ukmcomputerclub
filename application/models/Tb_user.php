<?php


class Tb_user extends CI_Model {

  function __construct() {
    parent:: __construct();
  }

  function checkLogin() {
    $Username = $this->input->post('Username', true);
    $Password = $this->input->post('Password', true);
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('Username', $Username);
    $this->db->or_where('NIM', $Username);
    $this->db->where('Password', base64_encode($Password));
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getUser($Username = FALSE) { //multifungsi, bisa select all dan juga select by NIM
    if ($Username === FALSE) {
      $query = $this->db->get('tb_user');
      //$this->db->order_by('NIM');
      return $query->result_array();
    }else {
      $query = $this->db->get_where('tb_user', array('Username' => $Username));
      return $query->row_array();
    }
  }

  public function getUserbyNIM($NIM = FALSE) { //multifungsi, bisa select all dan juga select by NIM
    if ($NIM === FALSE) {
      $query = $this->db->get('tb_user');
      //$this->db->order_by('NIM');
      return $query->result_array();
    }else {
      $query = $this->db->get_where('tb_user', array('NIM' => $NIM));
      return $query->row_array();
    }
  }

  public function setUser() {
    $data = array(
      'NIM' => $this->input->post('NIM'),
      'Username' => $this->input->post('NIM'),
      //'Password' => $this->base64_encrypt(str_replace("-","", $this->input->post('TanggalLahir')), "011235"), //mengencrypt password tanggal lahir input dengan kode encrypt "011235"
      'Password' => base64_encode(str_replace("-","", $this->input->post('TanggalLahir'))),
      'Level' => 0 //calon
    );

    return $this->db->insert('tb_user', $data);
  }

  public function updateUser($NIM) {
    $data = array(
      'Username' => $this->input->post('Username'),
      'Password' => base64_encode($this->input->post('Password'))
    );

    $this->db->where('NIM', $NIM);
    return $this->db->update('tb_user', $data);
  }

  public function deleteUser($NIM) {
    return $this->db->delete('tb_user', array('NIM' => $NIM));
  }

  public function toAnggota($NIM) {
    $data = array(
      'Level' => '2'
    );

    $this->db->where('NIM', $NIM);
    return $this->db->update('tb_user', $data);
  }

  public function toAdmin($NIM) {
    $data = array(
      'Level' => '1'
    );

    $this->db->where('NIM', $NIM);
    return $this->db->update('tb_user', $data);
  }

  public function get_rnd_iv($iv_len) {
    $iv = '';
    while ($iv_len-- > 0) {
      $iv .= chr(mt_rand() & 0xff);
    }
    return $iv;
  }

  //fungsi enkripsi dengan base64_decode
  public function base64_encrypt($plain_text, $password, $iv_len = 16) {
    $plain_text .= "\x13";
    $n = strlen($plain_text);
    if ($n % 16) {
      $plain_text .= str_repeat("\0", 16 - ($n % 16));
    }
    $i = 0;
    $enc_text = $this->get_rnd_iv($iv_len);
    $iv = substr($password ^ $enc_text, 0, 512);
    while ($i < $n) {
      $block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
      $enc_text .= $block;
      $iv = substr($block . $iv, 0, 512) ^ $password;
      $i += 16;
    }
    $hasil=base64_encode($enc_text);
    return str_replace('+', '@', $hasil);
  }

  public function base64_decrypt($enc_text, $password, $iv_len = 16) {
    $enc_text = str_replace('@', '+', $enc_text);
    $enc_text = base64_decode($enc_text);
    $n = strlen($enc_text);
    $i = $iv_len;
    $plain_text = '';
    $iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
    while ($i < $n) {
      $block = substr($enc_text, $i, 16);
      $plain_text .= $block ^ pack('H*', md5($iv));
      $iv = substr($block . $iv, 0, 512) ^ $password;
      $i += 16;
    }
    return preg_replace('/\\x13\\x00*$/', '', $plain_text);
  }
}
