<?php
include "../mahasiswa_controller.php";
include "../matakuliah_controller.php";
include "../nilai_controller.php";

if (isset($_GET['id'])) {
  $mhs = getByIdMahasiswa($_GET['id']);
  $mk = getAllMk();
}

if (isset($_POST['submit'])) {
  $result = addNilai($_POST);
  if ($result > 0) {
    header('Location: info.php?id=' . $_GET['id']);
  }
}

?>
<?php include '../layout/header.php' ?>
<?php include '../layout/nav.php' ?>
<?php include '../layout/sidebar.php' ?>

<!-- Content -->

<main class="pb-10 flex">
  <div class="px-5 flex-none">
    <h4 class="text-xl font-bold text-gray-800">Info Mahasiswa</h4>
    <table class="text-left">
      <tr class="border border-t-0 border-l-0 border-r-0">
        <td class="px-4 py-3">Nama:</td>
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
  </div>
  <div class="px-5 flex-1">
    <form action="" method="post">
      <input type="hidden" value="<?= $mhs['mhs_id'] ?>" name="mhs_id">
      <label for="mk_id" class="text-gray-600 font-light">Mata Kuliah</label>
      <select id="mk_id" name="mk_id" class="w-full border mb-5 bg-white rounded px-3 py-2 outline-none">
        <option class="py-1" value="">Pilih Mata Kuliah</option>
        <?php foreach ($mk as $row) : ?>
          <option class="py-1" value="<?= $row['mk_id']; ?>"><?= $row["nama_mk"]; ?></option>
        <?php endforeach; ?>
      </select>

      <label for="nilai" class="text-gray-600 font-light mt-10">Nilai</label>
      <input id="nilai" name="nilai" type="number" placeholder="Enter Nilai" class="w-full px-6 py-2 border rounded text-xs text-gray-700 focus:outline-none text-lg text-gray-700 " />

      <button type="submit" name="submit" class="block text-center cursor-pointer bg-red-500 text-white hover:bg-red-600 px-3 py-2 mt-5 rounded">Simpan</button>
    </form>
  </div>
</main>

<!-- end Content -->

<?php include '../layout/footer.php' ?>