<?php $this->load->view('template/navbar'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
<main class="container">
  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/mahasiswa')?>">Anggota UKM</a> > Tambah Fungsionaris</h6>
          <div class="divider"></div>
          <h4>Tambah Fungsionaris</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <?php echo form_open($Mode.'/mahasiswa/tambah-fungsionaris/'.$mahasiswa_item['NIM']); ?>
            <!--NIM-->
            <div class="row">
              <div class="input-field col s12 m6 l4">
                <i class="material-icons prefix">vpn_key</i>
                <input type="text" name="NIM"  value="<?php echo $mahasiswa_item['NIM']; ?>" id="NIM" readonly>
                <span class="red-text"><?php echo form_error('NIM'); ?></span>
                <label for="NIM">NIM</label>
              </div>
            </div>

            <!--Nama-->
            <div class="row">
              <div class="input-field col s12 m6 l6">
                <i class="material-icons prefix">face</i>
                <input type="text" name="Nama"  value="<?php echo $mahasiswa_item['Nama']; ?>" id="Nama" readonly>
                <span class="red-text"><?php echo form_error('Nama'); ?></span>
                <label for="Nama">Nama</label>
              </div>
            </div>

            <!--Jabatan-->
            <div class="row">
              <div class="input-field col s12 m5 l4">
                <select name="Jabatan" id="Jabatan">
                  <option value="" disabled selected>Silahkan pilih salah satu</option>
                  <?php foreach ($jabatan as $j) { ?>
                    <?php if ($j['IDJabatan'] == set_value('IDJabatan')) { ?>
                      <option value="<?php echo $j['IDJabatan'];?>" selected><?php echo $j['Jabatan'];?></option>
                      <?php } else { ?>
                      <option value="<?php echo $j['IDJabatan'];?>"><?php echo $j['Jabatan'];?></option>
                      <?php } ?>
                    <?php } ?>
                </select>
                <label for="Jabatan">Jabatan</label>
                <span class="red-text"><?php echo form_error('Jabatan'); ?></span>
              </div>
            </div>

            <!--Tahun-->
            <div class="row">
              <div class="input-field col s12 m5 l4">
                <select name="Tahun" id="Tahun">
                  <option value="" disabled selected>Silahkan pilih salah satu</option>
                  <?php for ($i=-2; $i < 3; $i++) { ?>
                    <option value="<?php echo date('Y')+$i; ?>"><?php echo date('Y')+$i; ?></option>
                  <?php } ?>
                </select>
                <label for="Tahun">Tahun</label>
                <span class="red-text"><?php echo form_error('Tahun'); ?></span>
              </div>
            </div>

            <!--Card Action-->
            <div class="row">
              <div class="card-action right-align col s12 m12 l10">
                <input id="submit" type="submit" value="Simpan" class="btn grey darken-4">
                <a href="<?php echo site_url($Mode.'/mahasiswa/daftar-anggota');?>"><button type='button' name='button' class='btn red'>Batal</button></a>
              </div>
            </div>

          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <!-- End of Second Row -->
</main>
<?php $this->load->view('template/footer'); ?>
