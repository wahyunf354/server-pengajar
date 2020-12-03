<?php
session_start();
include "config/connect.php";
include "mahasiswa_controller.php";
include "matakuliah_controller.php";


if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit();
}

?>

<?php include 'layout/header.php' ?>
<?php include 'layout/nav.php' ?>
<?php include 'layout/sidebar.php' ?>

<!-- Content -->

<div class="container flex">

  <div class="flex w-3/12 h-24 m-2 shadow-lg bg-blue rounded-md border border-gray-100">
    <div class="bg-red-400 w-2 h-full rounded-l"></div>
    <div class="w-full h-full px-10 py-3">
      <p class="text-sm text-gray-500">Mahasiswa</p>
      <h1 class="text-5xl font-bold text-red-500"><?= getCountMhs() ?></h1>
    </div>
  </div>

  <div class="flex relative w-3/12 h-24 m-2 mx-4 shadow-lg bg-blue rounded-md border border-gray-100">
    <div class="bg-gray-800 w-2 h-full rounded-l"></div>
    <div class="w-full h-full px-10 py-3">
      <p class="text-sm text-gray-500">Mata Kuliah</p>
      <h1 class="text-5xl font-bold text-gray-800"><?= getCountMk() ?></h1>
    </div>
  </div>

</div>

<!-- end Content -->

<?php include 'layout/footer.php' ?>