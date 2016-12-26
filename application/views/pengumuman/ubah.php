<?php $this->load->view('template/navbar'); ?>
<main class="container">

  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/pengumuman')?>">Pengumuman</a> > Ubah</h6>
          <div class="divider"></div>
          <h4>Ubah Pengumuman</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <?php echo form_open($Mode.'/pengumuman/ubah/'.$pengumuman_item['IDPengumuman']); ?>

            <!--ID Pengumuman-->
            <div class="row">
              <div class="input-field col s12 m6 l4">
                <i class="material-icons prefix">vpn_key</i>
                <input type="text" name="IDPengumuman"  value="<?php if(!empty(set_value('IDPengumuman'))){echo set_value('IDPengumuman');}else{echo $pengumuman_item['IDPengumuman'];}; ?>" id="IDPengumuman" readonly>
                <span class="red-text"><?php echo form_error('IDPengumuman'); ?></span>
                <label for="IDPengumuman">ID Pengumuman</label>
              </div>
            </div>

            <!--NIM-->
            <div class="row">
              <div class="input-field col s12 m6 l4">
                <i class="fa fa-id-badge prefix"></i>
                <input type="text" length="10" name="NIM" value="<?php if(!empty(set_value('NIM'))){echo set_value('NIM');}else{echo $pengumuman_item['NIM'];}; ?>" id="NIM" readonly>
                <span class="red-text"><?php echo form_error('NIM'); ?></span>
                <label for="NIM">NIM</label>
              </div>
            </div>

            <!--Judul-->
            <div class="row">
              <div class="input-field col s12 m8 l6">
                <i class="material-icons prefix">label</i>
                <input type="text" length="20" name="Judul" value="<?php if(!empty(set_value('Judul'))){echo set_value('Judul');}else{echo $pengumuman_item['Judul'];}; ?>" id="Judul">
                <span class="red-text"><?php echo form_error('Judul'); ?></span>
                <label for="Judul">Judul Pengumuman</label>
              </div>
            </div>

            <!--Isi-->
            <div class="row">
              <div class="input-field col s12 m8 l10">
                <i class="material-icons prefix">create</i>
                <textarea id="Isi" name="Isi" length="500" class="materialize-textarea"><?php if(!empty(set_value('Isi'))){echo set_value('Isi');}else{echo $pengumuman_item['Isi'];}; ?></textarea>
                <span class="red-text"><?php echo form_error('Isi'); ?></span>
                <label for="Isi">Isi Pengumuman</label>
              </div>
            </div>

            <!--Tanggal dibuat-->
            <div class="row">
              <div class="input-field col s12 m6 l4">
                <i class="material-icons prefix">schedule</i>
                <input type="text" name="created_at" value="<?php echo date("d F Y h:i:s A", strtotime($pengumuman_item['created_at'])); ?>" id="created_at" readonly>
                <label for="created_at">Tanggal Dibuat</label>
              </div>
              <div class="input-field col s12 m6 l4">
                <i class="material-icons prefix">update</i>
                <input type="text" name="updated_at" value="<?php echo date("d F Y h:i:s A", strtotime($pengumuman_item['updated_at'])); ?>" id="updated_at" readonly>
                <label for="created_at">Terakhir Diubah</label>
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
  </div>
</main>
<?php $this->load->view('template/footer'); ?>
