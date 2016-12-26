<div class="card">
  <div class="card-content">
    <span class="card-title">Daftar Divisi</span>
    <p><?php
      if ($jumlahDivisi<1) {
        echo "Tidak ada divisi di dalam database.";
      } else {
        echo "Ada ".$jumlahDivisi." divisi di dalam database.";
      }
      ?></p>
      <p>Klik <a href="<?php echo site_url($Mode.'/divisi'); ?>">lihat</a> untuk daftar divisi selengkapnya.</p>
  </div>
  <div class="card-action">
    <a href="<?php echo site_url($Mode.'/divisi'); ?>" class="btn blue">Lihat</a>
  </div>
</div>
