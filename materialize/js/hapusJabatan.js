function hapusJabatan(site_url, IDJabatan){
  swal({
    title: 'Hapus data',
    type: "warning",
    text: "Apakah anda yakin ingin menghapus jabatan ini?",
    showCancelButton: true,
    confirmButtonColor: '#2196f4',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    closeOnConfirm: false
  },function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        url: site_url + '/jabatan/hapus/' + IDJabatan,
        type: "GET",
        dataType:"HTML"
      })
      .success(function () {
        swal({
          title: "Sukses",
          text: "Jabatan telah berhasil dihapus",
          type: "success"
        }, function () {
          location.reload();
        })
      })
      .error(function() {
        swal("Gagal", "Maaf, jabatan tidak dapat dihapus", "error");
      })
    }
  });
}
