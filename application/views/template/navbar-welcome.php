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
          <a href="<?php echo base_url()?>" class="brand-logo" style="font-size: 150%">
            <img src="<?php echo base_url('picture/ukm.png');?>" alt="Logo"> UKM Computer Club
          </a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

          <!-- Navbar mode desktop -->
          <ul class="right hide-on-med-and-down">
            <ul id="dropAccount" class="dropdown-content">
              <li class="waves-effect"><a href="<?php echo site_url('login')?>" class="blue-text"><i class="material-icons left">vpn_key</i>Login</a></li>
              <li class="waves-effect"><a href="<?php echo site_url('signup')?>" class="blue-text"><i class="material-icons left">assignment</i>Sign Up</a></li>
            </ul>
            <li><a class="waves-effect waves-light dropdown-button" data-beloworigin="true" data-activates="dropAccount" title="Menu"><i class="material-icons left">assignment_ind</i>Menu<i class='material-icons right'>arrow_drop_down</i></a></li>
            <li><a href="<?php echo site_url('about');?>" class="waves-effect waves-light" title="Tentang"><i class="material-icons left">info_outline</i>Tentang</a></li>
          </ul>
          <!-- End Navbar mode desktop -->

          <!-- Navbar mode mobile -->
          <ul class="side-nav fixed hide-on-large-only" id="mobile-demo">
            <li><a class="subheader">Menu</a></li>
            <li><a class="waves-effect waves-light" href="<?php echo site_url('login')?>"><i class="material-icons left">vpn_key</i>Login</a></li>
            <li><a class="waves-effect waves-light" href="<?php echo site_url('signup')?>"><i class="material-icons left">assignment</i>Sign Up</a></li>
            <li><div class="divider"></div></li>
            <li><a class="waves-effect waves-light" href="<?php echo site_url('about');?>"><i class="material-icons left">info_outline</i>Tentang</a></li>
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
