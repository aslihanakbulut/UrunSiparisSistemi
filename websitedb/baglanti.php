<?php
$server = '94.73.144.214';
$user = 'u0204202_3dfirin_user';
$password = '3D_Firin_3425';
$database = 'u0204202_3dfirin';
$baglanti = mysqli_connect($server,$user,$password,$database);
mysqli_set_charset($baglanti,"utf8");
if (!$baglanti) {
    echo "MySQL sunucu ile baglanti kurulamadi!!! </br> ";
    echo "HATA: " . mysqli_connect_error();
    exit;
}

?>