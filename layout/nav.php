<?php
session_start();
if (isset($_POST['submit'])) {
  session_destroy();
  header('Location: http://localhost/server-pengajar/login.php');
  exit();
}
?>
<!-- Navbar -->
<nav x-data="{show:false}" class="absolute inset-x-0 flex items-center justify-between flex-wrap bg-red-500 p-6">
  <div class="w-full block flex-grow md:flex md:justify-end md:w-auto">
    <form action="" method="post">
      <button type="submit" name="submit" class="block md:inline-block text-sm px-4 py-2 leading-none rounded text-white border border-white hover:bg-white hover:text-indigo-500 mt-4 md:mt-0">
        Logout
      </button>
    </form>
  </div>
</nav>
<!-- end Navbar -->