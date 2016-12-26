<?php $this->load->view('template/navbar'); ?>
<main class="container">

  <div class="row">
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > <a href="<?php echo site_url($Mode.'/divisi')?>">Divisi</a> > Lihat</h6>
          <div class="divider"></div>
          <h4>Lihat Divisi</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">
            <?php echo 'Divisi '.$divisi_item['DetailDivisi']; ?>
          </span>

          <div class="row">

          </div>
          <?php if ($Mode=='admin'): ?>
          <p align="justify">Kode Divisi : <?php echo $divisi_item['IDDivisi']; ?></p>
          <?php endif; ?>          
          <p align="justify"><?php echo $divisi_item['Keterangan']; ?></p>
        </div>
        <div class="card-action">
          <a href="<?php echo site_url($Mode.'/divisi');?>" class="btn blue">Oke</a>
        </div>
      </div>
    </div>
    <!-- End of Second Row -->

  </div>
</main>
<?php $this->load->view('template/footer'); ?>
