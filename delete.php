<?php
include 'koneksi.php';

if(isset($_POST['hapus'])){
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM reservasi WHERE id_reservasi=$id");

    echo "Data berhasil dihapus";
}
?>

<h3>Hapus Data</h3>

<form method="POST">
    ID: <input type="number" name="id">
    <button name="hapus">Hapus</button>
</form>