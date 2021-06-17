<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>Ürün Güncelle </title>
        <style>
            body{
                
                background-color: rgb(127, 144, 180);
                font-weight: bold;
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }
            
            .arkaplan{
                
                width: 350px;
                height: 200px;
                margin: auto;
                margin-top: 160px;
                background-color: rgb(255, 255, 255);   
                padding: 10px;
                display: block;
            }
            
            .input{
                background-color: rgb(177, 183, 235);
                width: 200px;
                height: 10px;
                border-radius: 2px;
                border: solid thin #ddd;
                padding: 10px;
                margin-top: 10px;  
                font-weight:bold;
            }
            .buton{
                color:#100835;
                width :100px;
                text-decoration:none;
                font-size: 18px;
                font-weight: bold;
                margin-left: 180px;
                
            
            }
            .btn{
                color:#100835;
                text-decoration: none;
                display: inline-block;
                margin-top: 20px;
                font-weight: bold;
                font-size: 18px;
            }

        </style>
    </head>

    <body>
        <?php
            // oturumu baslat
            session_start();
            //admin girisi yoksa admin giris sayfasına yönlendirir
            if (!isset($_SESSION['username'])) {
                header("location: adminGiris.php");
                exit();
            }
            // mysql baglantisi
            include("baglanti.php");

            // sorgu yazma
            $sql = "SELECT * FROM urunler WHERE UrunId=".$_GET['u_id'];


            //sorguyu veritabanina gönderme
            $cevap = mysqli_query($baglanti,$sql);


            //Eger cevap FALSE ise HATA yazidrma
            if ( (!$cevap) ) {
                echo '<br>Hata:' . mysqli_error($baglanti);
            }

            //veritabanindan gelen cevabi alma
            $gelen=mysqli_fetch_array($cevap);
            $u_id=(int)$_GET['u_id'];


            echo "<html>";
            echo "<form class ='arkaplan' action='UrunGuncel.php?u_id=$u_id'";

            echo " method='POST'>";
            echo "<br> Ürün Adı: ";
            echo "<input class ='input' type='text' ";
            echo "name='UrunAdi'";
            echo "value=";
            echo $gelen['UrunAdi'];
            echo " />";
            echo "<br />";
            echo "Fiyat: &nbsp; &nbsp; &nbsp;&nbsp;";
            echo "<input class ='input' type='text' ";
            echo "name='Fiyat'";
            echo "value=";
            echo $gelen['Fiyat'];
            echo " />";
            echo "<br />";
            echo "<br />";
            echo "<input class='buton' type='submit' ";
            echo "value='KAYDET'";
            echo " />";
            echo"<br /> <br /><a class ='btn' href='urunGnclKyt.php'> İptal </a> ";
            echo "</form>";
            echo "</html>";

        ?>
    </body>
</html>
            


