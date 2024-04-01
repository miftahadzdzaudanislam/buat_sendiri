<?php
    include "connect.php";

    $sql = "SELECT * FROM produk";
    $rs = $koneksi->query($sql);
    // foreach ($rs as $row){
    //     echo '<br>'. $row['id'].'-'.$row['nama'];
    // }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba php</title>
</head>
<body>
    <h2>Produk</h2>
    <table border="1" style="width: 100%;">
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Jenis ID</th>
            <th>Action</th>
        </tr>

        <?php foreach($rs as $row) {?>
        <tr>
            <td> <?= $row['id'] ?> </td>
            <td> <?= $row['kode'] ?> </td>
            <td> <?= $row['nama'] ?> </td>
            <td> <?= $row['harga'] ?> </td>
            <td> <?= $row['stok'] ?> </td>
            <td> <?= $row['jenis_produk_id'] ?> </td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>/
                <a href="delete.php?idx=<?= $row['id'] ?>&proses=Hapus">Delete</a>
            </td>
        </tr>
        <?php }; ?>
    </table>

    <a href="input.php">kembali</a>
    
</body>
</html>