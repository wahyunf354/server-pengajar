<?php
include 'config/connect.php';

function getNilaiByMhs($id)
{
  global $conn;

  $query = "SELECT * FROM tbl_nilai WHERE mhs_id='$id'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
