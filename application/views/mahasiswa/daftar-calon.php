<?php $this->load->view('template/navbar'); ?>
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
<main class="container">
  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/mahasiswa')?>">Anggota UKM</a> > Calon Anggota UKM</h6>
          <div class="divider"></div>
          <h4>Daftar Calon Anggota UKM Computer Club</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <!-- Baris cari -->
          <div class="row">
            <div class="col s12 m8 offset-m4 l6 offset-l6">
              <div class="col s2">
              <a href="<?php echo site_url($Mode.'/mahasiswa/daftar-calon/all')?>" class="btn teal" style="padding-left: 11px; padding-right: 11px"><i class="material-icons">replay</i></a>
              </div>
              <div class="col s10">
                <?php echo form_open($Mode.'/mahasiswa/daftar-calon'); ?>
                  <input type="text" name="Cari" value="<?php echo set_value('Cari')?>" placeholder="Search">
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
          <!-- End of Baris cari -->
          <!-- Baris tempat menaruh data -->
          <div class="row">
            <div class="col s12">
              <table class="striped responsive-table">
                <thead>
                  <tr>
                    <th class="center">No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Divisi</th>
                    <th colspan="3" class="center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($calon as $calon_item) { ?>
                    <tr>
                      <td class="center"><?php echo $no; ?></td>
                      <td><?php echo $calon_item['NIM']; ?></td>
                      <td><?php echo $calon_item['Nama']; ?></td>
                      <td><?php echo $calon_item['DetailJurusan']; ?></td>
                      <td><?php echo $calon_item['DetailDivisi']; ?></td>
                      <td class="center"><a title="Lihat" class="btn-floating btn-small waves-effect waves-light teal" href="<?php echo site_url($Mode.'/mahasiswa/lihat-profil/'.$calon_item['NIM']); ?>"><i class="material-icons">visibility</i></a></td>
                      <td class="center"><a title="Verifikasi" class="btn-floating btn-small waves-effect waves-light teal" href="#" onclick="verifikasiAnggota('<?php echo site_url($Mode); ?>', '<?php echo $calon_item['NIM'];?>')"><i class="material-icons">done</i></a></td>
                      <td class="center"><a title="Tolak" class="btn-floating btn-small waves-effect waves-light teal" href="#" onclick="hapusProfil('<?php echo site_url($Mode); ?>', '<?php echo $calon_item['NIM'];?>')"><i class="material-icons">block</i></a></td>
                    </tr>
                    <?php $no++;  ?>
                  <?php } ?>
                </tbody>
              </table>
              <ul class="pagination">
                <?php echo $this->pagination->create_links(); ?>
              </ul>
            </div>
          </div>
          <!-- End of Baris tempat menaruh data -->
        </div>
      </div>
    </div>
    <!-- End of Second Row -->
  </div>
</main>
<script type="text/javascript" src="<?php echo base_url('materialize/js/profil.js'); ?>"></script>
<?php $this->load->view('template/footer'); ?>
