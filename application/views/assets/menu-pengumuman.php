<div class="card">
  <div class="card-content">
    <span class="card-title">Pengumuman</span>
    <p><?php
      if ($jumlahPengumuman<1) {
        echo "Tidak ada pengumuman hari ini.";
      } else {
        echo "Ada ".$jumlahPengumuman." pengumuman hari ini.";
      }
      ?></p>
      <p>Klik <a href="<?php echo site_url($Mode.'/pengumuman'); ?>">lihat</a> untuk info pengumuman selengkapnya.</p>
  </div>
  <div class="card-action">
    <a href="<?php echo site_url($Mode.'/pengumuman'); ?>" class="btn blue">Lihat</a>
  </div>
</div>
