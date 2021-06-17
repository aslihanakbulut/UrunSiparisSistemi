<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8";/>
        <title> Sipariş Tamamla</title>

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
            //eger uye girişi uye giris sayfasına yönlendir
            if (!isset($_SESSION['KullaniciAdi'])) {
                header("location: uyeGiris.php");
                exit();
            }
            // mysql baglanma
            include("baglanti.php");


            echo "<p>Sipariş tamamlandı!</br> <a class ='btn' href='uyeOzel.php'> Hesabıma Git </a> </p>";
        ?>
    </body>
</html>