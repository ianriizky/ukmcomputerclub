<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('template/navbar');
?>
<main class="container">
  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > Anggota UKM</h6>
          <div class="divider"></div>
          <h4>Daftar Anggota UKM Computer Club</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12 m12 l4">
      <?php $this->load->view('mahasiswa\menu-calon.php') ?>
    </div>
    <div class="col s12 m12 l4">
      <?php $this->load->view('mahasiswa\menu-anggota.php') ?>
    </div>
    <div class="col s12 m12 l4">
      <?php $this->load->view('mahasiswa\menu-fungsionaris.php') ?>
    </div>
    <!-- End of Second Row -->
  </div>
</main>
<script type="text/javascript" src="<?php echo base_url('materialize/js/profil.js'); ?>"></script>
<?php $this->load->view('template/footer'); ?>
