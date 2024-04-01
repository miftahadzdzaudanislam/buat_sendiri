<?php
    require_once 'dbconn.php';
    // definisikan query
    $sql = "SELECT * FROM pasien";
    // jalankan query
    $stmt = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABEL PASIEN</title>
</head>
<body>
    <table border="1" style="width: 100%;">
        <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
            $nomor = 1;
            foreach($stmt as $row){
        ?>
        <tr>
            <td> <?= $nomor ?> </td>
            <td> <?= $row['kode'] ?> </td>
            <td> <?= $row['nama'] ?> </td>
            <td> <?= $row['alamat'] ?> </td>
            <td> <?= $row['email'] ?> </td>
            <td>
                <a href="form_pasien.php?id=<?= $row['id'] ?>">Edit</a> /
                <a href="proses_pasien.php?idx=<?= $row['id'] ?>&proses=Hapus">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; 
            }; 
        ?>
    </table>
    <a href="form_pasien.php">Kembali</a>
</body>
</html>