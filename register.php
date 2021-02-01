<?php
session_start();
include "user_controller.php";

if ($_SESSION['login']) {
  header("Location: index.php");
  exit();
}

if (isset($_POST['submit'])) {
  $result = register($_POST);
  if ($result > 0) {
    header("Location: login.php?message=success");
    exit();
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
  <title>Register Admin</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="h-screen bg-indigo-100  w-full mx-auto flex flex-col justify-center content-center">
    <div class="w-5/6 h-5/6 flex bg-indigo-400 mx-auto rounded-md shadow-xl">
      <div class="w-1/2 rounded-md">
        <img src="http://47.254.247.28:85/server-pengajar/img/bg-tambah.jpg" alt="" class="w-full h-full rounded-l-md">
      </div>
      <div class="w-1/2 flex flex-col justify-center py-10 px-20">
        <h1 class="text-5xl font-bold mb-5 text-white">Registrasi</h1>

        <?php if ($is_error) : ?>
          <div class="bg-red-200 relative mb-1 text-red-500 py-3 px-3 rounded-lg">
            Gagal register, kemungkinan email sudah digunakan
          </div>
        <?php endif; ?>

        <form action="" method="post">
          <label for="username" class="text-white font-light">username</label>
          <input type='text' name="username" placeholder="Enter username" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <label for="email" class="text-white font-light">Email</label>
          <input type='email' name="email" placeholder="Enter email" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <label for="password" class="text-white font-light">Password</label>
          <input type='password' name="password" placeholder="Enter password" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <button type="submit" name="submit" class="bg-white py-2 px-4 rounded-md text-indigo-500 hover:bg-indigo-200 hover:shadow-inner"> Register </button>
          <a href="login.php" class="py-2 px-4 rounded-md text-white cursor-pointer hover:text-indigo-200 hover:shadow-inner"> Login </a>
        </form>
      </div>
    </div>

  </div>
</body>

</html>