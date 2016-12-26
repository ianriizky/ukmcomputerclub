<?php
  /**
   *
   */
  class Tb_mahasiswa extends CI_Model {
    function __construct() {
      parent:: __construct();
      $this->load->helper('file'); //untuk delete file
    }

    public function setMahasiswa() {
      $data = array(
        'NIM' => $this->input->post('NIM'),
        'Nama' => $this->input->post('Nama'),
        'TanggalLahir' => $this->input->post('TanggalLahir'),
        'JenisKelamin' => $this->input->post('JenisKelamin'),
        'ProgramStudi' => $this->input->post('ProgramStudi'),
        'Email' => $this->input->post('Email'),
        'NomorHP1' => $this->input->post('NomorHP1'),
        'NomorHP2' => $this->input->post('NomorHP2'),
        'IDLine' => $this->input->post('IDLine'),
        'Divisi' => $this->input->post('Divisi'),
        'TahunAngkatan' => "20".substr($this->input->post('NIM'), 0, 2),
        'Foto' => $this->upload->data('file_name')
      );

      return $this->db->insert('tb_mahasiswa', $data);
    }

    public function updateMahasiswa() {
      $data = array(
        'Nama' => $this->input->post('Nama'),
        'TanggalLahir' => $this->input->post('TanggalLahir'),
        'JenisKelamin' => $this->input->post('JenisKelamin'),
        'ProgramStudi' => $this->input->post('ProgramStudi'),
        'Email' => $this->input->post('Email'),
        'NomorHP1' => $this->input->post('NomorHP1'),
        'NomorHP2' => $this->input->post('NomorHP2'),
        'IDLine' => $this->input->post('IDLine'),
        'Divisi' => $this->input->post('Divisi'),
        'TahunAngkatan' => "20".substr($this->input->post('NIM'), 0, 2),
        'Foto' => $this->upload->data('file_name')
      );
      $this->db->where('NIM', $this->input->post('NIM'));
      $this->db->update('tb_mahasiswa', $data);
    }

    public function getMahasiswa($NIM = FALSE) { //multifungsi, bisa select all dan juga select by NIM
      if ($NIM === FALSE) {
        $query = $this->db->get('tb_mahasiswa');
        //$this->db->order_by('NIM');
        return $query->result_array();
      }else {
        $query = $this->db->get_where('tb_mahasiswa', array('NIM' => $NIM));
        return $query->row_array();
      }
    }

    public function getJumlahCalon($Cari = FALSE) {
      $this->db->select("*");
      $this->db->from('tb_mahasiswa');
      $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
      $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
      $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
      $this->db->where('Level', '0');
      if ($Cari !== FALSE) {
        $this->db->group_start();
        $this->db->like('tb_mahasiswa.NIM', $Cari);
        $this->db->or_like('Nama', $Cari);
        $this->db->or_like('tb_programstudi.DetailJurusan', $Cari);
        $this->db->or_like('tb_programstudi.DetailProgramStudi', $Cari);
        $this->db->or_like('tb_divisi.DetailDivisi', $Cari);
        $this->db->group_end();
      }
      return $this->db->get()->num_rows();
    }

    public function getJumlahAnggota($Cari = FALSE) {
      $this->db->select("*");
      $this->db->from('tb_mahasiswa');
      $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
      $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
      $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
      $this->db->where('Level', '1');
      $this->db->or_where('Level', '2');
      if ($Cari !== FALSE) {
        $this->db->group_start();
        $this->db->like('tb_mahasiswa.NIM', $Cari);
        $this->db->or_like('Nama', $Cari);
        $this->db->or_like('tb_programstudi.DetailJurusan', $Cari);
        $this->db->or_like('tb_programstudi.DetailProgramStudi', $Cari);
        $this->db->or_like('tb_divisi.DetailDivisi', $Cari);
        $this->db->group_end();
      }
      return $this->db->get()->num_rows();
    }

    public function getJumlahFungsionaris($Cari = FALSE) {
      $this->db->select("*");
      $this->db->from('tb_mahasiswa');
      $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
      $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
      $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
      $this->db->join('tb_fungsionaris', 'tb_mahasiswa.NIM=tb_fungsionaris.NIM', 'inner');
      $this->db->where('Level', '1');
      if ($Cari !== FALSE) {
        $this->db->group_start();
        $this->db->like('tb_mahasiswa.NIM', $Cari);
        $this->db->or_like('Nama', $Cari);
        $this->db->or_like('tb_programstudi.DetailJurusan', $Cari);
        $this->db->or_like('tb_programstudi.DetailProgramStudi', $Cari);
        $this->db->or_like('tb_divisi.DetailDivisi', $Cari);
        $this->db->group_end();
      }
      return $this->db->get()->num_rows();
    }

    public function getMahasiswaPagination($limit=array(), $Cari = FALSE) {
      $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, TahunAngkatan, Foto, Level, tb_fungsionaris.Jabatan");
      $this->db->from('tb_mahasiswa');
      $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
      $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
      $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
      $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
      $this->db->join('tb_fungsionaris', 'tb_mahasiswa.NIM=tb_fungsionaris.NIM', 'left');
      $this->db->where('Level', '1');
      $this->db->or_where('Level', '2');
      if ($Cari !== FALSE) {
        $this->db->group_start();
        $this->db->like('tb_mahasiswa.NIM', $Cari);
        $this->db->or_like('Nama', $Cari);
        $this->db->or_like('tb_programstudi.DetailJurusan', $Cari);
        $this->db->or_like('tb_programstudi.DetailProgramStudi', $Cari);
        $this->db->or_like('tb_divisi.DetailDivisi', $Cari);
        $this->db->group_end();
      }
      if ($limit!=NULL) {
        $this->db->limit($limit['perpage'], $limit['offset']);
      }
      return $this->db->get()->result_array();
    }

    public function getMahasiswaFull($NIM = FALSE) { //menampilkan detail jurusan, detail program studi, dan detail divisi dengan cara inner join
      if ($NIM === FALSE) {
        $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, TahunAngkatan, Foto, Level");
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
        $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
        $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
        $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
        $this->db->where('Level', '1');
        $this->db->or_where('Level', '2');
        $this->db->order_by('tb_mahasiswa.created_at');
        $query = $this->db->get();
        return $query->result_array();
      }else {
        $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, TahunAngkatan, Foto, Level");
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
        $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
        $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
        $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
        $this->db->where('tb_mahasiswa.NIM', $NIM);
        $query = $this->db->get();
        return $query->row_array();
      }
    }

    //new
    public function getAdminPagination($limit=array(), $Cari) {
      $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, tb_jabatan.Jabatan, TahunAngkatan, Foto, Level");
      $this->db->from('tb_mahasiswa');
      $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
      $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
      $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
      $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
      $this->db->join('tb_fungsionaris', 'tb_mahasiswa.NIM=tb_fungsionaris.NIM', 'inner');
      $this->db->join('tb_jabatan', 'tb_fungsionaris.Jabatan=tb_jabatan.IDJabatan', 'inner');
      $this->db->where('Level', '1');
      if ($Cari !== FALSE) {
        $this->db->group_start();
        $this->db->like('tb_mahasiswa.NIM', $Cari);
        $this->db->or_like('Nama', $Cari);
        $this->db->or_like('tb_programstudi.DetailJurusan', $Cari);
        $this->db->or_like('tb_programstudi.DetailProgramStudi', $Cari);
        $this->db->or_like('tb_divisi.DetailDivisi', $Cari);
        $this->db->group_end();
      }
      $this->db->order_by('tb_mahasiswa.created_at', 'desc');
      if ($limit!=NULL) {
        $this->db->limit($limit['perpage'], $limit['offset']);
      }
      return $this->db->get()->result_array();
    }

    public function getAdminFull($NIM = FALSE) { //menampilkan detail jurusan, detail program studi, dan detail divisi dengan cara inner join
      if ($NIM === FALSE) {
        $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, tb_jabatan.Jabatan, TahunAngkatan, Foto, Level");
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
        $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
        $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
        $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
        $this->db->join('tb_fungsionaris', 'tb_mahasiswa.NIM=tb_fungsionaris.NIM', 'inner');
        $this->db->join('tb_jabatan', 'tb_fungsionaris.Jabatan=tb_jabatan.IDJabatan', 'inner');
        $this->db->where('Level', '1');
        $this->db->order_by('created_at');
        $query = $this->db->get();
        return $query->result_array();
      }else {
        $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, tb_jabatan.Jabatan, TahunAngkatan, Foto, Level");
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
        $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
        $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
        $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
        $this->db->join('tb_fungsionaris', 'tb_mahasiswa.NIM=tb_fungsionaris.NIM', 'inner');
        $this->db->join('tb_jabatan', 'tb_fungsionaris.Jabatan=tb_jabatan.IDJabatan', 'inner');
        $this->db->where('tb_mahasiswa.NIM', $NIM);
        $query = $this->db->get();
        return $query->row_array();
      }
    }

    public function getCalonMahasiswaFull($NIM = FALSE) { //Dianggap calon ketika Level == 0
      if ($NIM === FALSE) {
        $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, TahunAngkatan, Foto, Level");
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
        $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
        $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
        $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
        $this->db->where('Level', '0');
        $this->db->order_by('tb_mahasiswa.created_at');
        $query = $this->db->get();
        return $query->result_array();
      }else {
        $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, TahunAngkatan, Foto, Level");
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
        $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
        $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
        $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
        $this->db->where('Level', '0');
        $this->db->where('tb_mahasiswa.NIM', $NIM);
        $query = $this->db->get();
        return $query->row_array();
      }
    }

    public function getCalonMahasiswaPagination($limit=array(), $Cari) {
      $this->db->select("tb_mahasiswa.NIM, Nama, TanggalLahir, tb_jeniskelamin.IDJenisKelamin, tb_jeniskelamin.DetailJenisKelamin, tb_programstudi.Jurusan, tb_programstudi.DetailJurusan, tb_programstudi.ProgramStudi, tb_programstudi.DetailProgramStudi, Email, NomorHP1, NomorHP2, IDLine, tb_divisi.IDDivisi, tb_divisi.DetailDivisi, TahunAngkatan, Foto, Level");
      $this->db->from('tb_mahasiswa');
      $this->db->join('tb_programstudi', 'tb_mahasiswa.ProgramStudi=tb_programstudi.ProgramStudi', 'inner');
      $this->db->join('tb_divisi', 'tb_mahasiswa.Divisi=tb_divisi.IDDivisi', 'inner');
      $this->db->join('tb_jeniskelamin', 'tb_mahasiswa.JenisKelamin=tb_jeniskelamin.IDJenisKelamin', 'left');
      $this->db->join('tb_user', 'tb_mahasiswa.NIM=tb_user.NIM', 'inner');
      $this->db->where('Level', '0');
      if ($Cari !== FALSE) {
        $this->db->group_start();
        $this->db->like('tb_mahasiswa.NIM', $Cari);
        $this->db->or_like('Nama', $Cari);
        $this->db->or_like('tb_programstudi.DetailJurusan', $Cari);
        $this->db->or_like('tb_programstudi.DetailProgramStudi', $Cari);
        $this->db->or_like('tb_divisi.DetailDivisi', $Cari);
        $this->db->group_end();
      }
      $this->db->order_by('tb_mahasiswa.created_at', 'desc');
      if ($limit!=NULL) {
        $this->db->limit($limit['perpage'], $limit['offset']);
      }
      return $this->db->get()->result_array();
    }

    public function deleteMahasiswa($NIM) {
      return $this->db->delete('tb_mahasiswa', array('NIM' => $NIM));
    }
  }

 ?>
