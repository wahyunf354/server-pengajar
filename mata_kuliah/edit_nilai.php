<?php
include "../mahasiswa_controller.php";
include "../matakuliah_controller.php";
include "../nilai_controller.php";

if (isset($_GET['id'])) {
  $mk = getByIdMk($_GET['id']);
  $mhs = getAllMahasiswa();
}

if (isset($_GET['nilai_id'])) {
  $nilai = getNilaiById($_GET['nilai_id']);
}

if (isset($_POST['submit'])) {
  $result = updateNilai($_POST);
  if ($result > 0) {
    header('Location: info.php?id=' . $_GET['id'] . "&message=success");
  } else {
    $message = true;
  }
}

?>
<?php include '../layout/header.php' ?>
<?php include '../layout/nav.php' ?>
<?php include '../layout/sidebar.php' ?>

<!-- Content -->

<main class="pb-10 flex">
  <div class="px-5 flex-none">
    <h4 class="text-xl font-bold text-gray-800">Info Mata Kuliah</h4>
    <table class="text-left">
      <tr class="border border-t-0 border-l-0 border-r-0">
        <td class="px-4 py-3">Nama:</td>
        <td class="w-min py-3">:</td>
        <td class="px-4 py-3"><?= $mk['nama_mk']; ?></td>
      </tr>
      <tr class="border border-t-0 border-l-0 border-r-0">
        <td class="px-4 py-3">NIM</td>
        <td class="w-min py-3">:</td>
        <td class="px-4 py-3"><?= $mk['kode_mk']; ?></td>
      </tr>
      <tr class="border border-t-0 border-l-0 border-r-0">
        <td class="px-4 py-3">Semester:</td>
        <td class="w-min py-3">:</td>
        <td class="px-4 py-3"><?= $mk['semester']; ?></td>
      </tr>
    </table>
    <a href="info.php?id=<?= $_GET['id']; ?>" class="block w-min text-center cursor-pointer bg-red-500 text-white hover:bg-red-600 px-3 py-2 mt-5 rounded flex justify-center items-center">
      <i class="material-icons fill-current text-gray-100">keyboard_arrow_left</i>
    </a>
  </div>
  <div class="px-5 flex-1">
    <?php if ($message) : ?>
      <div class='bg-red-200 relative text-red-600 py-3 px-3 rounded-lg mb-3'>
        Data bergagal disimpan
      </div>
    <?php endif; ?>
    <form action="" method="post">
      <input type="hidden" value="<?= $mk['mk_id'] ?>" name="mk_id">
      <input type="hidden" value="<?= $nilai['nilai_id'] ?>" name="nilai_id">

      <label for="mk_id" class="text-gray-600 font-light">mahasiswa</label>
      <select id="mk_id" name="mhs_id" class="w-full border mb-5 bg-white rounded px-3 py-2 outline-none">

        <?php foreach ($mhs as $row) : ?>

          <?php if ($row['mhs_id'] == $nilai['mhs_id']) : ?>
            <option class="py-1" selected value="<?= $row['mhs_id']; ?>"><?= $row["nama"]; ?></option>
          <?php else : ?>
            <option class="py-1" value="<?= $row['mhs_id']; ?>"><?= $row["nama"]; ?></option>
          <?php endif; ?>

        <?php endforeach; ?>

      </select>

      <label for="nilai" class="text-gray-600 font-light mt-10">Nilai</label>
      <input id="nilai" name="nilai" type="number" placeholder="Enter Nilai" class="w-full px-6 py-2 border rounded text-xs text-gray-700 focus:outline-none text-lg text-gray-700 " value="<?= $nilai['nilai']; ?>" />

      <button type="submit" name="submit" class="block text-center cursor-pointer bg-green-500 text-white hover:bg-green-600 px-3 py-2 mt-5 rounded">Simpan</button>
    </form>
  </div>
</main>

<!-- end Content -->

<?php include '../layout/footer.php' ?>