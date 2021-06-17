<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title> Üye Güncelle </title>
        <style>
            body{
                background-color: rgb(127, 144, 180);
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            p{
                
                padding: 10px;
                margin: auto;
                margin-top: 40px;
                text-align: center;
                font-weight:bold;
                font-size:18px;
                color:#100835;
               
     
            }
            .btn{
                color :#fff; 
                text-decoration: none;
                display: inline-block;
                margin-top: 10px;
                font-weight: bold;
                font-size: 18px;
            }

        </style>
    </head>

    <body>
 
        <?php
            // oturumu baslat
            session_start();
            //eger admin girişi admin giris sayfasına yönlendir
            if (!isset($_SESSION['username'])) {
                header("location: adminGiris.php");
                exit();
            }
            // mysql baglanma
            include("baglanti.php");

            // forma girilen bilgileri alma
            if (isset($_POST["KullaniciAdi"],$_POST["Sifre"],$_POST["UyeTel"],$_POST["UyeEposta"],
            $_POST["Ulke"],$_POST["Sehir"],$_POST["PostaKodu"],$_POST["Mahalle"],$_POST["Cadde"])) {
                
                $KullaniciAdi=$_POST["KullaniciAdi"];
                $Sifre=$_POST["Sifre"];
                $UyeTel=$_POST["UyeTel"];
                $UyeEposta=$_POST["UyeEposta"];
                $Ulke=$_POST["Ulke"];
                $Sehir=$_POST["Sehir"];
                $PostaKodu=$_POST["PostaKodu"];
                $Mahalle=$_POST["Mahalle"];
                $Cadde=$_POST["Cadde"];
                
                //sorgu hazirlama
                $sql = "UPDATE uyeler SET KullaniciAdi='$KullaniciAdi', Sifre='$Sifre', UyeTel='$UyeTel', UyeEposta='$UyeEposta' WHERE UyeId=".$_GET['id'];
                $sql2 = "UPDATE adrestbl SET Ulke='$Ulke', Sehir='$Sehir', PostaKodu='$PostaKodu', Mahalle='$Mahalle', Cadde='$Cadde' WHERE AdresId=".$_GET['no'];

                

                //Veritabanina sorgu gönderme
                $cevap = mysqli_query($baglanti,$sql);
                $cevap2 = mysqli_query($baglanti,$sql2);

                echo "<html>";
                //Türkçe karakter destegi ayari
                echo "<meta http-equiv='Content-Type' "; 
                echo "content='text/html; charset=UTF-8'/>";

                if ( (!$cevap) && (!$cevap2)) {
                    echo '<br>Hata:' . mysqli_error($baglanti);
                }else {
                echo "<p>Üye Bilgileri Güncellendi!</br> <a class ='btn'href='GnclList.php'>Üye Listesine Dön </a></p> ";
                }
                echo "</html>";
                //veritabani baglantisi kapatma
                mysqli_close($baglanti);

            }

        ?>
    </body>
</html>