<div class="card">
  <div class="card-content">
    <span class="card-title">Calon Anggota UKM</span>
    <p>
      <?php if ($jumlahCalon<1) {
        echo "Tidak ada calon anggota UKM yang perlu diverifikasi.";
      } else {
        echo "Ada ".$jumlahCalon." calon anggota UKM yang perlu diverifikasi.";
      } ?>
    </p>
  </div>
  <div class="card-action">
    <a href="<?php echo site_url($Mode.'/mahasiswa/daftar-calon'); ?>" class="btn teal">Lihat</a>
  </div>
</div>
