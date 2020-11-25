<?php
include '../mahasiswa_controller.php';
$mahasiswa = getAllMahasiswa();

if (isset($_GET['message'])) {
  $message = $_GET['message'];
}

if ($message == 'success') {
  $display = "
    <div class='bg-indigo-200 relative text-indigo-600 py-3 px-3 rounded-lg mb-3'>
      Data berhasil disimpan
    </div>
      ";
} else if ($message == 'successhapus') {
  $display = "
    <div class='bg-yellow-200 relative text-yellow-600 py-3 px-3 rounded-lg mb-3'>
      Data berhasil dihapus
    </div>
      ";
} else if ($message == 'gagalhapus') {
  $display = "
    <div class='bg-red-200 relative text-red-600 py-3 px-3 rounded-lg mb-3'>
      Data bergagal dihapus
    </div>
      ";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- tailwind -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
  <div class="container mx-auto px-4 pt-5">
    <a href="/server-pengajar/">dashboard</a>
    <h1 class="text-5xl font-bold font-sarif mb-5">Daftar Mahasiswa</h1>

    <?= $display; ?>

    <a href="add.php" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-sm text-white my-2">Tambah mahasiswa</a>
    <table class="border-collapse table-auto border border-green-800 mt-3  w-full">
      <thead>
        <tr class="py-3">
          <th class="border bg-indigo-200 px-8 py-4  ">No</th>
          <th class="border bg-indigo-200 px-8 py-4 ">NIM</th>
          <th class="border bg-indigo-200 px-8 py-4 ">Nama</th>
          <th class="border bg-indigo-200 px-8 py-4 ">Prodi</th>
          <th class="border bg-indigo-200 px-8 py-4 ">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
          <tr>
            <td class="border text-center px-8 py-3"><?= $no; ?></td>
            <td class="border text-center px-8 py-3"><?= $mhs['nim'] ?></td>
            <td class="border text-center px-8 py-3"><?= $mhs['nama']; ?></td>
            <td class="border text-center px-8 py-3"><?= $mhs['prodi']; ?></td>
            <td class="border text-center py-3">
              <a href="info.php?id=<?= $mhs['mhs_id']; ?>" class="bg-blue-500 hover:bg-tael-600 focus:outline-none focus:shadow-outline py-1 px-3 mx-1 rounded-md text-white">
                <i class="fa fa-info-circle"></i>
              </a>
              <a href="edit.php?id=<?= $mhs['mhs_id']; ?>" class="bg-yellow-500 hover:bg-tael-600 focus:outline-none focus:shadow-outline py-1 px-3 mx-1 rounded-md text-white">
                <i class="fa fa-edit"></i>
              </a>
              <a href="delete.php?id=<?= $mhs['mhs_id']; ?>" class="bg-red-500 hover:bg-tael-600 focus:outline-none focus:shadow-outline py-1 px-3 mx-1 rounded-md text-white" onclick="confirm('Hapus?')">
                <i class="fa fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php $no++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>