<?php $this->load->view('template/navbar'); ?>
<main class="container">

  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/pengumuman')?>">Pengumuman</a> > Lihat</h6>
          <div class="divider"></div>
          <h4>Lihat Pengumuman</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">
            <?php echo $pengumuman_item['Judul']; ?>
          </span>
          <p><i class="material-icons">schedule</i> <?php echo date("d F Y h:i:s A", strtotime($pengumuman_item['created_at'])); ?> <i class="material-icons">perm_identity</i> <?php echo $pengumuman_item['Username']; ?></p>

          <div class="row">

          </div>
          <p align="justify"><?php echo $pengumuman_item['Isi']; ?></p>
        </div>
        <div class="card-action">
          <a href="<?php echo site_url($Mode.'/pengumuman');?>" class="btn blue">Oke</a>
        </div>
      </div>
    </div>
    <!-- End of Second Row -->

  </div>
</main>
<?php $this->load->view('template/footer'); ?>
