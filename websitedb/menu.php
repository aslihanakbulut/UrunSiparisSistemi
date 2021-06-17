<?php
// oturumu baslat
session_start();
//admin girisi yoksa admin giris sayfasın yonlendir
if (!isset($_SESSION['username'])) {
    header("location: adminGiris.php");
    exit();
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8";/>
        <title> ADMİN | MENÜ </title>
        <link rel ="stylesheet"  type="text/css" href="menu.css"/>
    </head>
<body>
    <div class ="ul">
        <div class="li">
            <a href= "adminKyt.php"> ADMİN EKLE </a> <br />
            <a href= "UyeListesi.php"> ÜYE BİLGİLERİ</a> <br />
            <a href="kytsil.php"> ÜYE SİL </a> <br />
            <a href="GnclList.php"> ÜYE BİLGİLERİNİ GÜNCELLE </a> <br />
            <a href="UrunListele.php"> ÜRÜN LİSTELE </a><br />
            <a href="urunGnclKyt.php"> ÜRÜN BİLGİLERİNİ GÜNCELLE </a><br /><br /><br /><br />

            
            <a href="cikis.php"> Çıkış Yap</a>
        </div>
    </div> 

</body>
</html>