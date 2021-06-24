<?php
include "config.php";

$id_dosen = "";
$id_kelas = "";
$jadwal = "";
$mata_kuliah = "";

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];

  $result = $koneksi->query("SELECT * FROM jadwal_kelas WHERE id_jadwal=$id") or die($koneksi->error);

  $row = $result->fetch_array();
  $id_dosen = $row['id_dosen'];
  $id_kelas = $row['id_kelas'];
  $jadwal = $row['jadwal'];
  $mata_kuliah = $row['mata_kuliah'];
}

$sqlDosen = "SELECT * FROM dosen";
$dosen = $koneksi->query($sqlDosen);

$sqlKelas = "SELECT * FROM kelas";
$kelas = $koneksi->query($sqlKelas);


if (isset($_POST['submit'])) {
  $id = $_GET['edit'];
  $id_dosen = $_POST['id_dosen'];
  $id_kelas = $_POST['id_kelas'];
  $jadwal = $_POST['jadwal'];
  $mata_kuliah = $_POST['mata_kuliah'];

  // var_dump($id_kelas);
  $sql = "UPDATE jadwal SET id_dosen='" . $id_dosen . "', id_kelas='" . $id_kelas . "', jadwal='" . $jadwal . "', mata_kuliah='" . $mata_kuliah . "' WHERE id_jadwal=" . $id;

  if (mysqli_query($koneksi, $sql)) {
    header('Location: index.php?page=tampil_jadwal');
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
</head>

<body>
  <div class="container my-5">
  <center><h1>Edit Jadwal Kelas</h1></center>
    
    <div class="p-5 bg-light rounded">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . "?edit=" . $id; ?>">
        <div class="mb-3">
          <label for="id_dosen" class="form-label">ID Dosen</label>
          <?php if ($dosen->num_rows > 0) : ?>
            <select name="id_dosen" id="id_dosen" class="form-control" aria-label="Default select example">
            <option value="">Pilih Data Dosen</option>
              <?php while ($row = $dosen->fetch_assoc()) : ?>
                <option <?php echo ($row['id_dosen'] == $id_dosen) ? "selected" : "" ?> value="<?php echo $row['id_dosen']; ?>"><?php echo $row['id_dosen'] . " - " . $row['nama_dosen']; ?></option>
              <?php endwhile; ?>
            </select>
          <?php else : ?>
            <select class="form-select" aria-label="Disabled select example" disabled>
              <option selected>Belum ada data, tambahkan data dosen terlebih dahulu</option>
            </select>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="id_kelas" class="form-label">ID Kelas</label>
          <?php if ($kelas->num_rows > 0) : ?>
            <select name="id_kelas" id="id_kelas" class="form-control" aria-label="Default select example">
            <option value="">Pilih Data Dosen</option>
              <?php while ($row = $kelas->fetch_assoc()) : ?>
                <option value="<?php echo $row['id_kelas']; ?>" <?php echo ($row['id_kelas'] == $id_kelas) ? "selected" : "" ?>><?php echo $row['id_kelas'] . " - " . $row['nama_kelas']; ?></option>
              <?php endwhile; ?>
            </select>
          <?php else : ?>
            <select class="form-select" aria-label="Disabled select example" disabled>
              <option selected>Belum ada data, tambahkan data kelas terlebih dahulu</option>
            </select>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="jadwal" class="form-label">Jadwal</label>
          <input name="jadwal" type="datetime-local" class="form-control" id="jadwal" value="<?php echo date('Y-m-d\TH:i:s', strtotime($jadwal)); ?>" required>
        </div>
        <div class="mb-3">
          <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
          <input name="mata_kuliah" type="text" class="form-control" id="mata_kuliah" value="<?php echo $mata_kuliah; ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=tampil_jadwal" class="btn btn-danger">Batal</a>
      </form>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>