<?php
include '../matakuliah_controller.php';

if (isset($_GET['id'])) {
  $mata_kuliah = getByIdMk($_GET['id']);
}


if (isset($_POST['submit'])) {
  if (updateMk($_POST) > 0) {
    echo "<script>
            alert('Data berhasil disimpan');
          </script>";
    header('Location: index.php?message=success');
  } else {
    $error = "error : " . mysqli_error($conn);
    die(updateMk($_POST));
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mata Kuliah</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="h-screen bg-indigo-100  w-full mx-auto flex flex-col justify-center content-center">
    <div class="w-5/6 h-5/6 flex bg-indigo-400 mx-auto rounded-md shadow-xl">
      <div class="w-1/2 rounded-md">
        <img src="http://47.254.247.28:85/server-pengajar/img/bg-tambah.jpg" alt="" class="w-full h-full rounded-l-md">
      </div>
      <div class="w-1/2 py-10 px-20">
        <h1 class="text-5xl font-bold mb-5 text-white">Edit Mata Kuliah</h1>

        <?php if ($error) : ?>
          <div class="bg-red-200 relative text-red-500 py-3 px-3 rounded-lg">
            Data gagal disimpan
          </div>
        <?php endif; ?>

        <form action="" method="post">
          <input type="hidden" name="mk_id" value="<?= $mata_kuliah['mk_id']; ?>">
          <label class="text-white font-light">Kode Mata Kuliah</label>
          <input value="<?= $mata_kuliah['kode_mk'] ?>" type='text' name="kode_mk" maxlength="10" placeholder="Enter Kode Mata Kuliah" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <label class="text-white font-light">Nama Mata Kuliah</label>
          <input value="<?= $mata_kuliah['nama_mk'] ?>" type='text' name="nama_mk" placeholder="Enter nama" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <label class="text-white font-light">Semester</label>
          <input value="<?= $mata_kuliah['semester'] ?>" type='text' name="semester" placeholder="Enter semester" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <button type="submit" name="submit" class="bg-white py-2 px-4 rounded-md text-indigo-500 hover:bg-indigo-200 hover:shadow-inner"> Simpan </button>
        </form>
      </div>
    </div>

  </div>
</body>

</html>