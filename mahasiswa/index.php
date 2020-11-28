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


<?php include '../layout/header.php' ?>
<?php include '../layout/nav.php' ?>
<?php include '../layout/sidebar.php' ?>
<div class="pb-10">

  <h1 class="text-5xl text-gray-800 font-bold font-sarif mb-5">Daftar Mahasiswa</h1>

  <?= $display; ?>

  <a href="add.php" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-sm text-white my-2">Tambah mahasiswa</a>
  <table class="border-collapse table-auto border border-green-800 mt-3  w-full mb-10">
    <thead>
      <tr class="py-3">
        <th class="border bg-red-200 px-8 py-4  ">No</th>
        <th class="border bg-red-200 px-8 py-4 ">NIM</th>
        <th class="border bg-red-200 px-8 py-4 ">Nama</th>
        <th class="border bg-red-200 px-8 py-4 ">Prodi</th>
        <th class="border bg-red-200 px-8 py-4 ">Aksi</th>
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
            <a href="info.php?id=<?= $mhs['mhs_id']; ?>" class="hover:text-blue-600 focus:outline-none focus:shadow-outline py-1 px-1 rounded-md text-white">
              <i class="fill-current text-blue-500 material-icons">help</i>
            </a>
            <a href="edit.php?id=<?= $mhs['mhs_id']; ?>" class="hover:text-yellow-600 focus:outline-none focus:shadow-outline py-1 px-1 rounded-md text-white">
              <i class="fill-current text-yellow-500 material-icons">edit</i>
            </a>
            <a href="delete.php?id=<?= $mhs['mhs_id']; ?>" class=" hover:bg-tael-600 focus:outline-none focus:shadow-outline py-1 px-1 rounded-md text-white" onclick="confirm('Hapus?')">
              <i class="fill-current text-red-500 material-icons">delete</i>
            </a>
          </td>
        </tr>
        <?php $no++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
<?php include '../layout/footer.php' ?>