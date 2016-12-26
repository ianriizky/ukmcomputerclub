<div class="card">
  <div class="card-content" onload="setInterval('displayServerTime()', 1000);">
    <span class="card-title">Hari ini</span>
    <h4 id="clock" onload="waktu()">
      <span id="jam">00</span>
      <span> : </span>
      <span id="menit">00</span>
      <span> : </span>
      <span id="detik">00</span>
      <span id="ampm">AM</span>
    </h3>
    <div class="divider"></div>
    <h6 id="pekan">Weeks of this year</h6>
    <h6 id="tanggal"></h6>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url('materialize/js/waktu.js'); ?>"></script>
