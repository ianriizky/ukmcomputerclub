<?php $this->load->view('template/navbar'); ?>
<main class="container">

  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/divisi')?>">Divisi</a> > Ubah</h6>
          <div class="divider"></div>
          <h4>Ubah Divisi</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <?php echo form_open($Mode.'/divisi/ubah/'.$divisi_item['IDDivisi']); ?>

          <!--ID Divisi-->
          <div class="row">
            <div class="input-field col s12 m6 l4">
              <i class="material-icons prefix">vpn_key</i>
              <input length="3" type="text" name="IDDivisi"  value="<?php if(!empty(set_value('IDDivisi'))){echo set_value('IDDivisi');}else{echo $divisi_item['IDDivisi'];}; ?>" id="IDDivisi" readonly>
              <span class="red-text"><?php echo form_error('IDDivisi'); ?></span>
              <label for="IDDivisi">ID Divisi</label>
            </div>
          </div>

          <!--DetailDivisi-->
          <div class="row">
            <div class="input-field col s12 m8 l6">
              <i class="material-icons prefix">label</i>
              <input type="text" length="20" name="DetailDivisi" id="DetailDivisi" value="<?php if(!empty(set_value('DetailDivisi'))){echo set_value('DetailDivisi');}else{echo $divisi_item['DetailDivisi'];}; ?>">
              <span class="red-text"><?php echo form_error('DetailDivisi'); ?></span>
              <label for="DetailDivisi">Nama Divisi</label>
            </div>
          </div>

          <!--Keterangan-->
          <div class="row">
            <div class="input-field col s12 m8 l10">
              <i class="material-icons prefix">create</i>
              <textarea id="Keterangan" name="Keterangan" length="500" class="materialize-textarea"><?php if(!empty(set_value('Keterangan'))){echo set_value('Keterangan');}else{echo $divisi_item['Keterangan'];}; ?></textarea>
              <span class="red-text"><?php echo form_error('Keterangan'); ?></span>
              <label for="Keterangan">Keterangan</label>
            </div>
          </div>

            <!--Card Action-->
            <div class="row">
              <div class="card-action right-align col s12 m12 l10">
                <input id="submit" type="submit" value="Simpan" class="btn grey darken-4">
                <a href="<?php echo site_url($Mode.'/divisi');?>"><button type='button' name='button' class='btn red'>Batal</button></a>
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
