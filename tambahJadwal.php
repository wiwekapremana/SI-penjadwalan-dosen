<?php
include "config.php";

$sqlDosen = "SELECT * FROM dosen";
$dosen = $koneksi->query($sqlDosen);

$sqlKelas = "SELECT * FROM kelas";
$kelas = $koneksi->query($sqlKelas);

if (isset($_POST['submit'])) {
  $id_dosen = $_POST['id_dosen'];
  $id_kelas = $_POST['id_kelas'];
  $jadwal = $_POST['jadwal'];
  $mata_kuliah = $_POST['mata_kuliah'];


  $sql = "INSERT INTO jadwal_kelas(id_dosen, id_kelas, jadwal, mata_kuliah) VALUES('$id_dosen', '$id_kelas ', '$jadwal', '$mata_kuliah')";
  
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

  <title>Tambah Jadwal | Sistem Penjadwalan Dosen</title>
</head>

<body>

  <div class="container my-5">
  <center><h1>Tambah Jadwal Kelas</h1></center>
    
    <div class="p-5 bg-light rounded">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="mb-3">
          <label for="id_dosen" class="form-label">ID Dosen</label>
          <?php if ($dosen->num_rows > 0) : ?>
            <select name="id_dosen" id="id_dosen" class="form-control" aria-label="Default select example">
              <?php while ($row = $dosen->fetch_assoc()) : ?>
                <option value="<?php echo $row['id_dosen']; ?>"><?php echo $row['id_dosen'] . " - " . $row['nama_dosen']; ?></option>
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
              <?php while ($row = $kelas->fetch_assoc()) : ?>
                <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['id_kelas'] . " - " . $row['nama_kelas']; ?></option>
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
          <input name="jadwal" type="datetime-local" class="form-control" id="jadwal" required>
        </div>
        <div class="mb-3">
          <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
          <input name="mata_kuliah" type="text" class="form-control" id="mata_kuliah" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
        <a href="index.php?page=tampil_jadwal" class="btn btn-danger">Batalkan</a>
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