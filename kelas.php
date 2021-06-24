<?php
include 'config.php';

$sql = "SELECT * FROM kelas";
$result = $koneksi->query($sql);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $koneksi->query("DELETE FROM kelas WHERE id_kelas=$id") or die($koneksi->error);
  header('Location: index.php?page=tampil_kelas');
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
  <!-- Navigation -->


  <div class="container mt-5">
  <center><h1>Data Kelas</h1></center>
    
    <a class="btn btn-primary my-3" href="tambahKelas.php">Tambah Kelas</a>
    <table class="table">
      <thead class="table-light">
        <tr>
          <th scope="col">ID Kelas</th>
          <th scope="col">Nama Kelas</th>
          <th scope="col">Prodi</th>
          <th scope="col">Fakultas</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0) : ?>
          <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
              <th><?php echo $row['id_kelas'] ?></th>
              <td><?php echo $row['nama_kelas'] ?></td>
              <td><?php echo $row['prodi'] ?></td>
              <td><?php echo $row['fakultas'] ?></td>
              <td>
                <a href="editKelas.php?edit=<?php echo $row['id_kelas']; ?>" class="btn btn-success">Edit</a>
                <a href="kelas.php?delete=<?php echo $row['id_kelas']; ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else : ?>
          <tr>
            <th class="text-center" colspan="7">Belum ada data</th>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
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