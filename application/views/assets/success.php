<?php
  $this->load->view('template/navbar-welcome');
?>
  <main class="container row valign-wrapper">
    <div class="col s12 m8 offset-m2 l6 offset-l3 valign">
      <div class="card">
        <div class="card-content">
          <p class="center">Terimakasih telah mendaftar. Silahkan melakukan konfirmasi kepada admin untuk mendapatkan username dan password anda</p>
        </div>
        <div class="card-action center">
          <a href="<?php echo site_url(); ?>" class="btn blue">OK</a>
        </div>
      </div>
    </div>
  </main>
  <?php
    $this->load->view('template/footer');
  ?>
