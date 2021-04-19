<?php
require_once 'models/pegawai.php';
$ar_nip = ['Baru','Second'];
$obj = new pegawai();
$rs = $obj->dataJenis();
?>

<h3>Form pegawai</h3>
<form method="POST" action="controllers/pegawaiController.php">
  <div class="form-group row">
    <label for="kode" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="kode" name="kode" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama pegawai</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Nip</label> 
    <div class="col-8">
    <?php
    $no = 0;
    foreach($ar_nip as $nip){
    ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="nip" id="nip_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $nip?>" required="required"> 
        <label for="nip_<?= $no ?>" class="custom-control-label"><?= $nip?></label>
      </div>
    <?php 
    $no++;
    } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">email</label> 
    <div class="col-8">
      <input id="email" name="email" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="agama" class="col-4 col-form-label">agama</label> 
    <div class="col-8">
      <input id="agama" name="agama" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="divisi" class="col-4 col-form-label">Divisi</label> 
    <div class="col-8">
      <select id="divisi" name="divisi" class="custom-select" required="required">
        <option value="">-- Pilih divisi --</option>
        <?php
        foreach($rs as $j){
        ?>
            <option value="<?= $j['id'] ?>"> <?= $j['nama'] ?> </option>
        <?php } ?>    
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="simpan" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>