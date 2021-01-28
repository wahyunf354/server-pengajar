<?php
include 'config/connect.php';

function getNilaiByMhs($id)
{
  global $conn;

  $query = "SELECT tbl_nilai.nilai, tbl_nilai.nilai_id, tbl_mk.nama_mk FROM tbl_nilai INNER JOIN tbl_mk ON tbl_nilai.mk_id=tbl_mk.mk_id WHERE mhs_id='$id'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function getNilaiByMk($id)
{
  global $conn;

  $query = "SELECT tbl_nilai.nilai, tbl_nilai.nilai_id, tbl_mhs.nama FROM tbl_nilai INNER JOIN tbl_mhs ON tbl_nilai.mhs_id=tbl_mhs.mhs_id WHERE mk_id=$id";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function addNilai($data)
{
  global $conn;

  $mk_id = $data['mk_id'];
  $mhs_id = $data['mhs_id'];
  $nilai = $data['nilai'];

  $query = "INSERT INTO tbl_nilai(mhs_id, mk_id, nilai) VALUES ('$mhs_id', '$mk_id', '$nilai')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function getNilaiById($id)
{
  global $conn;

  $query = "SELECT * FROM tbl_nilai WHERE nilai_id=$id";
  $result = mysqli_query($conn, $query);

  return mysqli_fetch_assoc($result);
}

function updateNilai($data)
{
  global $conn;

  $nilai_id = $data['nilai_id'];
  $mk_id = $data['mk_id'];
  $mhs_id = $data['mhs_id'];
  $nilai = $data['nilai'];

  $query = "UPDATE tbl_nilai SET mk_id='$mk_id', mhs_id='$mhs_id', nilai='$nilai' WHERE nilai_id='$nilai_id';";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function deleteNilai($id)
{
  global $conn;

  $query = "DELETE FROM tbl_nilai WHERE nilai_id=$id";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

