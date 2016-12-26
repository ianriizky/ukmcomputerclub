<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php if (!isset($title)) {
      echo "UKM Computer Club";
    } else {
      echo $title." | UKM Computer Club";
    } ?> </title>
    <script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('li a[href="'+ url +'"]').parent().addClass('active');
        $('li a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
    </script>
  </head>
  <body>
    <nav class="nav-extended blue">
      <div class="container">
        <div class="nav-wrapper">
          <a href="<?php echo base_url(); ?>" class="brand-logo" style="font-size: 150%">
            <img src="<?php echo base_url('picture/ukm.png'); ?>" alt="Logo"> UKM Computer Club
          </a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

          <!-- Navbar mode desktop -->
          <ul class="right hide-on-med-and-down">
            <ul id="dropAccount" class="dropdown-content">
              <li class="waves-effect"><a href="<?php echo site_url($Mode.'/profil'); ?>" class="blue-text"><i class="material-icons left">perm_identity</i>Profil Saya</a></li>
              <?php if ($LevelUKM == 1 && $Mode == 'admin') { ?> <!--hanya muncul jika admin dan modenya mode admin-->
                <li class="waves-effect"><a href="<?php echo site_url('anggota'); ?>" class="blue-text"><i class="material-icons left">supervisor_account</i>Mode Anggota</a></li>
              <?php } else if ($LevelUKM == 1 && $Mode == 'anggota'){ ?> <!--hanya muncul jika admin dan modenya mode anggota-->
                <li class="waves-effect"><a href="<?php echo site_url('admin'); ?>" class="blue-text"><i class="material-icons left">verified_user</i>Mode Admin</a></li>
              <?php } ?>
              <li class="waves-effect"><a href="<?php echo site_url('logout'); ?>" class="blue-text"><i class="material-icons left">power_settings_new</i>Logout</a></li>
            </ul>
            <li><a href="<?php echo site_url($Mode);?>" class="waves-effect waves-light" title="Beranda"><i class="material-icons left">home</i></a></li>
            <?php if ($LevelUKM == 1 && $Mode == 'admin'){ ?> <!--hanya muncul jika admin dan modenya mode anggota-->
              <li><a href="<?php echo site_url($Mode.'/mahasiswa'); ?>" class="waves-effect waves-light" title="Mahasiswa"><i class="material-icons left">person</i></a></li>
            <?php } ?>
            <li><a href="<?php echo site_url($Mode.'/absensi'); ?>" class="waves-effect waves-light" title="Absensi"><i class="material-icons left">assessment</i></a></li>
            <li><a href="<?php echo site_url('about'); ?>" class="waves-effect waves-light" title="Tentang"><i class="material-icons left">info_outline</i></a></li>
            <li><a class="waves-effect waves-light dropdown-button" data-beloworigin="true" data-activates="dropAccount"><?php echo $Username['NIM']." | ".$Username['Username']; ?><i class='material-icons right'>arrow_drop_down</i></a></li>
          </ul>
          <!-- End Navbar mode desktop -->

          <!-- Navbar mode mobile -->
          <ul class="side-nav fixed hide-on-large-only" id="mobile-demo">
            <li>
              <div class="userView">
                <div class="background">
                  <img class="responsive-img" src="<?php echo base_url('picture/bg.png'); ?>">
                </div>
                <a><img class="circle" src="<?php echo base_url('picture/mahasiswa/').$Mahasiswa['Foto']; ?>"></a>
                <a><span class="white-text name"><?php echo $Username['Username']." | ".$Username['NIM']; ?></span></a>
                <a><span class="white-text email"><?php echo $Mahasiswa['Email']; ?></span></a>
              </div>
            </li>
            <li><a href="<?php echo site_url($Mode);?>" class="waves-effect waves-light"><i class="material-icons left">home</i>Beranda</a></li>
            <?php if ($LevelUKM == 1 && $Mode == 'admin'){ ?> <!--hanya muncul jika admin dan modenya mode anggota-->
              <li><a href="<?php echo site_url($Mode.'/mahasiswa'); ?>" class="waves-effect waves-light"><i class="material-icons left">person</i>Mahasiswa</a></li>
            <?php } ?>
            <li><a href="<?php echo site_url($Mode.'/absensi'); ?>" class="waves-effect waves-light"><i class="material-icons left">assessment</i>Absensi</a></li>
            <li><a href="<?php echo site_url('about');?>" class="waves-effect waves-light"><i class="material-icons left">info_outline</i>Tentang</a></li>
            <li><div class="divider"></div></li>
            <li><a href="<?php echo site_url($Mode.'/profil'); ?>" class="waves-effect waves-light"><i class="material-icons left">perm_identity</i>Profil Saya</a></li>
            <?php if ($LevelUKM == 1 && $Mode == 'admin') { ?> <!--hanya muncul jika admin dan modenya mode admin-->
              <li><a href="<?php echo site_url('anggota');?>" class="waves-effect waves-light"><i class="material-icons left">supervisor_account</i>Mode Anggota</a></li>
            <?php } else if ($LevelUKM == 1 && $Mode == 'anggota'){ ?> <!--hanya muncul jika admin dan modenya mode anggota-->
              <li><a href="<?php echo site_url('admin');?>" class="waves-effect waves-light"><i class="material-icons left">verified_user</i>Mode Admin</a></li>
            <?php } ?>
            <li><a href="<?php echo site_url('logout');?>" class="waves-effect waves-light"><i class="material-icons left">power_settings_new</i>Logout</a></li>
          </ul>
          <!-- End of Navbar mode mobile -->
        </div>
      </div>
    </nav>

    <!-- Javascript section -->
    <script type="text/javascript">
      $(".button-collapse").sideNav();
      $('.collapsible').collapsible();
    </script>
    <!-- End of Javascript section -->
