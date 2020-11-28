<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit(0);
}

?>

<?php include 'layout/header.php' ?>
<?php include 'layout/nav.php' ?>
<?php include 'layout/sidebar.php' ?>

<!-- Content -->

<div>



</div>

<!-- end Content -->

<?php include 'layout/footer.php' ?>