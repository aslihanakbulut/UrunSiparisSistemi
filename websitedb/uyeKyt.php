<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8";/>
        <title>  Üye Kayıt</title>
        <link rel ="stylesheet"  type="text/css" href="uyeKyt.css" />
      
    </head>    

<body>
        <div class="panel">
              <form action="<?php $_PHP_SELF ?>" method="POST">
                    <h2> Üye Kayıt Formu </h2>
                    Kullanıcı Adı :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input class ="inpt" type="text" name="KullaniciAdi" /> <br />
                    Sifre : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<input class ="inpt" type="password" name="Sifre"> <br />
                    Telefon Numarası:&nbsp;&nbsp;<input class ="inpt" type="text" name ="UyeTel" /> <br />
                    E-posta:&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input class ="inpt"type="text" name ="UyeEposta" /> <br />
                    Ülke: &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input class ="inpt" type="text" name="Ulke" /> <br />
                    Şehir:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <input class ="inpt" type="text" name="Sehir" /> <br/>
                    Posta Kodu: &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input class ="inpt" type="text" name="PostaKodu" /> <br/>
                    Mahalle:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <input  class ="inpt"type="text" name="Mahalle" /> <br/>
                    Cadde: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<input class ="inpt"type="text" name="Cadde" /> <br/><br /><br />


                    <input  class ="button" type="submit" value="KAYDET" /> <br />
                    <br><a class ="btn"  href='index.php'> İPTAL </a> &nbsp;<a class ="btn"  href='index.php'> Anasayfa </a>
                </form>
                

  
        </div>    
            

    </body>
</html>

<?php
//oturumu baslat
session_start();

//mysql baglanti kodunu ekleme
include("baglanti.php");

//degiskenleri formdan aliyoruz
if (isset($_POST["KullaniciAdi"],$_POST["Sifre"],$_POST["UyeTel"],$_POST["UyeEposta"],$_POST["Ulke"],$_POST["Sehir"],$_POST["PostaKodu"],$_POST["Mahalle"],$_POST["Cadde"])) {
    
    $KullaniciAdi=$_POST["KullaniciAdi"];
    $Sifre=$_POST["Sifre"];
    $UyeTel=$_POST["UyeTel"];
    $UyeEposta=$_POST["UyeEposta"];
    $Ulke=$_POST["Ulke"];
    $Sehir=$_POST["Sehir"];
    $PostaKodu=$_POST["PostaKodu"];
    $Mahalle=$_POST["Mahalle"];
    $Cadde=$_POST["Cadde"];

    echo "<html>";
    //Türkçe karakter desteği
    echo "<meta http-equiv='Content-Type' ";
    echo "content='text/html; charset=UTF-8' />";
    
        
    //Uye ekleme sorgusunu hazirliyoruz
    $sql = "INSERT INTO uyeler"."(KullaniciAdi,Sifre,UyeTel,UyeEposta)"."VALUES ('$KullaniciAdi','$Sifre','$UyeTel','$UyeEposta')"; 
    
    //Adres ekleme sorgusunu hazirliyoruz      
    $sql2= "INSERT INTO adrestbl"."(Ulke,Sehir,PostaKodu,Mahalle,Cadde)"."VALUES ('$Ulke','$Sehir','$PostaKodu','$Mahalle','$Cadde')";
    
    //Sorgulari veritabanina gönderiyoruz
    $cevap = mysqli_query($baglanti,$sql);
    $cevap2= mysqli_query($baglanti,$sql2);
    
    //Eger cevap FALSE ise HATA yazdiriyoruz
    if ((!$cevap) && (!$cevap2)) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    }if ($cevap && $cevap2) {
        $sql3 = "SELECT UyeId FROM uyeler WHERE KullaniciAdi='$KullaniciAdi' AND Sifre='$Sifre' AND UyeTel='$UyeTel' AND UyeEposta='$UyeEposta' ";
        $cevap3 = mysqli_query($baglanti,$sql3);
        $sql4 = "SELECT AdresId FROM adrestbl WHERE Ulke='$Ulke' AND Sehir='$Sehir' AND PostaKodu='$PostaKodu' AND Mahalle='$Mahalle' AND Cadde='$Cadde'";
        $cevap4 = mysqli_query($baglanti,$sql4);
        //veritabanindan gelen degerleri satir satir alma
        $gelen=mysqli_fetch_array($cevap3);
        $No=(int)$gelen['UyeId'];
        
        $gelen2=mysqli_fetch_array($cevap4);
        $Adres=(int)$gelen2['AdresId'];

        $sql5 = "INSERT INTO uye_adres"."(uye_adres_gecisId,uye_adres_uyeNo)"."VALUES ($Adres,$No)";

        $cevap5 = mysqli_query($baglanti,$sql5);
        echo "<h1> Hesabınız oluşturuldu Lütfen anasayfadan üye girişi yapınız.</h1>";
    }
    
    echo "</html>";
    
    //VeriTabani baglantisini kapatiyoruz.
    mysqli_close($baglanti);
}
?>