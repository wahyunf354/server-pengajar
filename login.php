<?php
include "config/connect.php";
session_start();

if ($_SESSION['login']) {
  header('Location: index.php');
  exit();
}

if (isset($_GET['message'])) {
  if ($_GET['message'] == "success") {
    $is_success = true;
  }
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];

  $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email='$email'");

  $user = mysqli_fetch_assoc($result);

  if ($user) {
    $pass = password_verify($_POST['password'], $user['password']);

    if ($pass) {
      $_SESSION['login'] = true;
      $_SESSION['username'] = $user['username'];
      header('Location: index.php');
      exit();
    } else {
      $is_error = true;
    }
  } else {
    $is_error = true;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="h-screen bg-indigo-100  w-full mx-auto flex flex-col justify-center content-center">
    <div class="w-5/6 h-5/6 flex bg-indigo-400 mx-auto rounded-md shadow-xl">
      <div class="w-1/2 rounded-md">
        <img src="http://47.254.247.28:85/img/bg-tambah.jpg" alt="" class="w-full h-full rounded-l-md">
      </div>
      <div class="w-1/2 flex flex-col justify-center py-10 px-20">
        <h1 class="text-5xl font-bold mb-5 text-white">Login</h1>

        <?php if ($is_success) : ?>
          <div class="bg-green-200 mb-2 relative text-green-500 py-3 px-3 rounded-lg">
            Behasil Register
          </div>
        <?php elseif ($is_error) : ?>
          <div class="bg-red-200 mb-2 relative text-red-500 py-3 px-3 rounded-lg">
            email atau password salah
          </div>
        <?php endif; ?>

        <form action="" method="post">
          <label for="email" class="text-white font-light">Email</label>
          <input type='email' name="email" placeholder="Enter email" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <label for="password" class="text-white font-light">Password</label>
          <input type='password' name="password" placeholder="Enter password" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <button type="submit" name="submit" class="bg-white py-2 px-4 rounded-md text-indigo-500 hover:bg-indigo-200 hover:shadow-inner"> Login </button>

          <a href="register.php" class="py-2 px-4 rounded-md text-white cursor-pointer hover:text-indigo-200 hover:shadow-inner"> Register </a>

        </form>
      </div>
    </div>

  </div>
</body>

</html>