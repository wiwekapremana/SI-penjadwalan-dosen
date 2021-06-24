<?php
include "config.php";


if (isset($_POST['submit'])) {
  $foto_dosen = rand(1000, 10000) . "-" . $_FILES['fotoDosen']['name'];
  $awal = $_FILES['fotoDosen']['tmp_name'];
  $akhir = 'gambar/' . $foto_dosen;
  move_uploaded_file($awal, $akhir);

  $nip = $_POST['nipDosen'];
  $nama = $_POST['nama'];
  $prodi = $_POST['prodi'];
  $fakultas = $_POST['fakultas'];
  
 
  $sql = "INSERT INTO dosen(foto_dosen, nip_dosen, nama_dosen, prodi, fakultas) VALUES('$foto_dosen', '$nip', '$nama', '$prodi ', '$fakultas')";
  
  if (mysqli_query($koneksi, $sql)) {
    header('Location: index.php?page=tampil_dosen');
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

  <title>Tambah Dosen | Sistem Penjadwalan Dosen</title>
</head>

<body>
  <!-- Navigation -->

  <div class="container my-5">
    <h1 style="text-align: center;">Tambah Data Dosen</h1>
    <div class="p-5 bg-light rounded">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="fotoDosen" class="form-label">Foto Dosen</label>
          <input name="fotoDosen" type="file" class="form-control" id="fotoDosen" aria-describedby="fotoDosen" required>
        </div>
        <div class="mb-3">
          <label for="nipDosen" class="form-label">NIP Dosen</label>
          <input name="nipDosen" type="text" class="form-control" id="nipDosen" required>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Dosen</label>
          <input name="nama" type="text" class="form-control" id="nama" required>
        </div>
        <div class="mb-3">
          <label for="prodi" class="form-label">Program Studi</label>
          <input name="prodi" type="text" class="form-control" id="prodi" required>
        </div>
        <div class="mb-3">
          <label for="fakultas" class="form-label">Fakultas</label>
          <input name="fakultas" type="text" class="form-control" id="fakultas" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
        <a href="dosen.php" class="btn btn-danger">Batalkan</a>
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