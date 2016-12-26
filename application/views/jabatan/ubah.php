<?php $this->load->view('template/navbar'); ?>
<main class="container">

  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/jabatan')?>">Jabatan</a> > Ubah</h6>
          <div class="divider"></div>
          <h4>Ubah Jabatan</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <?php echo form_open($Mode.'/jabatan/ubah/'.$jabatan_item['IDJabatan']); ?>

          <!--ID Divisi-->
          <div class="row">
            <div class="input-field col s12 m6 l4">
              <i class="material-icons prefix">vpn_key</i>
              <input type="text" name="IDJabatan"  value="<?php if(!empty(set_value('IDJabatan'))){echo set_value('IDJabatan');}else{echo $jabatan_item['IDJabatan'];}; ?>" id="IDJabatan" readonly>
              <span class="red-text"><?php echo form_error('IDJabatan'); ?></span>
              <label for="IDJabatan">ID Jabatan</label>
            </div>
          </div>

          <!--DetailJabatan-->
          <div class="row">
            <div class="input-field col s12 m8 l6">
              <i class="material-icons prefix">label</i>
              <input type="text" length="20" name="Jabatan" id="Jabatan" value="<?php if(!empty(set_value('Jabatan'))){echo set_value('Jabatan');}else{echo $jabatan_item['Jabatan'];}; ?>">
              <span class="red-text"><?php echo form_error('Jabatan'); ?></span>
              <label for="Jabatan">Nama Jabatan</label>
            </div>
          </div>

            <!--Card Action-->
            <div class="row">
              <div class="card-action right-align col s12 m12 l10">
                <input id="submit" type="submit" value="Simpan" class="btn grey darken-4">
                <a href="<?php echo site_url($Mode.'/jabatan');?>"><button type='button' name='button' class='btn red'>Batal</button></a>
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
