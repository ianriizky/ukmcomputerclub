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
            <img class="responsive-img" src="<?php echo base_url('picture/homealt.png') ?>"> <!-- random image -->
            <div class="caption center-align">
              <h1>Selamat datang di</h1>
              <h4 class="light">Sistem Absensi UKM Computer Club</h4>
              <h5 class="light">Politeknik Negeri Bali</h5>
            </div>
          </li>
          <li>
            <img src="<?php echo base_url('picture/home2.png') ?>"> <!-- random image -->
            <div class="caption left-align">
              <div class="row">
                <div class="col s8">
                  <h3 class="blue-text">"Creativity is just connecting things."</h3>
                  <h5 class="light blue-text"><i>Steve Jobs</i></h5>
                </div>
              </div>
              <div class="row">
                <div class="col s8">
                  <h3 class="blue-text">"If you are born poor its not your mistake, But if you die poor its your mistake."</h3>
                  <h5 class="light blue-text"><i>Bill Gates</i></h5>
                </div>
              </div>
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
