<html>
    <head>
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
            //admin girisi yoksa admin giris sayfasına yönlendir
            if (!isset($_SESSION['username'])) {
                header("location: adminGiris.php");
                exit();
            }
            //mysql baglanti kodu
            include("baglanti.php");

            // sorgu yazma
            $sql = "DELETE FROM uyeler WHERE UyeId=".$_GET['id'];
            $sql2 = "DELETE FROM adrestbl WHERE AdresId=".$_GET['no'];
            $sql3 = "DELETE FROM uye_adres WHERE uye_adres_gecisId=".$_GET['id'];

            // sorguyu veritabanina gönderme
            $cevap3 = mysqli_query($baglanti,$sql3);
            $cevap = mysqli_query($baglanti,$sql);
            $cevap2 = mysqli_query($baglanti,$sql2);



            echo "<html>";
            //türkçe karakter destegi ayari
            echo "<meta http-equiv='Content-Type' "; 
            echo "content='text/html; charset=UTF-8'/>";

            if ( (!$cevap) && (!$cevap2) && (!$cevap3) ) {
                echo '<br>Hata:' . mysqli_error($baglanti);
            }else {
                echo "<p> Kayıt silindi!</br> <a class ='btn'href='kytSil.php'>Geri Dön</a>\n </p>";

              
            }
            echo "</html>";
            //veritabani baglantisi kapatma
            mysqli_close($baglanti);
            ?>

    </body>

</html>
