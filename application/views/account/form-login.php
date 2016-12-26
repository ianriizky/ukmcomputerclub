  <!-- Navbar -->
  <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('template/navbar-welcome');
  ?>
  <?php
    if ($this->session->flashdata('message')): ?>
      <script>
        window.onload = function () {
          sweetAlert({
              title: "<?php echo $this->session->flashdata('messageTitle'); ?>",
              text: "<?php echo $this->session->flashdata('message'); ?>",
              showConfirmButton: true,
              confirmButtonColor: '#2196f4',
              type: '<?php echo $this->session->flashdata('messageType'); ?>'
          })
        };
      </script>
  <?php endif; ?>

  <!-- Content -->
  <main class="container valign-wrapper">
    <div class="row valign">
      <div class="col l4 offset-l4 m6 offset-m3 s10 offset-s1">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?php echo base_url('picture/bg.png'); ?>">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Login<i class="material-icons right">more_vert</i></span>
            <p>Belum terdaftar? <a href="<?php echo site_url('signup')?>">Daftar Sekarang!</a></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Login<i class="material-icons right">close</i></span>
            <?php echo form_open('login');?>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name="Username" value="<?php echo set_value('Username') ?>" id="Username">
                  <label for="Username">Username / NIM</label>
                  <span class="red-text"><?php echo form_error('Username'); ?></span>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="password" name="Password" value="" id="Password">
                  <label for="Password">Password</label>
                  <span class="red-text"><?php echo form_error('Password'); ?></span>
                </div>
              </div>
              <div class="row">
                <div class="card-action right-align col s12">
                  <button type="submit" name="action" class="waves-effect waves-light btn grey darken-4" id="Login">Login</button>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script type="text/javascript">
    function setVisibility() {
      var password = document.getElementById("Password").type;
      if (password == 'password') {
        password = 'text';
      }
      else if (password == 'text') {
        password = 'password';
      }
    }
  </script>
  <!-- Footer -->
  <?php $this->load->view('template/footer'); ?>
