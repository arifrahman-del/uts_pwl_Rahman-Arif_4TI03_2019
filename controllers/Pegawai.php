<?php
require_once '../pegawai.php';
require_once '../models/pegawaiController.php';
//1.tangkap request element form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$kondisi = $_POST['nip'];
$harga = $_POST['email'];
$stok = $_POST['agama'];
$idjenis = $_POST['divisi'];
$foto = $_POST['foto'];
$tombol = $_POST['proses'];
//2.menyimpan data2 di atas sebuah array
$data = [
    $kode, //? 1
    $nama, //? 2
    $nip, //? 3
    $email, //? 4
    $agama, //? 5
    $divisi, //?6
    $foto //? 7
];
//3.proses
$obj = new pegawai();
switch ($tombol) {
    case 'simpan':
        $obj->simpan($data);
    break;
    case 'ubah':
        $data[] = $_POST['idx'];//tangkap hidden field u/ ? ke-8
        $obj->ubah($data);
    break;
    case 'hapus':
        $id[] = $_POST['idx'];//tangkap hidden field u/ ? ke-1
        $obj->hapus($id);
    break;
    default://tombol batal
        header('Location:http://localhost:8080/appku/index.php?hal=detailPegawai.php');
        break;
}

//4.landing page
header('Location:http://localhost:8080/appku/index.php?hal=detailPegawai.php');