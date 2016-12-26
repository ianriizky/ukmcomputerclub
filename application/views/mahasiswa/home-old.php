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
    <!-- First Row -->
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > Anggota UKM</h6>
          <div class="divider"></div>
          <h4>Daftar Anggota UKM Computer Club</h4>
        </div>
      </div>
    </div>
    <!-- End of First Row -->

    <!-- Second Row -->
    <ul class="collapsible" data-collapsible="expandable">
      <li>
        <div class="collapsible-header active"><i class="material-icons">done_all</i>Calon Anggota UKM</div>
        <div class="collapsible-body">
          <table class="striped responsive-table">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Divisi</th>
                <th colspan="3" class="center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($calon as $calon_item) { ?>
                <tr>
                  <td class="center"><?php echo $no; ?></td>
                  <td><?php echo $calon_item['NIM']; ?></td>
                  <td><?php echo $calon_item['Nama']; ?></td>
                  <td><?php echo $calon_item['DetailJurusan']; ?></td>
                  <td><?php echo $calon_item['DetailDivisi']; ?></td>
                  <td class="center"><a title="Lihat" class="btn-floating btn-small waves-effect waves-light blue" href="<?php echo site_url($Mode.'/mahasiswa/lihat-profil/'.$calon_item['NIM']); ?>"><i class="material-icons">visibility</i></a></td>
                  <td class="center"><a title="Verifikasi" class="btn-floating btn-small waves-effect waves-light blue" href="#" onclick="verifikasiAnggota('<?php echo site_url($Mode); ?>', '<?php echo $calon_item['NIM'];?>')"><i class="material-icons">done</i></a></td>
                  <td class="center"><a title="Tolak" class="btn-floating btn-small waves-effect waves-light blue" href="#" onclick="hapusProfil('<?php echo site_url($Mode); ?>', '<?php echo $calon_item['NIM'];?>')"><i class="material-icons">block</i></a></td>
                </tr>
                <?php $no++;  ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">face</i>Anggota UKM</div>
        <div class="collapsible-body">
          <table class="striped responsive-table">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Divisi</th>
                <th colspan="2" class="center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($mahasiswa as $mahasiswa_item) { ?>
                <tr>
                  <td class="center"><?php echo $no; ?></td>
                  <td><?php echo $mahasiswa_item['NIM']; ?></td>
                  <td><?php echo $mahasiswa_item['Nama']; ?></td>
                  <td><?php echo $mahasiswa_item['DetailJurusan']; ?></td>
                  <td><?php echo $mahasiswa_item['DetailDivisi']; ?></td>
                  <td class="center"><a title="Lihat" class="btn-floating btn-small waves-effect waves-light blue" href="<?php echo site_url($Mode.'/mahasiswa/lihat-profil/'.$mahasiswa_item['NIM']); ?>"><i class="material-icons">visibility</i></a></td>
                  <td class="center"><a title="Hapus" class="btn-floating btn-small waves-effect waves-light blue" href="#" onclick="hapusProfil('<?php echo site_url($Mode); ?>', '<?php echo $mahasiswa_item['NIM'];?>')"><i class="material-icons">delete</i></a></td>
                </tr>
                <?php $no++;  ?>
              <?php } ?>
            </tbody>
          </table>
          <ul class="pagination">
            <?php echo $this->pagination->create_links(); ?>
          </ul>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">verified_user</i>Administrator / Fungsionaris UKM</div>
        <div class="collapsible-body">
          <table class="striped responsive-table">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th colspan="2" class="center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($admin as $admin_item) { ?>
                <tr>
                  <td class="center"><?php echo $no; ?></td>
                  <td><?php echo $admin_item['NIM']; ?></td>
                  <td><?php echo $admin_item['Nama']; ?></td>
                  <td><?php echo $admin_item['DetailJurusan']; ?></td>
                  <td><?php echo $admin_item['DetailDivisi']; ?></td>
                  <td><?php echo $admin_item['Jabatan']; ?></td>
                  <td class="center"><a title="Lihat" class="btn-floating btn-small waves-effect waves-light blue" href="<?php echo site_url($Mode.'/mahasiswa/lihat-profil/'.$admin_item['NIM']); ?>"><i class="material-icons">visibility</i></a></td>
                  <td class="center"><a title="Hapus" class="btn-floating btn-small waves-effect waves-light blue" href="#" onclick="hapusProfil('<?php echo site_url($Mode); ?>', '<?php echo $admin_item['NIM'];?>')"><i class="material-icons">delete</i></a></td>
                </tr>
                <?php $no++;  ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </li>
    </ul>
    <!-- End of Second Row -->
</main>
<script type="text/javascript" src="<?php echo base_url('materialize/js/profil.js'); ?>"></script>
<?php $this->load->view('template/footer'); ?>
