<?php
    include 'connect.php';

    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_harga = $_POST['harga'];
    $_stok = $_POST['stok'];
    $_jenis = $_POST['jenis_produk_id'];
    $_proses = $_POST['proses'];

    $sql = "SELECT kode, nama, harga, stok FROM produk
            WHERE id = :jenis_produk_id";
    $rs = $koneksi->prepare($sql);
    $rs->bindParam(":jenis_produk_id", $_jenis);
    $rs->execute();

    $nama_jenis = $rs->fetchColumn();
        
    // $ar_produk = [$_kode,$_nama,$_harga,$_stok,$_jenis];
    // $sql = "INSERT INTO produk (kode, nama, harga, stok, 
    //         jenis_produk_id) VALUE (?,?,?,?,?)";
    $sql = "INSERT INTO produk (kode, nama, harga, stok,
            jenis_produk_id) VALUE (:kode, :nama, :harga,
            :stok, :jenis_produk_id)";
    $rs = $koneksi->prepare($sql);
    $rs->bindParam(":kode", $_kode);
    $rs->bindParam(":nama", $_nama);
    $rs->bindParam(":harga", $_harga);
    $rs->bindParam(":stok", $_stok);
    $rs->bindParam(":jenis_produk_id", $_jenis);
    header('Location: index.php');
    $rs->execute()
    // $rs->execute($ar_produk);
    
    // if ($_proses == "Tambah"){
    //     $sql = "INSERT INTO produk (kode,nama,harga,stok,jenis_produk_id)
    //             VALUE (?,?,?,?,?)";
    //     $statm = $koneksi->prepare($sql);
    //     $stat->execute($ar_produk);
    // }elseif ($_proses == "Ubah") {
    //     $_idx = ['idx'];
    //     $ar_produk[] = $_idx;
    //     $sql = "UPDATE produk SET kode=?, nama=?, harga=?, stok=?,
    //             jenis_produk_id=? WHERE id=?";
    //     $statm = $koneksi->prepare($sql);
    //     $stat->execute($ar_produk);
    // }else {
    //     $_idx = $_GET['idx'];
    //     $sql = 'DELETE FROM produk WHERE id=?';
    //     $statm = $koneksi->prepare($sql);
    //     $statm->execute([$_idx]);
    // }
    // header('Location: index.php');  
    // $statm->execute($ar_produk);
?>