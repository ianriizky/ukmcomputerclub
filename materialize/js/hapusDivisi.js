function hapusDivisi(site_url, IDDivisi){
  swal({
    title: 'Hapus data',
    type: "warning",
    text: "Apakah anda yakin ingin menghapus divisi ini?",
    showCancelButton: true,
    confirmButtonColor: '#2196f4',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    closeOnConfirm: false
  },function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        url: site_url + '/divisi/hapus/' + IDDivisi,
        type: "GET",
        dataType:"HTML"
      })
      .success(function () {
        swal({
          title: "Sukses",
          text: "Divisi telah berhasil dihapus",
          type: "success"
        }, function () {
          location.reload();
        })
      })
      .error(function() {
        swal("Gagal", "Maaf, divisi tidak dapat dihapus", "error");
      })
    }
  });
}
