<?php
include "config.php";

$nama_kelas = "";
$prodi = "";
$fakultas = "";

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];

  $result = $koneksi->query("SELECT * FROM kelas WHERE id_kelas=$id") or die($koneksi->error);

  $row = $result->fetch_array();
  $nama_kelas = $row['nama_kelas'];
  $prodi = $row['prodi'];
  $fakultas = $row['fakultas'];
}

if (isset($_POST['submit'])) {
  $id = $_GET['edit'];
  $nama_kelas = $_POST['nama_kelas'];
  $prodi = $_POST['prodi'];
  $fakultas = $_POST['fakultas'];

  $sql = "UPDATE kelas SET nama_kelas='" . $nama_kelas . "', prodi='" . $prodi . "', fakultas='" . $fakultas . "' WHERE id_kelas=" . $id;

  if (mysqli_query($koneksi, $sql)) {
    header('Location:index.php?page=tampil_kelas');
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
    <h1 style="text-align: center;">Edit Data Kelas</h1>
    <div class="p-5 bg-light rounded">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . "?edit=" . $id; ?>">
        <div class="mb-3">
          <label for="nama_kelas" class="form-label">Nama Kelas</label>
          <input name="nama_kelas" type="text" class="form-control" id="nama_kelas" value="<?php echo $nama_kelas; ?>" required>
        </div>
        <div class="mb-3">
          <label for="prodi" class="form-label">Program Studi</label>
          <input name="prodi" type="text" class="form-control" id="prodi" value="<?php echo $prodi; ?>" required>
        </div>
        <div class="mb-3">
          <label for="fakultas" class="form-label">Fakultas</label>
          <input name="fakultas" type="text" class="form-control" id="fakultas" value="<?php echo $fakultas; ?>" required>
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