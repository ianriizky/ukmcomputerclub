<?php
  $this->load->view('template/navbar');
?>
  <main class="container row valign-wrapper">
    <div class="col s12 m10 offset-m1 l6 offset-l3 valign">
      <div class="card">
        <div class="card-content">
          <p class="center">Silahkan pilih akses di bawah ini</p>
        </div>
        <div class="card-action center">
          <a href="<?php echo site_url('admin') ?>" class="btn blue">Administrator</a>
          <a href="<?php echo site_url('anggota') ?>" class="btn blue">Anggota</a>
        </div>
      </div>
    </div>
  </main>
<?php $this->load->view('template/footer'); ?>
