<?php
include 'koneksi.php';

// ambil data kalau klik cari
if(isset($_POST['cari'])){
    $id = $_POST['id'];

    $data = mysqli_query($conn, "SELECT * FROM reservasi WHERE id_reservasi=$id");
    $row = mysqli_fetch_assoc($data);
}

// proses update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $lapangan = $_POST['lapangan'];
    $tanggal = $_POST['tanggal'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];

    mysqli_query($conn, "UPDATE reservasi SET
        nama_pemesan='$nama',
        id_lapangan='$lapangan',
        tanggal='$tanggal',
        jam_mulai='$mulai',
        jam_selesai='$selesai'
        WHERE id_reservasi=$id");

    echo "Berhasil di update";
}

// ambil data lapangan buat dropdown
$lap = mysqli_query($conn, "SELECT * FROM lapangan");
?>

<h3>Cari ID dulu</h3>
<form method="POST">
    ID: <input type="number" name="id" required>
    <button name="cari">Cari</button>
</form>

<?php if(isset($row)){ ?>
<hr>

<h3>Edit Data</h3>
<form method="POST">
    <input type="hidden" name="id" value="<?= $row['id_reservasi'] ?>">

    Nama:
    <input type="text" name="nama" value="<?= $row['nama_pemesan'] ?>"><br>

    Lapangan:
    <select name="lapangan">
        <?php while($l = mysqli_fetch_assoc($lap)) { ?>
            <option value="<?= $l['id_lapangan'] ?>"
            <?= $row['id_lapangan']==$l['id_lapangan'] ? 'selected' : '' ?>>
                <?= $l['nama_lapangan'] ?>
            </option>
        <?php } ?>
    </select><br>

    Tanggal:
    <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>"><br>

    Jam Mulai:
    <input type="time" name="mulai" value="<?= $row['jam_mulai'] ?>"><br>

    Jam Selesai:
    <input type="time" name="selesai" value="<?= $row['jam_selesai'] ?>"><br>

    <button name="update">Update</button>
</form>
<?php } ?>