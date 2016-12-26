<div class="card">
  <div class="card-content">
    <span class="card-title">Anggota UKM</span>
    <p>
      <?php if ($jumlahAnggota<1) {
        echo "Tidak ada anggota UKM dalam database";
      } else {
        echo "Ada ".$jumlahAnggota." anggota UKM di dalam database.";
      } ?>
    </p>
  </div>
  <div class="card-action">
    <a href="<?php echo site_url($Mode.'/mahasiswa/daftar-anggota'); ?>" class="btn blue">Lihat</a>
  </div>
</div>
