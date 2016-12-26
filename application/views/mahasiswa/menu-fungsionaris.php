<div class="card">
  <div class="card-content">
    <span class="card-title">Fungsionaris UKM</span>
    <p>
      <?php if ($jumlahFungsionaris<1) {
        echo "Tidak ada fungsionaris UKM dalam database";
      } else {
        echo "Ada ".$jumlahFungsionaris." fungsionaris UKM di dalam database.";
      } ?>
    </p>
  </div>
  <div class="card-action">
    <a href="<?php echo site_url($Mode.'/mahasiswa/daftar-fungsionaris'); ?>" class="btn red">Lihat</a>
  </div>
</div>
