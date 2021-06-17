<?php
session_start();
require ('baglanti.php');

if (isset($_POST['KullaniciAdi']) and isset($_POST['Sifre'])) {
    extract($_POST);

    $sql = "SELECT * FROM uyeler WHERE KullaniciAdi='$KullaniciAdi' AND Sifre='$Sifre'";

    $cevap = mysqli_query($baglanti,$sql);
    // eger cevap FALSE ise HATA yazdiriyoruz.
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    }
    //veritabanindan dönen satir sayisini bulma
    $say = mysqli_num_rows($cevap);
    if ($say == 1) {
        $_SESSION['KullaniciAdi'] = $KullaniciAdi;
       
    }else{
        $mesaj="<h1>Hatalı kullanıcı adı veya şifre! </h1>";
    }
    
} 
if (isset($_SESSION['KullaniciAdi'])) {
    header("location: uyeOzel.php");
   
}else {
    //Oturum yok ise giris ekrani görüntülenir
} 



?>


<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8";/>
    <title> Üye Girişi </title>
    <link rel ="stylesheet"  type="text/css" href="uyeGiris.css"/>
    </head>
    
    <body>
    <form action="<?php $_PHP_SELF ?>" method="POST">
    
<?php
if (isset($mesaj)) {
echo $mesaj;
}
?>
    
        <div class= "giris">
            <h2>ÜYE GİRİŞİ</h2>
            <input class ="input"type="text" name="KullaniciAdi" placeholder="Kullanıcı adınızı giriniz">  
            <br /> <br />
             <input class ="input"type="password" name="Sifre" placeholder="Şifrenizi giriniz">   
            <br /> <br /> <br />
            <input class ="inpt" type="submit" class="buton" value="Giriş Yap"/> 
            <a class ="geri" href="index.php"> Geri Dön</a>

        </div>


    </form>

    </body>
</html>    
