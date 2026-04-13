<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM reservasi");
?>

<h2>Data Reservasi</h2>
<a href="tambah.php">Tambah Data</a>
<table border="1">
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Lapangan</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $row['id_reservasi'] ?></td>
    <td><?= $row['nama_pemesan'] ?></td>
    <td><?= $row['id_lapangan'] ?></td>
    <td><?= $row['tanggal'] ?></td>
    <td><?= $row['jam_mulai'] ?> - <?= $row['jam_selesai'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id_reservasi'] ?>">Edit</a>
        <a href="hapus.php?id=<?= $row['id_reservasi'] ?>">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

//read