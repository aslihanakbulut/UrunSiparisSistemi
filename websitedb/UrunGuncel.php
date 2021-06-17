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
            //eger admin girişi admin giris sayfasına yönlendir
            if (!isset($_SESSION['username'])) {
                header("location: adminGiris.php");
                exit();
            }
            // mysql baglanma
            include("baglanti.php");

            // Forma girilen degerleri alma
            if (isset($_POST["UrunAdi"],$_POST["Fiyat"])) {
                
                $UrunAdi=$_POST["UrunAdi"];
                $Fiyat=$_POST["Fiyat"];
                
                
                //sorgu hazirlama
                $sql = "UPDATE urunler SET UrunAdi='$UrunAdi', Fiyat='$Fiyat' WHERE UrunId=".$_GET['u_id'];
            

                

                //Veritabanina sorgu gönderme
                $cevap = mysqli_query($baglanti,$sql);
                

                echo "<html>";
                //türkçe karakter destegi ayari
                echo "<meta http-equiv='Content-Type' "; 
                echo "content='text/html; charset=UTF-8'/>";

                if ( (!$cevap)) {
                    echo '<br>Hata:' . mysqli_error($baglanti);
                }else {
                echo "<p> Ürün Bilgileri Güncellendi!</br> <a class ='btn' href='UrunGnclKyt.php'>Ürün Listesine Dön </a> </p>";
                }
                echo "</html>";
                //veritabani baglantisi kapat
                mysqli_close($baglanti);

            }

        ?>
    </body>
</html>
