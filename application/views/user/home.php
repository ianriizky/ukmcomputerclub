<?php $this->load->view('template/navbar'); ?>
<main class="container">
  <!-- First Row -->
  <div class="row">
    <div class="col s12">
      <?php $this->load->view('assets\menu-selamatdatang.php') ?>
    </div>
  </div>
  <!-- End of First Row -->
  <!-- Second Row -->
  <div class="row">
    <div class="col s12 m12 l4">
      <?php $this->load->view('assets\menu-waktu.php') ?>
    </div>
    <div class="col s12 m12 l8">
      <?php $this->load->view('assets\menu-pengumuman.php') ?>
    </div>
  </div>
  <!-- End of Second Row -->
  <!-- Third Row -->
  <div class="row">
    <div class="col s12 m12 l6">
      <?php $this->load->view('assets\menu-divisi.php') ?>
    </div>
    <div class="col s12 m12 l6">
      <?php $this->load->view('assets\menu-jabatan.php') ?>
    </div>
  </div>
  <!-- End of Third Row -->
</main>
<?php $this->load->view('template/footer'); ?>
