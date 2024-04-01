<?php
  require_once "dbconn.php";

  // $_idx = $_GET['id'];
  $_idx = isset($_GET['id']) ? $_GET['id'] : null;
  if($_idx){
    $sql = "SELECT * FROM pasien WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_idx]);
    $row = $stmt->fetch()? :[];
    $tombol = "Ubah";
  }else{
    $tombol = "Tambah";
    $row = [];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form action="proses_pasien.php" method="POST" class="m-5">
  <div class="form-group row">
    <label for="kode" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="kode" name="kode" type="text" class="form-control" required="required"
              value="<?= isset($row['kode'])? $row['kode']: '' ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama lengkap</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control" required="required"
        value="<?= isset($row['nama'])? $row['nama']: '' ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="tmp_lahir" class="col-4 col-form-label">Tempat lahir</label> 
    <div class="col-8">
      <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control"
        value="<?= isset($row['tmp_lahir'])? $row['tmp_lahir']: '' ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="tgl_lahir" class="col-4 col-form-label">Tanggal lahir</label> 
    <div class="col-8">
      <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control"
        value="<?= isset($row['tgl_lahir'])? $row['tgl_lahir']: '' ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis kelamin</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="gender" id="gender_0" type="radio" class="custom-control-input" value="L" required="required"
          <?= isset($row['gender']) && $row['gender'] == 'L'? 'checked': '' ?>> 
        <label for="gender_0" class="custom-control-label">Laki-laki</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="gender" id="gender_1" type="radio" class="custom-control-input" value="P" required="required"
          <?= isset($row['gender']) && $row['gender'] == 'P'? 'checked': '' ?>> 
        <label for="gender_1" class="custom-control-label">Perempuan</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" type="email" class="form-control"
        value="<?= isset($row['email'])? $row['email']: '' ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"><?= isset($row['alamat'])? $row['alamat']: '' ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="kelurahan" class="col-4 col-form-label">Kelurahan</label> 
    <div class="col-8">
      <select id="kelurahan_id" name="kelurahan_id" class="custom-select" required="required">
        <option value="1" <?= isset($row['kelurahan_id']) && $row['kelurahan_id'] == '1'? 'selected': '' ?>>Parung</option>
        <option value="2" <?= isset($row['kelurahan_id']) && $row['kelurahan_id'] == '2'? 'selected': '' ?>>Depok</option>
        <option value="3" <?= isset($row['kelurahan_id']) && $row['kelurahan_id'] == '3'? 'selected': '' ?>>Tanggrang</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <input name="proses" type="submit" value="<?= $tombol ?>" class="btn btn-primary"></button>
      <input name="proses" type="submit" value="Batal" class="btn btn-danger"></button>
    </div>
  </div>
  <?php
    if($_idx){
      echo "<input type='hidden' name='idx' value='".$_idx."'>";
    }
  ?>
</form>
</body>
</html>