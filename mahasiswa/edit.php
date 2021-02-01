<?php
include '../mahasiswa_controller.php';

if (isset($_GET['id'])) {
  $mahasiswa = getByIdMahasiswa($_GET['id']);
}

if (isset($_POST['submit'])) {
  if (updateMahasiswa($_POST) > 0) {
    echo "<script>
            alert('Data mahasiswa berhasil diubah');
          </script>";
    header('Location: index.php?message=success');
    exit();
  } else {
    echo "<script>
            alert('Data mahasiswa gagal diubah');
          </script>";
    $error = 'error:' . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="h-screen bg-indigo-100  w-full mx-auto flex flex-col justify-center content-center">
    <div class="w-5/6 h-5/6 flex bg-indigo-400 mx-auto rounded-md shadow-xl">
      <div class="w-1/2 rounded-md">
        <img src="http://47.254.247.28:85/server-pengajar/img/bg-tambah.jpg" alt="" class="w-full h-full rounded-l-md">
      </div>
      <div class="w-1/2 py-10 px-20">
        <h1 class="text-5xl font-bold mb-5 text-white">Edit Mahasiswa</h1>

        <?php if ($error) : ?>
          <div class="bg-red-200 relative text-red-500 py-3 px-3 rounded-lg">
            Data gagal diubah
          </div>
        <?php endif; ?>

        <form action="" method="post">
          <input type="hidden" value="<?= $mahasiswa['mhs_id']; ?>" name="id">
          <label class="text-white font-light">NIM</label>
          <input value="<?= $mahasiswa['nim']; ?>" type='text' name="nim" placeholder="Enter NIM" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" maxlength="10" required />

          <label class="text-white font-light">Nama</label>
          <input value="<?= $mahasiswa['nama']; ?>" type='text' name="nama" placeholder="Enter nama" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <label class="text-white font-light">Prodi</label>
          <input value="<?= $mahasiswa['prodi']; ?>" type='text' name="prodi" placeholder="Enter prodi" class="w-full mt-2 mb-6 px-3 py-1 border rounded-lg text-md text-gray-700 focus:outline-none" required />

          <button type="submit" name="submit" class="bg-white py-2 px-4 rounded-md text-indigo-500 hover:bg-indigo-200 hover:shadow-inner"> Simpan </button>
        </form>
      </div>
    </div>

  </div>
</body>

</html>