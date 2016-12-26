function hapusProfil(site_url, Nim){
  swal({
    title: 'Hapus data',
    type: "warning",
    text: "Apakah anda yakin ingin menghapus mahasiswa ini?",
    showCancelButton: true,
    confirmButtonColor: '#2196f4',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    closeOnConfirm: false
  },function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        url: site_url + '/mahasiswa/hapusMahasiswa/' + Nim,
        type: "GET",
        dataType:"HTML"
      })
      .success(function () {
        swal({
          title: "Sukses",
          text: "Mahasiswa telah berhasil dihapus",
          type: "success"
        }, function () {
          location.reload();
        })
      })
      .error(function() {
        swal("Gagal", "Maaf, mahasiswa tidak dapat dihapus", "error");
      })
    }
  });
}

function hapusFungsionaris(site_url, Nim){
  swal({
    title: 'Hapus data',
    type: "warning",
    text: "Apakah anda yakin ingin menghapus mahasiswa ini dari daftar fungsionaris?",
    showCancelButton: true,
    confirmButtonColor: '#2196f4',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    closeOnConfirm: false
  },function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        url: site_url + '/mahasiswa/hapusFungsionaris/' + Nim,
        type: "GET",
        dataType:"HTML"
      })
      .success(function () {
        swal({
          title: "Sukses",
          text: "Mahasiswa telah berhasil dihapus dari daftar fungsionaris",
          type: "success"
        }, function () {
          location.reload();
        })
      })
      .error(function() {
        swal("Gagal", "Maaf, mahasiswa tidak dapat dihapus dari fungsionaris", "error");
      })
    }
  });
}

function verifikasiAnggota(site_url, Nim){
  swal({
    title: 'Verifikasi data',
    type: "warning",
    text: "Apakah anda yakin ingin menaikkan status mahasiswa ini menjadi anggota?",
    showCancelButton: true,
    confirmButtonColor: '#2196f4',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    closeOnConfirm: false
  },function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        url: site_url + '/mahasiswa/verifikasiAnggota/' + Nim,
        type: "GET",
        dataType:"HTML"
      })
      .success(function () {
        swal({
          title: "Sukses",
          text: "Status mahasiswa telah berhasil dinaikkan menjadi anggota",
          type: "success"
        }, function () {
          location.reload();
        })
      })
      .error(function() {
        swal("Gagal", "Maaf, status mahasiswa tidak dapat dinaikkan menjadi anggota", "error");
      })
    }
  });
}

function verifikasiAdmin(site_url, Nim){
  swal({
    title: 'Verifikasi data',
    type: "warning",
    text: "Apakah anda yakin ingin menaikkan status mahasiswa ini menjadi admin?",
    showCancelButton: true,
    confirmButtonColor: '#2196f4',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    closeOnConfirm: false
  },function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        url: site_url + '/mahasiswa/verifikasiAdmin/' + Nim,
        type: "GET",
        dataType:"HTML"
      })
      .success(function () {
        swal({
          title: "Sukses",
          text: "Status mahasiswa telah berhasil dinaikkan menjadi admin",
          type: "success"
        }, function () {
          location.reload();
        })
      })
      .error(function() {
        swal("Gagal", "Maaf, status mahasiswa tidak dapat dinaikkan menjadi admin", "error");
      })
    }
  });
}
