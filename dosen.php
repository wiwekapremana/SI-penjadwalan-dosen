<?php
include 'config.php';
$sql = "SELECT * FROM dosen";
$result = $koneksi->query($sql);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $koneksi->query("DELETE FROM dosen WHERE id_dosen=$id") or die($koneksi->error);
  header('Location: index.php?page=tampil_dosen');
}
?>
<!doctype html>
<html lang="en">
<body>
  <div class="container mt-5">
  <center><h1>Data Dosen</h1></center>
    
    <a class="btn btn-primary my-3" href="tambahDosen.php">Tambah Data</a>
    <table class="table mb-5">
      <thead class="table-light">
        <tr>
          <th scope="col">ID Dosen</th>
          <th scope="col">Foto Dosen</th>
          <th scope="col">NIP Dosen</th>
          <th scope="col">Nama Dosen</th>
          <th scope="col">Prodi</th>
          <th scope="col">Fakultas</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0) : ?>
          <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
              <th><?php echo $row["id_dosen"]; ?></th>
              <td>
                <img height="100px" src="gambar/<?php echo $row["foto_dosen"]; ?>" alt="<?php echo $row["foto_dosen"]; ?>">
              </td>
              <td><?php echo $row["nip_dosen"]; ?></td>
              <td><?php echo $row["nama_dosen"] ?></td>
              <td><?php echo $row["prodi"] ?></td>
              <td><?php echo $row["fakultas"] ?></td>
              <td>
                <a href="editDosen.php?edit=<?php echo $row["id_dosen"]; ?>" class="btn btn-success">Edit</a>
                <a href="dosen.php?delete=<?php echo $row["id_dosen"] ?>" class="btn btn-danger">Hapus</a>
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