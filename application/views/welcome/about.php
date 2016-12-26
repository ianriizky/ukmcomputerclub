<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  if (isset($Mode)) {
    $this->load->view('template/navbar');
  } else {
    $this->load->view('template/navbar-welcome');
  }
?>
<main class="container">
  <div class="slider fullscreen" style="z-index:-1; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <ul class="slides">
      <li>
        <img class="responsive-img" src="<?php echo base_url('picture/home.png') ?>"> <!-- random image -->
        <div class="caption center-align">
          <h1>Apa itu UKM Computer Club?</h1>
          <h5 class="light">UKM Computer Club adalah salah satu unit kegiatan mahasiswa di bawah naungan Keluarga Besar Mahasiswa Politeknik Negeri Bali. UKM ini menaungi minat dan bakat mahasiswa Politeknik Negeri Bali di bidang pemanfaatan teknologi komputer, khususnya di bidang web, multimedia, dan office</h5>
        </div>
      </li>
    </ul>
  </div>
</main>

<!-- Script -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slider({full_width: true});
  });
</script>
<!-- End of script -->
