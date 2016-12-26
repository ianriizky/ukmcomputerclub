<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('template/navbar');
?>

<main class="container">
  <!-- Kop -->
  <div class="card black-text">
    <div class="card-content">
      <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/mahasiswa')?>">Anggota UKM</a> > Lihat Profil</h6>
      <div class="divider"></div>
      <h4>Lihat Profil</h4>
    </div>
  </div>
  <div class="card black-text">
    <div class="card-content">
      <div class="row">
        <!--Card Image -->
        <div class="col s4 offset-s4 m3 l3">
          <img class="circle responsive-img" src="<?php echo base_url(); ?>/picture/mahasiswa/<?php echo $mahasiswa_item['Foto']; ?>">
          <div class="row">
            <!--Kasi jarak-->
          </div>
        </div>
        <!--End of Card Image-->

        <!--Card Content-->
        <div class="col s12 m9 l9">
          <div class="card-content">
            <table class="highlight">
              <tr>
                <td>NIM</td>
                <td>: <?php echo $mahasiswa_item['NIM']; ?></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>: <?php echo $mahasiswa_item['Nama']; ?></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>: <?php echo date('d F Y',strtotime($mahasiswa_item['TanggalLahir'])); ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>: <?php echo $mahasiswa_item['DetailJenisKelamin']; ?></td>
              </tr>
              <tr>
                <td>Jurusan</td>
                <td>: <?php echo $mahasiswa_item['DetailJurusan']; ?></td>
              </tr>
              <tr>
                <td>Program Studi</td>
                <td>: <?php echo $mahasiswa_item['DetailProgramStudi']; ?></td>
              </tr>
              <tr>
                <td>E-mail</td>
                <td>: <?php echo $mahasiswa_item['Email']; ?></td>
              </tr>
              <tr>
                <td>Nomor HP</td>
                <td>: <?php echo $mahasiswa_item['NomorHP1'];
                if ($mahasiswa_item['NomorHP2'] != NULL) {
                  echo " / ".$mahasiswa_item['NomorHP2'];
                } ?></td>
              </tr>
              <tr>
                <td>ID Line</td>
                <td>: <?php echo $mahasiswa_item['IDLine']; ?></td>
              </tr>
              <tr>
                <td>Divisi</td>
                <td>: <?php echo $mahasiswa_item['DetailDivisi']; ?></td>
              </tr>
              <tr>
                <td>Tahun Angkatan</td>
                <td>: <?php echo $mahasiswa_item['TahunAngkatan']; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!--End of Card Content-->
      </div>
      <!--Card Action-->
      <div class="row">
        <div class="card-action right-align col s12">
          <?php if ($mahasiswa_item['Level'] == 0) { ?>
            <a href="#" onclick="verifikasiAnggota('<?php echo site_url($Mode); ?>', '<?php echo $mahasiswa_item['NIM'];?>')"><button type='button' name='button' class='btn'><i class="material-icons left">done</i>Verifikasi</button></a>
            <a href="#" onclick="hapusProfil('<?php echo site_url($Mode); ?>', '<?php echo $mahasiswa_item['NIM'];?>')"><button type='button' name='button' class='btn red'><i class="material-icons left">block</i>Tolak</button></a>
          <?php } ?>
          <a href="<?php echo site_url($Mode.'/mahasiswa')?>"><button type='button' name='button' class='btn grey darken-4'><i class="material-icons left">undo</i>Kembali</button></a>
        </div>
      </div>
  </div>
</main>

<script type="text/javascript" src="<?php echo base_url('materialize/js/profil.js'); ?>"></script>
<!-- Footer -->
<?php $this->load->view('template/footer'); ?>
