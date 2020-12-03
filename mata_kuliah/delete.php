<?php
include '../matakuliah_controller.php';

if (isset($_GET['id'])) {
  if (deleteMk($_GET['id'])) {
    echo "<script>
            alert('data berhasil dihapus');
          </script>";
    header('Location: index.php?message=successhapus');
    exit();
  } else {
    echo "<script>
            alert('data gagal dihapus');
          </script>";
    header('Location: index.php?message=gagalhapus');
    exit();
  }
}
