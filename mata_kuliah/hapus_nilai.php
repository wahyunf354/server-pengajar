<?php
include '../nilai_controller.php';

if (isset($_GET['nilai_id'])) {
  $result = deleteNilai($_GET['nilai_id']);
  $mk_id = $_GET['id'];
  if ($result > 0) {
    header("Location: info.php?id=$mk_id&message=successhapus");
    exit();
  } else {
    header("Location: info.php?id=$mk_id&message=errorhapus");
    exit();
  }
}
