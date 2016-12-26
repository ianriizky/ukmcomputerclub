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
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/mahasiswa')?>">Anggota UKM</a> > Fungsionaris UKM</h6>
          <div class="divider"></div>
          <h4>Daftar Fungsionaris UKM Computer Club</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <!-- Baris tambah cari -->
          <div class="row">
            <div class="col s12 m8 offset-m4 l6 offset-l6">
              <div class="col s2">
                <a href="<?php echo site_url($Mode.'/mahasiswa/daftar-fungsionaris/all')?>" class="btn red" style="padding-left: 11px; padding-right: 11px"><i class="material-icons">replay</i></a>
              </div>
              <div class="col s10">
                <?php echo form_open($Mode.'/mahasiswa/daftar-fungsionaris'); ?>
                  <input type="text" name="Cari" placeholder="Search">
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
                    <th>Jabatan</th>
                    <th colspan="2" class="center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($admin as $admin_item) { ?>
                    <tr>
                      <td class="center"><?php echo $no; ?></td>
                      <td><?php echo $admin_item['NIM']; ?></td>
                      <td><?php echo $admin_item['Nama']; ?></td>
                      <td><?php echo $admin_item['DetailJurusan']; ?></td>
                      <td><?php echo $admin_item['DetailDivisi']; ?></td>
                      <td><?php echo $admin_item['Jabatan']; ?></td>
                      <td class="center"><a title="Lihat" class="btn-floating btn-small waves-effect waves-light red" href="<?php echo site_url($Mode.'/mahasiswa/lihat-profil/'.$admin_item['NIM']); ?>"><i class="material-icons">visibility</i></a></td>
                      <td class="center"><a title="Hapus" class="btn-floating btn-small waves-effect waves-light red" href="#" onclick="hapusFungsionaris('<?php echo site_url($Mode); ?>', '<?php echo $admin_item['NIM'];?>')"><i class="material-icons">clear</i></a></td>
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
