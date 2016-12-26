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
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > Absensi</h6>
          <div class="divider"></div>
          <h4>Absensi Kegiatan UKM Computer Club</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->
  </div>
</main>
<?php $this->load->view('template/footer'); ?>
