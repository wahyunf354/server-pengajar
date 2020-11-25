<?php
include 'config/connect.php';

function getAllMk()
{
  global $conn;
  $query = 'SELECT * FROM tbl_mk';

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  };

  return $rows;
}

function getByIdMk($id)
{
  global $conn;

  $query = "SELECT * FROM tbl_mk WHERE mk_id=$id";
  $result = mysqli_query($conn, $query);

  return mysqli_fetch_assoc($result);
}

function addMk($data)
{
  global $conn;

  $kode_mk = htmlspecialchars($data['kode_mk']);
  $nama_mk = htmlspecialchars($data['nama_mk']);
  $semester = htmlspecialchars($data['semester']);

  $query = "INSERT INTO tbl_mk(kode_mk, nama_mk, semester) VALUES ('$kode_mk', '$nama_mk', '$semester');";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function updateMk($data)
{
  global $conn;

  $id = $data['mk_id'];
  $kode_mk = htmlspecialchars($data['kode_mk']);
  $nama_mk = htmlspecialchars($data['nama_mk']);
  $semester = htmlspecialchars($data['semester']);

  $query = "UPDATE tbl_mk SET kode_mk='$kode_mk', nama_mk='$nama_mk', semester='$semester' WHERE mk_id='$id';";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function deleteMk($id)
{
  global $conn;

  $query = "DELETE FROM tbl_mk WHERE mk_id='$id';";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
