<?php $this->load->view('template/navbar'); ?>
<main class="container">

  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/pengumuman')?>">Pengumuman</a> > Tambah</h6>
          <div class="divider"></div>
          <h4>Tambah Pengumuman</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <?php echo form_open($Mode.'/pengumuman/tambah'); ?>

            <!--ID Pengumuman-->
            <div class="row">
              <div class="input-field col s12 m6 l4">
                <i class="material-icons prefix">vpn_key</i>
                <input type="text" name="IDPengumuman"  value="<?php echo $IDPengumuman; ?>" id="IDPengumuman" readonly>
                <span class="red-text"><?php echo form_error('IDPengumuman'); ?></span>
                <label for="IDPengumuman">ID Pengumuman</label>
              </div>
            </div>

            <!--NIM-->
            <div class="row">
              <div class="input-field col s12 m6 l4">
                <i class="fa fa-id-badge prefix"></i>
                <input type="text" length="10" name="NIM" value="<?php echo $NIM; ?>" id="NIM" readonly>
                <span class="red-text"><?php echo form_error('NIM'); ?></span>
                <label for="NIM">NIM</label>
              </div>
            </div>

            <!--Judul-->
            <div class="row">
              <div class="input-field col s12 m8 l6">
                <i class="material-icons prefix">label</i>
                <input type="text" length="20" name="Judul" id="Judul" value="<?php echo set_value('Judul'); ?>">
                <span class="red-text"><?php echo form_error('Judul'); ?></span>
                <label for="Judul">Judul Pengumuman</label>
              </div>
            </div>

            <!--Isi-->
            <div class="row">
              <div class="input-field col s12 m8 l10">
                <i class="material-icons prefix">create</i>
                <textarea id="Isi" name="Isi" length="500" class="materialize-textarea"><?php echo set_value('Isi'); ?></textarea>
                <span class="red-text"><?php echo form_error('Isi'); ?></span>
                <label for="Isi">Isi Pengumuman</label>
              </div>
            </div>

            <!--Card Action-->
            <div class="row">
              <div class="card-action right-align col s12 m12 l10">
                <input id="submit" type="submit" value="Simpan" class="btn grey darken-4">
                <a href="<?php echo site_url($Mode.'/pengumuman');?>"><button type='button' name='button' class='btn red'>Batal</button></a>
              </div>
            </div>

          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <!-- End of Second Row -->
</main>
<?php $this->load->view('template/footer'); ?>
