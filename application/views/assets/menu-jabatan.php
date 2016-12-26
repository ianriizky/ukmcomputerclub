<div class="card">
  <div class="card-content">
    <span class="card-title">Daftar Jabatan</span>
    <p><?php
      if ($jumlahJabatan<1) {
        echo "Tidak ada jabatan di dalam database.";
      } else {
        echo "Ada ".$jumlahJabatan." jabatan di dalam database.";
      }
      ?></p>
      <p>Klik <a href="<?php echo site_url($Mode.'/jabatan'); ?>">lihat</a> untuk daftar jabatan selengkapnya.</p>
  </div>
  <div class="card-action">
    <a href="<?php echo site_url($Mode.'/jabatan'); ?>" class="btn blue">Lihat</a>
  </div>
</div>
