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
      <!-- Kop -->
      <div class="card black-text">
        <div class="card-content">
          <h6><a href="<?php echo site_url($Mode)?>">Home</a> > Profil Saya</h6>
          <div class="divider"></div>
          <h4>Profil Saya</h4>
        </div>
      </div>

      <!-- Isi -->
      <ul class="collapsible popout" data-collapsible="expandable">
        <li>
          <div class="collapsible-header"><i class="material-icons">assignment_ind</i>Data Umum</div>
          <div class="collapsible-body">
            <div class="container">
              <div class="row">
                <!--Kasi jarak biar gak mepet sama collapsible-->
              </div>
              <div class="row">
                <!--Card Image -->
                <div class="col s4 offset-s4 m3 l3">
                  <img class="circle responsive-img" src="<?php echo base_url('picture/mahasiswa/'.$Mahasiswa['Foto']); ?>">
                  <div class="row">
                    <!--Kasi jarak-->
                  </div>
                  <div class="center">
                    <a href="<?php echo site_url($Mode.'/ubah-profil') ?>"><button type="button" name="button" class="btn grey darken-4">Edit</button></a>
                  </div>
                </div>
                <!--End of Card Image-->

                <!--Card Content-->
                <div class="col s12 m9 l9">
                  <div class="card-content">
                    <table class="highlight">
                      <tr>
                        <td>NIM</td>
                        <td>: <?php echo $Mahasiswa['NIM']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>: <?php echo $Mahasiswa['Nama']; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <?php echo date('d F Y',strtotime($Mahasiswa['TanggalLahir'])); ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>: <?php echo $Mahasiswa['DetailJenisKelamin']; ?></td>
                      </tr>
                      <tr>
                        <td>Jurusan</td>
                        <td>: <?php echo $Mahasiswa['DetailJurusan']; ?></td>
                      </tr>
                      <tr>
                        <td>Program Studi</td>
                        <td>: <?php echo $Mahasiswa['DetailProgramStudi']; ?></td>
                      </tr>
                      <tr>
                        <td>E-mail</td>
                        <td>: <?php echo $Mahasiswa['Email']; ?></td>
                      </tr>
                      <tr>
                        <td>Nomor HP</td>
                        <td>: <?php echo $Mahasiswa['NomorHP1'];
                        if ($Mahasiswa['NomorHP2'] != NULL) {
                          echo " / ".$Mahasiswa['NomorHP2'];
                        } ?></td>
                      </tr>
                      <tr>
                        <td>ID Line</td>
                        <td>: <?php echo $Mahasiswa['IDLine']; ?></td>
                      </tr>
                      <tr>
                        <td>Divisi</td>
                        <td>: <?php echo $Mahasiswa['DetailDivisi']; ?></td>
                      </tr>
                      <tr>
                        <td>Tahun Angkatan</td>
                        <td>: <?php echo $Mahasiswa['TahunAngkatan']; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!--End of Card Content-->
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">person_pin</i>Username dan Password</div>
          <div class="collapsible-body">
            <div class="container">
              <div class="row">

              </div>
              <div class="row">
                <?php echo form_open($Mode.'/ubah-user') ?>
                <!--Username-->
                <div class="row">
                  <div class="input-field col s12 m12 l7">
                    <i class="material-icons prefix">perm_identity</i>
                    <input type="text" length="12" name="Username" value="<?php echo $Username['Username']; ?>" id="Username" class="validate" disabled>
                    <span class="red-text" id="errorUsername"><?php echo form_error('Username'); ?></span>
                    <label for="Username">Username</label>
                  </div>
                </div>

                <!--Password-->
                <div class="row">
                  <!--Password1-->
                  <div class="input-field col s12 m12 l7">
                    <i class="material-icons prefix">vpn_key</i>
                    <input type="password" length="10" name="Password" value="<?php echo base64_decode($Username['Password']); ?>" id="Password" class="validate" disabled>
                    <span class="red-text" id="errorPassword"><?php echo form_error('Password'); ?></span>
                    <label for="Password">Password</label>
                  </div>
                  <!--Password2-->
                  <div class="input-field col s12 m12 l5" id="Password2">
                  </div>
                </div>

                <!--Card Action-->
                <div class="row">
                  <div class="card-action right-align col s12 m12 l10" id="tombol">
                    <button type="button" name="button" class="btn grey darken-4" onclick="tampilSimpanBatal()">Edit</button>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </main>

    <script type="text/javascript">
      var Simpan = "<input id='submit' type='submit' value='Simpan' class='btn grey darken-4'>";
      var Batal = "<button type='button' name='button' class='btn red' onclick='tampilEdit()'>Batal</button>";
      var Edit = "<button type='button' name='button' class='btn grey darken-4' onclick='tampilSimpanBatal()'>Edit</button>";

      function tampilSimpanBatal() {
        document.getElementById("tombol").innerHTML = Simpan + " " + Batal;
        document.getElementById("Username").disabled = false;
        document.getElementById("Password").disabled = false;
        document.getElementById("Password").type = 'text';
        $("#errorUsername").remove();
        $("#errorPassword").remove();
      }

      function tampilEdit() {
        document.getElementById("tombol").innerHTML = Edit;
        document.getElementById("Username").disabled = true;
        document.getElementById("Password").disabled = true;
        document.getElementById("Password").type = 'password';
      }
    </script>
<!-- Footer -->
<?php $this->load->view('template/footer'); ?>
