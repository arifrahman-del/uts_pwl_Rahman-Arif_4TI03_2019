<?php
session_start();
require_once '../pegawaiController.php';
require_once '../models/pegawai.php';
//1.tangkap request element form
$username = $_POST['username'];
$password = $_POST['password'];
//2.menyimpan data2 di atas sebuah array
$data = [
    $username, //? 1
    $password, //? 2
];
//3.proses
$obj = new Member();
$rs = $obj->cekLogin($data);
if(!empty($rs)){
    //simpan session
    $_SESSION['MEMBER'] = $rs;
    //landing page
    header('Location:http://localhost:8080/appku/index.php?hal=datapegawai');    
}
else{
    //landing page
    header('Location:http://localhost:8080/appku/index.php?hal=gagalLogin');
}

