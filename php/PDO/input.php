<?php
    require 'connect.php';

    $sql = "SELECT * FROM jenis";
    $rs = $koneksi->query($sql);

    // $_idx = $_GET['id'];
    // if ($_idx){
    //     $sql = "SELECT * FROM produk WHERE id=?";
    //     $statm = $koneksi->prepare($sql);
    //     $statm->execute([$_idx]);
    //     $row = $statm->fetch();
    //     $tombol = "Ubah";
    // }else {
    //     $tombol = "Tambah";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form produk</title>
</head>
<body>
    <form action="insrt.php" method="POST">
    Kode: <input type="text" name="kode" value="" required><br>
    Nama: <input type="text" name="nama" value="" required><br>
    Harga: <input type="number" name="harga" value="" required><br>
    Stok: <input type="number" name="stok" value="" required><br>
    Jenis Produk: <select name="jenis_produk_id" id="jenis_produk_id">
        <?php
        while($row = $rs->fetch()){
            echo "<option value=".$row['id'].">".$row['nama']."</option>";
        }
        ?>
    </select>
    <!-- <input type="submit" value="" name="proses"> -->
    <input type="submit" value="submit" name="proses">
    <?php
        // if($_idx){
        //     echo "<input type='hidden' name='id' value='".$_idx."'>";
        // }
    ?>
</form>
</body>
</html>