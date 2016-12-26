<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  if ($loggedIn){
    $this->load->view('template/navbar');
  } else {
    $this->load->view('template/navbar-welcome');
  }
?>
<main class="container row valign-wrapper">
  <div class="col s12 m8 offset-m2 l6 offset-l3 valign">
    <div class="card">
      <div class="card-content">
        <div class="card-title center">
          Error 404
        </div>
        <p class="center">Halaman tidak ditemukan coeg :p</p>
      </div>
      <div class="card-action center">
        <a href="<?php echo site_url(); ?>" class="btn blue">OK</a>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('template/footer'); ?>
