<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('template/navbar');
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
<main class="container">
  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > Divisi</h6>
          <div class="divider"></div>
          <h4>Divisi UKM Computer Club</h4>
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
            <?php if ($Mode == 'admin') { ?>
            <div class="col s12">
              <a href="<?php echo site_url($Mode.'/divisi/tambah')?>" class="btn blue" style="padding-left: 11px; padding-right: 11px"><i class="material-icons left">add_circle</i>Tambah Divisi</a>
            </div>
            <?php } ?>
          </div>
          <!-- End of Baris tambah pengumuman dan cari -->
          <!-- Baris tempat menaruh data -->
          <div class="row">
            <div class="col s12">
              <table class="striped responsive-table">
                <thead>
                  <tr>
                    <th class="center">No.</th>
                    <?php if ($Mode =='admin'): ?>
                    <th class="center">Kode Divisi</th>
                    <?php endif; ?>
                    <th <?php if ($Mode=='anggota') {echo 'class="center"';} ?>>Nama Divisi</th>
                    <th>Keterangan</th>
                    <th class="center" <?php if ($Mode=='admin') {echo "colspan=3"; } ?>>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($divisi as $divisi_item) { ?>
                    <tr>
                      <td class="center"><?php echo $no; ?></td>
                      <?php if ($Mode =='admin'): ?>
                      <td class="center"><?php echo $divisi_item['IDDivisi']; ?></td>
                      <?php endif; ?>
                      <td <?php if ($Mode=='anggota') {echo 'class="center"';} ?>><?php echo $divisi_item['DetailDivisi']; ?></td>
                      <td><?php if ($divisi_item['Keterangan'] != NULL) { echo substr($divisi_item['Keterangan'], 0, 50).' ...';} ?></td>
                      <td class="center"><a title="Lihat" class="btn-floating btn-small waves-effect waves-light blue" href="<?php echo site_url($Mode.'/divisi/lihat/'.$divisi_item['DetailDivisi']); ?>"><i class="material-icons">visibility</i></a></td>
                      <?php if ($Mode == 'admin') { ?>
                        <td class="center"><a title="Edit" class="btn-floating btn-small waves-effect waves-light blue" href="<?php echo site_url($Mode.'/divisi/ubah/'.$divisi_item['IDDivisi']); ?>"><i class="material-icons">create</i></a></td>
                        <td class="center"><a title="Hapus" class="btn-floating btn-small waves-effect waves-light blue" href="#" onclick="hapusDivisi('<?php echo site_url($Mode); ?>', '<?php echo $divisi_item['IDDivisi'];?>')"><i class="material-icons">delete</i></a></td>
                      <?php }?>
                    </tr>
                  <?php $no++;  ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- End of Baris tempat menaruh data -->
        </div>
      </div>
    </div>
    <!-- End of Second Row -->
  </div>
</main>
<script type="text/javascript" src="<?php echo base_url('materialize/js/hapusDivisi.js'); ?>"></script>
<?php $this->load->view('template/footer'); ?>
