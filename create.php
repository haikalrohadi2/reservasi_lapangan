<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $lapangan = $_POST['lapangan'];
    $tanggal = $_POST['tanggal'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];

    $query = "INSERT INTO reservasi 
    (nama_pemesan, id_lapangan, tanggal, jam_mulai, jam_selesai)
    VALUES ('$nama', '$lapangan', '$tanggal', '$mulai', '$selesai')";

    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<form method="POST">
    Nama: <input type="text" name="nama"><br>
    Lapangan: <input type="number" name="lapangan"><br>
    Tanggal: <input type="date" name="tanggal"><br>
    Jam Mulai: <input type="time" name="mulai"><br>
    Jam Selesai: <input type="time" name="selesai"><br>
    <button type="submit" name="submit">Tambah</button>
</form>
