<?php
include 'function.php';

if (isset($_POST['submit'])) {
  if (addMahasiswa($_POST) > 0) {
    echo "<script>
            alert('data berhasil disimpan');
          </script>";
    header('Location: index.php');
  } else {
    echo "<script>
            alert('data gagal disimpan');
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Mahasiswa</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="h-screen bg-indigo-100  w-full mx-auto flex flex-col justify-center content-center">
    <div class="w-5/6 h-5/6 flex bg-indigo-400 mx-auto rounded-md shadow-xl">
      <div class="w-1/2 rounded-md">
        <img src="img/bg-tambah.jpg" alt="" class="w-full h-full rounded-l-md">
      </div>
      <div class="w-1/2 py-10 px-20">
        <h1 class="text-5xl font-bold mb-5 text-white">Tambah Mahasiswa</h1>
        <form action="" method="post">
          <label class="text-white font-light">NIM</label>
          <input type='text' name="nim" placeholder="Enter NIM" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" />
          <label class="text-white font-light">Nama</label>
          <input type='text' name="nama" placeholder="Enter nama" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" />
          <label class="text-white font-light">Prodi</label>
          <input type='text' name="prodi" placeholder="Enter prodi" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" />
          <button type="submit" name="submit" class="bg-white py-2 px-4 rounded-md text-indigo-500 hover:bg-indigo-200 hover:shadow-inner"> Simpan </button>
        </form>
      </div>
    </div>

  </div>
</body>

</html>