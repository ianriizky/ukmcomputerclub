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
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > Pengumuman</h6>
          <div class="divider"></div>
          <h4>Daftar Pengumuman</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <!-- Baris tambah pengumuman dan cari -->
          <div class="row">
            <div class="col s12 m8 offset-m4 l6 offset-l6">
              <div class="col s2">
              <a href="<?php echo site_url($Mode.'/pengumuman/all')?>" class="btn blue" style="padding-left: 11px; padding-right: 11px"><i class="material-icons">replay</i></a>
              </div>
              <?php if ($Mode == 'admin') { ?>
              <div class="col s2">
                <a href="<?php echo site_url($Mode.'/pengumuman/tambah')?>" class="btn blue" style="padding-left: 11px; padding-right: 11px"><i class="material-icons">add</i></a>
              </div>
              <?php } ?>
              <div class="col s8">
                <?php echo form_open($Mode.'/pengumuman'); ?>
                  <input type="text" name="Cari" placeholder="Search">
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
          <!-- End of Baris tambah pengumuman dan cari -->
          <!-- Baris tempat menaruh data -->
          <div class="row">
            <div class="col s12">
              <table class="striped responsive-table">
                <thead>
                  <tr>
                    <th class="center">No.</th>
                    <th class="center">ID Pengumuman</th>
                    <th>Petugas</th>
                    <th>Judul</th>
                    <th>Tanggal Dibuat</th>
                    <th class="center" <?php if ($Mode=='admin') {echo "colspan=3"; } ?>>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pengumuman as $pengumuman_item) { ?>
                    <tr>
                      <td class="center"><?php echo $no; ?></td>
                      <td class="center"><?php echo $pengumuman_item['IDPengumuman']; ?></td>
                      <td><?php echo $pengumuman_item['Username']; ?></td>
                      <td><?php echo $pengumuman_item['Judul']; ?></td>
                      <td><?php echo $waktulalu[$pengumuman_item['IDPengumuman']] ?></td>
                      <td class="center"><a title="Lihat" class="btn-floating btn-small waves-effect waves-light blue" href="<?php echo site_url($Mode.'/pengumuman/lihat/'.$pengumuman_item['Link']); ?>"><i class="material-icons">visibility</i></a></td>
                      <?php if ($Mode == 'admin') { ?>
                        <td class="center"><a title="Edit" class="btn-floating btn-small waves-effect waves-light blue" href="<?php echo site_url($Mode.'/pengumuman/ubah/'.$pengumuman_item['IDPengumuman']); ?>"><i class="material-icons">create</i></a></td>
                        <td class="center"><a title="Hapus" class="btn-floating btn-small waves-effect waves-light blue" href="#" onclick="hapusPengumuman('<?php echo site_url($Mode); ?>', '<?php echo $pengumuman_item['IDPengumuman'];?>')"><i class="material-icons">delete</i></a></td>
                      <?php }?>
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
<script type="text/javascript" src="<?php echo base_url('materialize/js/hapusPengumuman.js'); ?>"></script>
<?php $this->load->view('template/footer'); ?>
