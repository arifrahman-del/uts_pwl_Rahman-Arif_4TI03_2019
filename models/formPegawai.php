<?php
class pegawai{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    //member3 method CRUD
    public function datapegawai(){
        $sql = "SELECT pegawai.*, jenis.nama AS kategori FROM pegawai
                INNER JOIN jenis ON jenis.id = pegawai.idjenis
                ORDER BY pegawai.id DESC";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getpegawai($id){
        $sql = "SELECT pegawai.*, jenis.nama AS kategori FROM pegawai
                INNER JOIN jenis ON jenis.id = pegawai.idjenis
                WHERE pegawai.id = ?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function dataPegawai(){
        $sql = "SELECT * FROM jenis ";
        //fungsi query eksekusi query dan ambil datanya
        $rs = $this->koneksi->query($sql);
        return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO pegawai(nama,nip,email,agama,iddivisi,foto)
                VALUES (?,?,?,?,?,?,?)";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data){
        $sql = "UPDATE pegawai SET kode=?,nama=?,nip=?,email=?,
                agama=?,ididivisi=?,foto=? WHERE id=?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM pegawai WHERE id=?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }

    
}