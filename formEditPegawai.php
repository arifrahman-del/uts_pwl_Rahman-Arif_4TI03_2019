<?php
require_once 'models/pegawai.php';
$ar_email = ['Baru','Second'];
$obj = new pegawai();
$rs = $obj->datadivisi();
//tangkap request id di url
$id = $_REQUEST['id'];
$data_edit = $obj->getpegawai($id);
?>

<h3>Form pegawai</h3>
<form method="POST" action="controllers/pegawaiController.php">
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">nip</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="nip" name="nip" value="<?= $data_edit['nip'] ?>" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama pegawai</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $data_edit['nama'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">email</label> 
    <div class="col-8">
    <?php
    $no = 0;
    foreach($ar_email as $email){
    //edit email
    $cek = ($data_edit['email'] == $email) ? "checked" : "";    
    ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="email" id="email_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $email?>" <?= $cek ?> required="required"> 
        <label for="email_<?= $no ?>" class="custom-control-label"><?= $email?></label>
      </div>
    <?php 
    $no++;
    } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="agama" class="col-4 col-form-label">agama</label> 
    <div class="col-8">
      <input id="agama" name="agama" value="<?= $data_edit['agama'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="stok" class="col-4 col-form-label">Stok</label> 
    <div class="col-8">
      <input id="stok" name="stok" type="text" value="<?= $data_edit['stok'] ?>" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="divisi" class="col-4 col-form-label">divisi</label> 
    <div class="col-8">
      <select id="divisi" name="divisi" class="custom-select" required="required">
        <option value="">-- Pilih divisi --</option>
        <?php
        foreach($rs as $j){
        //edit divisi
        $sel = ($data_edit['iddivisi'] == $j['id']) ? "selected" : ""; 
        ?>
            <option value="<?= $j['id'] ?>" <?= $sel ?>> <?= $j['nama'] ?> </option>
        <?php } ?>    
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" value="<?= $data_edit['foto'] ?>" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="ubah" class="btn btn-primary">Ubah</button>
      <input type="hidden" name="idx" value="<?= $id ?>" />
    </div>
  </div>
</form>