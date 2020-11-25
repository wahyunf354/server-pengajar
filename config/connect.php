<?php 
$server = "localhost";
$user = "wahyu";
$pass = "wahyu";
$db = "db_tugas_p11";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
  die("error connection " . mysqli_connect_error());
}
