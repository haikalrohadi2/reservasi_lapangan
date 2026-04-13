<?php
include 'koneksi.php';

$data = mysqli_query($conn, "
SELECT reservasi.*, lapangan.nama_lapangan 
FROM reservasi 
JOIN lapangan ON reservasi.id_lapangan = lapangan.id_lapangan
");
?>

<h2>Data Reservasi</h2>
<a href="create.php">Tambah Data</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Lapangan</th>
    <th>Tanggal</th>
    <th>Jam</th>
</tr>

<?php while($r = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $r['id_reservasi'] ?></td>
    <td><?= $r['nama_pemesan'] ?></td>
    <td><?= $r['nama_lapangan'] ?></td>
    <td><?= $r['tanggal'] ?></td>
    <td><?= $r['jam_mulai'] ?> - <?= $r['jam_selesai'] ?></td>
</tr>
<?php } ?>
</table>