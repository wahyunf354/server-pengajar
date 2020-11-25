<?php
include 'function.php';

if (isset($_GET['id'])) {
  if (deleteMahasiswa($_GET['id'])) {
    echo "<script>
            alert('data berhasil dihapus');
          </script>";
    header('Location: index.php?message=successhapus');
  } else {
    echo "<script>
            alert('data gagal dihapus');
          </script>";
    header('Location: index.php?message=gagalhapus');
  }
}
