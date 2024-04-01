<?php
    require 'connect.php';
    $_id = $_GET['id'];
    $sql = "SELECT * FROM produk WHERE id=?";
    $statm = $koneksi->prepare($sql);
    $statm->execute([$_id]);
    $row = $statm->fetch();
    echo 'Kode Produk '. $row['kode'];
    echo '<br>Nama Produk '. $row['nama'];
    echo '<br>Harga '. $row['harga'];
?>