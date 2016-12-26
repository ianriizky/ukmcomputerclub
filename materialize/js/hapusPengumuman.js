function hapusPengumuman(site_url, IDPengumuman){
  swal({
    title: 'Hapus data',
    type: "warning",
    text: "Apakah anda yakin ingin menghapus pengumuman ini?",
    showCancelButton: true,
    confirmButtonColor: '#2196f4',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK',
    closeOnConfirm: false
  },function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        url: site_url + '/pengumuman/hapus/' + IDPengumuman,
        type: "GET",
        dataType:"HTML"
      })
      .success(function () {
        swal({
          title: "Sukses",
          text: "Pengumuman telah berhasil dihapus",
          type: "success"
        }, function () {
          location.reload();
        })
      })
      .error(function() {
        swal("Gagal", "Maaf, pengumuman tidak dapat dihapus", "error");
      })
    }
  });
}
