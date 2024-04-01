<?php
    require_once 'dbconn.php';

    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_alamat = $_POST['alamat'];
    $_kelurahan = $_POST['kelurahan_id'];

    $pasien = [$_kode,$_nama,$_tmp_lahir,$_tgl_lahir,
                $_gender,$_email,$_alamat,$_kelurahan];

    $_proses = $_POST['proses'];
    if($_proses == 'Tambah'){
        $sql = "INSERT INTO pasien (kode, nama, tmp_lahir,
                tgl_lahir, gender, email, alamat, kelurahan_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        // definisikan statmen sql
        $stmt = $dbh->prepare($sql);
        // eksekusi statmen sql
        $stmt->execute($pasien);
    }else if($_proses == "Ubah"){
        $_idx = $_POST['idx'];
        $pasien[] = $_idx;
        $sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?,
                tgl_lahir=?, gender=?, email=?, alamat=?,
                kelurahan_id=? WHERE id=?";
        $stmt = $dbh->prepare($sql);    
        $stmt->execute($pasien);
    }else{
        $_idx = $_GET['idx'];
        $sql = 'DELETE FROM pasien WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$_idx]);
    }
    header('Location: data_pasien.php');
?>