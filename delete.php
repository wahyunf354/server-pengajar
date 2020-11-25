<?php
include 'mahasiswa_controller.php';

if (isset($_GET['id'])) {
  if (deleteMahasiswa($_GET['id'])) {
    echo "<script>
            alert('data berhasil dihapus');
          </script>";
    header('Location: http://localhost/server-pengajar/index.php?message=successhapus');
  } else {
    echo "<script>
            alert('data gagal dihapus');
          </script>";
    header('Location: http://localhost/server-pengajar/index.php?message=gagalhapus');
  }
}
