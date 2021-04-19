<?php
require_once 'models/datapegawai.php';
//tangkap request id di url
$id = $_REQUEST['id'];
$obj = new Pegawai();
$rs = $obj->getdatapegawai($id);
//print_r($rs); exit();
?>
<div class="card" style="width: 18rem;">
  <?php
  $gambar = (!empty($rs['foto'])) ? $rs['foto'] : "no_image.jpg";
  ?>
  <img src="images/<?= $gambar ?>" width="40%" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title"><?= $rs['nama'] ?></h5>
    <p class="card-text">
        Nama :  <?= $rs['nama'] ?>
        <br/>nip <?= $rs['nip'] ?>
        <br/>Email : <?= number_format($rs['email'],0,',','.') ?>
        <br/>Agama <?= $rs['agama'] ?>
        <br/>Iddivisi <?= $rs['ididivisi'] ?>
    </p>
    <a href="index.php?hal=datadatapegawai" class="btn btn-primary">Go Back</a>
  </div>
</div>