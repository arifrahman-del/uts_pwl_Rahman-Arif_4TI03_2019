<?php
session_start();
global $member;
global $role;
require_once 'koneksi.php';

include_once 'kode_atas.php';
include_once 'header.php';
include_once 'menu.php';
echo '<br/>';
include_once 'sidebar.php';
include_once 'main.php';
echo '<br/>';
include_once 'footer.php';
include_once 'kode_bawah.php';