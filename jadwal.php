<?php
include 'config.php';

$sql = "SELECT * FROM jadwal_kelas";
$result = $koneksi->query($sql);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $koneksi->query("DELETE FROM jadwal_kelas WHERE id_jadwal=$id") or die($koneksi->error);
  header('Location: index.php?page=tampil_jadwal');
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class="container mt-5">
    <h1 style="text-align: center;">Jadwal Kelas</h1>
    <a href="tambahJadwal.php" class="btn btn-primary my-3">Tambah Jadwal</a>
    <table class="table">
      <thead class="table-grey">
        <tr>
          <th scope="col">ID Jadwal</th>
          <th scope="col">ID Dosen</th>
          <th scope="col">ID Kelas</th>
          <th scope="col">Jadwal</th>
          <th scope="col">Mata Kuliah</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0) : ?>
          <?php while ($row = $result->fetch_assoc()) : ?>
            <tr class="table-light">
              <th><?php echo $row['id_jadwal']; ?></th>
              <td><?php echo $row['id_dosen']; ?></td>
              <td><?php echo $row['id_kelas']; ?></td>
              <td><?php echo $row['jadwal']; ?></td>
              <td><?php echo $row['mata_kuliah']; ?></td>
              <td>
                <a href="editJadwal.php?edit=<?php echo $row['id_jadwal']; ?>" class="btn btn-success">Edit</a>
                <a href="jadwal.php?delete=<?php echo $row['id_jadwal']; ?>" class="btn btn-danger">Hapus</a>
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
</body>

</html>