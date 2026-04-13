<?php
$conn = mysqli_connect("localhost","root","","reservasi_lapangan");

// ================= TAMBAH LAPANGAN =================
if(isset($_POST['tambah_lapangan'])){
    $nama = $_POST['nama_lapangan'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];

    mysqli_query($conn, "INSERT INTO lapangan 
    (nama_lapangan, lokasi, harga_per_jam)
    VALUES ('$nama','$lokasi','$harga')");
}


if(isset($_POST['tambah_reservasi'])){
    $nama = $_POST['nama'];
    $id_lapangan = $_POST['lapangan'];
    $tanggal = $_POST['tanggal'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];

    $cek = mysqli_query($conn, "SELECT * FROM lapangan WHERE id_lapangan='$id_lapangan'");

    if(mysqli_num_rows($cek) > 0){
        mysqli_query($conn, "INSERT INTO reservasi 
        (nama_pemesan, id_lapangan, tanggal, jam_mulai, jam_selesai)
        VALUES ('$nama','$id_lapangan','$tanggal','$mulai','$selesai')");
    } else {
        echo "ID lapangan tidak ditemukan!";
    }
}

$dataLap = mysqli_query($conn, "SELECT * FROM lapangan");
?>

<h2>CREATE DATA</h2>


<h3>Tambah Lapangan</h3>
<form method="POST">
    Nama Lapangan: <input type="text" name="nama_lapangan" required><br>
    Lokasi: <input type="text" name="lokasi" required><br>
    Harga: <input type="number" name="harga" required><br>
    <button name="tambah_lapangan">Tambah Lapangan</button>
</form>

<hr>


<h3>Tambah Reservasi</h3>
<form method="POST">
    Nama Pemesan: <input type="text" name="nama" required><br>

    Lapangan:
    <select name="lapangan">
        <?php while($l = mysqli_fetch_assoc($dataLap)) { ?>
            <option value="<?= $l['id_lapangan'] ?>">
                <?= $l['nama_lapangan'] ?>
            </option>
        <?php } ?>
    </select><br>

    Tanggal: <input type="date" name="tanggal" required><br>
    Jam Mulai: <input type="time" name="mulai" required><br>
    Jam Selesai: <input type="time" name="selesai" required><br>

    <button name="tambah_reservasi">Tambah Reservasi</button>
</form>