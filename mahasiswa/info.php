<?php
session_start();
include "../mahasiswa_controller.php";
include "../nilai_controller.php";

if (!isset($_SESSION['login'])) {
  header('Location: http://localhost/server-pengajar/login.php');
  exit();
}

if (isset($_GET['id'])) {
  $mhs = getByIdMahasiswa($_GET['id']);
  $nilai = getNilaiByMhs($_GET['id']);
}

?>
<?php include '../layout/header.php' ?>
<?php include '../layout/nav.php' ?>
<?php include '../layout/sidebar.php' ?>

<!-- Content -->

<main class="pb-10 flex">

  <div class="px-5 flex-none">
    <h4 class="text-xl font-bold text-gray-800 text-center">Info Mahasiswa</h4>
    <table class="text-left">
      <tr class="border border-t-0 border-l-0 border-r-0">
        <td class="px-4 py-3">Nama</td>
        <td class="w-min py-3">:</td>
        <td class="px-4 py-3"><?= $mhs['nama']; ?></td>
      </tr>
      <tr class="border border-t-0 border-l-0 border-r-0">
        <td class="px-4 py-3">NIM</td>
        <td class="w-min py-3">:</td>
        <td class="px-4 py-3"><?= $mhs['nim']; ?></td>
      </tr>
      <tr class="border border-t-0 border-l-0 border-r-0">
        <td class="px-4 py-3">Prodi:</td>
        <td class="w-min py-3">:</td>
        <td class="px-4 py-3"><?= $mhs['prodi']; ?></td>
      </tr>
    </table>
    <a href="add_nilai.php?id=<?= $mhs['mhs_id']; ?>" class="block text-center cursor-pointer bg-red-500 text-white hover:bg-red-600 px-3 py-2 mt-5 rounded">Input Nilai</a>
  </div>
  <div class="px-5 flex-1">
    <div class="bg-white rounded-lg shadow-lg py-6">
      <div class="block overflow-x-auto mx-6">

        <?php if ($_GET['message'] == 'successhapus') : ?>
          <div class='bg-yellow-200 relative text-yellow-600 py-3 px-3 rounded-lg mb-3'>
            Data berhasil dihapus
          </div>
        <?php elseif ($_GET['message'] == 'errorhapus') : ?>
          <div class='bg-red-200 relative text-red-600 py-3 px-3 rounded-lg mb-3'>
            Data bergagal dihapus
          </div>
        <?php elseif ($_GET['message'] == 'success') : ?>
          <div class='bg-indigo-200 relative text-indigo-600 py-3 px-3 rounded-lg mb-3'>
            Data berhasil disimpan
          </div>
        <?php endif; ?>

        <table class="w-full text-left rounded-lg">
          <thead>
            <tr class="text-gray-800 border border-b-0">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">Mata Kuliah</th>
              <th class="px-4 py-3">Nilai</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php foreach ($nilai as $n) : ?>
              <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                <td class="px-4 py-4"><?= $no; ?></td>
                <td class="px-4 py-4"><?= $n['nama_mk']; ?></td>
                <td class="px-4 py-4">
                  <?= $n['nilai']; ?>
                </td>
                <td class="text-center py-4">
                  <a href="edit_nilai.php?id=<?= $mhs['mhs_id']; ?>&nilai_id=<?= $n['nilai_id']; ?>"><span class="fill-current text-green-500 material-icons">edit</span></a>
                  <a href="hapus_nilai.php?id=<?= $mhs['mhs_id']; ?>&nilai_id=<?= $n['nilai_id']; ?>"> </a>
                </td>
              </tr>
              <?php $no++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
</main>

<!-- end Content -->

<?php include '../layout/footer.php' ?>