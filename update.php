<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM reservasi WHERE id_reservasi=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];

    mysqli_query($conn, "UPDATE reservasi 
    SET nama_pemesan='$nama' 
    WHERE id_reservasi=$id");

    header("Location: index.php");
}
?>

<form method="POST">
    Nama: <input type="text" name="nama" value="<?= $row['nama_pemesan'] ?>"><br>
    <button type="submit" name="update">Update</button>
</form>

//update