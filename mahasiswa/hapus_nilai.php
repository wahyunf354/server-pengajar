<?php
include '../nilai_controller.php';

if (isset($_GET['nilai_id'])) {
  $result = deleteNilai($_GET['nilai_id']);
  $mhs_id = $_GET['id'];
  if ($result > 0) {
    header("Location: info.php?id=$mhs_id&message=successhapus");
  } else {
    header("Location: info.php?id=$mhs_id&message=errorhapus");
  }
}
