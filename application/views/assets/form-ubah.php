<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('template/navbar');
?>
<?php
  if ($this->session->flashdata('messageProfil')): ?>
    <script>
      window.onload = function () {
        sweetAlert({
            title: "<?php echo $this->session->flashdata('messageTitleProfil'); ?>",
            text: "<?php echo $this->session->flashdata('messageProfil'); ?>",
            showConfirmButton: true,
            type: '<?php echo $this->session->flashdata('messageTypeProfil'); ?>'
        })
      };
    </script>
<?php endif; ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
  <main class="container">
    <div class="row">
      <!--Judul-->
      <div class="card">
        <div class="card-content">
          <div class="card-title">
            Ubah Profil
          </div>
        </div>
      </div>
      <!--End of Judul-->

      <!--Isi-->
      <div class="card black-text">
        <div class="card-content">
          <?php
            $attributes = array('onchange' => 'tampilProgramStudi(this)', 'id' => 'formSaya');
            echo form_open_multipart($Mode.'/ubah-profil', $attributes);
           ?>
            <!--NIM-->
            <div class="row">
              <div class="input-field col s12 m6 l4">
                <i class="fa fa-id-badge prefix"></i>
                <input type="text" name="NIM" id="NIM" length="10" value="<?php echo $Mahasiswa['NIM']; ?>" readonly>
                <label for="NIM">NIM</label>
              </div>
            </div>

            <!--Nama Lengkap-->
            <div class="row">
              <div class="input-field col s12 m10 l8">
                <i class="material-icons prefix">contacts</i>
                <input type="text" length="50" name="Nama" value="<?php if(!empty(set_value('Nama'))){echo set_value('Nama');}else{echo $Mahasiswa['Nama'];} ?>" id="Nama" class="validate">
                <span class="red-text"><?php echo form_error('Nama'); ?></span>
                <label for="Nama">Nama Lengkap</label>
              </div>
            </div>

            <!--Tanggal Lahir-->
            <div class="row">
              <div class="input-field col s12 m10 l8">
                <i class="material-icons prefix">today</i>
                <input type="text" class="datepicker" name="TanggalLahir" data-value="<?php if(!empty(set_value('TanggalLahir'))){echo set_value('TanggalLahir');}else{echo $Mahasiswa['TanggalLahir'];} ?>">
                <span class="red-text"><?php echo form_error('TanggalLahir'); ?></span>
                <label for="TanggalLahir">Tanggal Lahir</label>
              </div>
            </div>

            <!--Jenis Kelamin-->
            <div class="row">
              <div class="input-field col s12 m5 l4">
                <select name="JenisKelamin" id="JenisKelamin">
                  <option value="" disabled selected>Silahkan pilih salah satu</option>
                  <?php foreach ($jeniskelamin as $jk) { ?>
                    <?php if ($jk['IDJenisKelamin'] == set_value('JenisKelamin') || $jk['IDJenisKelamin'] == $Mahasiswa['IDJenisKelamin']) { ?>
                      <option value="<?php echo $jk['IDJenisKelamin'];?>" selected><?php echo $jk['DetailJenisKelamin'];?></option>
                      <?php } else { ?>
                      <option value="<?php echo $jk['IDJenisKelamin'];?>"><?php echo $jk['DetailJenisKelamin'];?></option>
                      <?php } ?>
                    <?php } ?>
                </select>
                <label for="JenisKelamin">Jenis Kelamin</label>
                <span class="red-text"><?php echo form_error('JenisKelamin'); ?></span>
              </div>
            </div>

            <!--Jurusan dan ProgramStudi-->
            <div class="row">
              <!--Jurusan-->
              <div class="input-field col s12 m5 l4">
                <select class="browser-default" name="Jurusan" id="Jurusan">
                  <option value="" disabled selected>Jurusan</option>
                  <?php foreach ($jurusan as $j) { ?>
                    <?php if ($j['Jurusan'] == set_value('Jurusan') || $j['Jurusan'] == $Mahasiswa['Jurusan']) { ?>
                      <option value="<?php echo $j['Jurusan'];?>" selected><?php echo $j['DetailJurusan'];?></option>
                      <?php } else { ?>
                        <option value="<?php echo $j['Jurusan'];?>"><?php echo $j['DetailJurusan'];?></option>
                      <?php } ?>
                    <?php } ?>
                </select>
                <span class="red-text"><?php echo form_error('Jurusan'); ?></span>
              </div>
              <!--Program Studi-->
              <div class="input-field col s12 m5 l4">
                <select class="browser-default" name="ProgramStudi" id="ProgramStudi">
                  <option value="" disabled selected>Program Studi</option>
                </select>
                <span class="red-text"><?php echo form_error('ProgramStudi'); ?></span>
              </div>
            </div>

            <!--E-mail-->
            <div class="row">
              <div class="input-field col s12 m10 l8">
                <i class="material-icons prefix">email</i>
                <input type="email" name="Email" length="50" value="<?php if(!empty(set_value('Email'))){echo set_value('Email');}else{echo $Mahasiswa['Email'];} ?>" id="Email" class="validate">
                <span class="red-text"><?php echo form_error('Email'); ?></span>
                <label for="Email">E-mail (jika ada)</label>
              </div>
            </div>

            <!--Nomor HP1-->
            <div class="row">
              <div class="input-field col s8 m8 l6">
                <i class="material-icons prefix">phone</i>
                <input type="text" length="15" name="NomorHP1" value="<?php if(!empty(set_value('NomorHP1'))){echo set_value('NomorHP1');}else{echo $Mahasiswa['NomorHP1'];} ?>" id="NomorHP1" class="validate">
                <span class="red-text"><?php echo form_error('NomorHP1'); ?></span>
                <label for="NomorHP1">Nomor HP 1</label>
              </div>
            </div>

            <!--Nomor HP2-->
            <div class="row">
              <div class="input-field col s8 m8 l6">
                <i class="material-icons prefix">phone</i>
                <input type="text" length="15" name="NomorHP2" value="<?php if(!empty(set_value('NomorHP2'))){echo set_value('NomorHP2');}else{echo $Mahasiswa['NomorHP2'];} ?>" id="NomorHP2" class="validate" <?php if (empty($Mahasiswa['NomorHP2'])) {?>disabled<?php } ?>>
                <label for="NomorHP2">Nomor HP 2 (jika ada)</label>
              </div>
              <!-- Switch -->
              <div class="input-field switch col s4 m4 l4">
                <label>
                  <input type="checkbox" name="NomorHP2Checkbox" <?php if (!empty($Mahasiswa['NomorHP2'])) {?>checked<?php } ?>>
                  <span class="lever"></span>
                </label>
              </div>
            </div>

            <!--ID Line-->
            <div class="row">
              <div class="input-field col s8 m6 l4">
                <i class="material-icons prefix">chat_bubble</i>
                <input type="text" length="30" name="IDLine" value="<?php if(!empty(set_value('IDLine'))){echo set_value('IDLine');}else{echo $Mahasiswa['IDLine'];} ?>" id="IDLine" class="validate">
                <label for="IDLine">ID Line (jika ada)</label>
              </div>
            </div>

            <!--Divisi-->
            <div class="row">
              <div class="input-field col s12 m5 l4">
                <select name="Divisi" id="Divisi">
                  <option value="" disabled selected>Silahkan pilih salah satu</option>
                  <?php foreach ($divisi as $d) { ?>
                    <?php if ($d['IDDivisi'] == set_value('Divisi') || $d['IDDivisi'] == $Mahasiswa['IDDivisi']) { ?>
                      <option value="<?php echo $d['IDDivisi'];?>" selected><?php echo $d['DetailDivisi'];?></option>
                      <?php } else { ?>
                      <option value="<?php echo $d['IDDivisi'];?>"><?php echo $d['DetailDivisi'];?></option>
                      <?php } ?>
                    <?php } ?>
                </select>
                <label for="Divisi">Divisi</label>
                <span class="red-text"><?php echo form_error('Divisi'); ?></span>
              </div>
            </div>

            <!--Foto-->
            <div class="row">
              <div class="col s3 m2 l2">
                <img src="<?php echo base_url('picture/mahasiswa/'.$Mahasiswa['Foto']); ?>" class="responsive-img" id="FotoPreview">
              </div>
              <div class="file-field input-field col s8 m8 l6">
                <div class="btn blue">
                  <span>Foto</span>
                  <input type="file" name="Foto" id="Foto">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" value="<?php if(!empty(set_value('Foto')) || $Mahasiswa['Foto'] == 'default.png'){echo set_value('Foto');}else{echo $Mahasiswa['Foto'];} ?>" name="Foto" placeholder="Ganti foto profilmu disini (jika ada)" id="FotoText">
                </div>
                <?php if ($Mahasiswa['Foto'] != 'default.png'): ?>
                  <p>
                    <input type="checkbox" class="filled-in" name="FotoDefault" value="1" id="FotoDefault">
                    <label for="FotoDefault">Hapus Foto Profil</label>
                  </p>
                <?php endif; ?>
                <span class="red-text"><?php if (isset($error)) { echo $error; } ?></span>
              </div>
            </div>

            <!--Card Action-->
            <div class="row">
              <div class="card-action right-align col s12 m12 l10">
                <input id="submit" type="submit" value="Simpan" class="btn grey darken-4">
                <a href="<?php echo site_url($Mode.'/profil');?>"><button type='button' name='button' class='btn red'>Batal</button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--End of Isi-->
    </div>
  </main>

  <script type="text/javascript">
    function tampilProgramStudi(oFormElement) { //Menampilkan program studi sesuai pilihan jurusan
      document.getElementById("Jurusan").addEventListener("click", function () {
        xmlHttp = GetXmlHttpObject()
        if (xmlHttp==null) {
          alert("Browser ini tidak mensupport daftar program studi");
          return
        }
        var url = "<?php echo site_url('ambilDatakuCoeg') ?>" //konfigurasi ada di routes.php
        xmlHttp.onreadystatechange = stateChanged
        xmlHttp.open(oFormElement.method, url, true)
        xmlHttp.send(new FormData (oFormElement))
      });
    }

    var xmlHttp

    function stateChanged(){
      if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
        document.getElementById("ProgramStudi").innerHTML = xmlHttp.responseText
      }
    }

    function GetXmlHttpObject() {
      var xmlHttp = null;

      try {
        xmlHttp = new XMLHttpRequest();
      } catch (e) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      return xmlHttp;
    }

    $('input[name="NomorHP2Checkbox"]').change(function() {
      if(this.checked) {
        document.getElementById("NomorHP2").disabled = false;
      } else {
        document.getElementById("NomorHP2").disabled = true;
      }
      document.getElementById("NomorHP2").value = "";
    });

    $('.datepicker').pickadate({
      monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 20, // Creates a dropdown of 10 years to control year
      format: 'yyyy-mm-dd', // 2016/02/01 | 01 Februari 2016
      today: 'Today',
      clear: 'Bersih',
      close: 'Tutup',
      max: true
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#FotoPreview').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
      }
    }

    function toDefault(input) {
      $('#FotoPreview').attr('src', "<?php echo base_url('picture/mahasiswa/default.png'); ?>");
    }

    $("#Foto").change(function(){
        readURL(this);
    });

    $("#FotoDefault").change(function(){
      if (this.checked) {
        toDefault(this);
        document.getElementById("FotoText").value = "";
      } else {
        document.getElementById("FotoText").value = "<?php if(!empty(set_value('Foto'))){echo set_value('Foto');}else{echo $Mahasiswa['Foto'];} ?>";
        readURL(this);
      }
    });
  </script>
  <?php
    $this->load->view('template/footer');
  ?>
