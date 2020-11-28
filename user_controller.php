<?php
include "config/connect.php";


function register($data)
{
  global $conn;

  $username = htmlspecialchars($data['username']);
  $email = htmlspecialchars($data['email']);
  $password = htmlspecialchars($data['password']);

  $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email='$email'");

  if (mysqli_num_rows($result) > 0) {
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO tbl_users(username, email, `password`) VALUES ('$username', '$email', '$password')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
