<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>Admin Ekle</title>
        <style>
            body{
                background-color: rgb(127, 144, 180);
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            p{
                width: 500px;
                padding: 10px;
                margin: auto;
                margin-top: 40px;
                text-align: center;
                font-weight:bold;
                font-size:18px;
                color:#000;
               
     
            }
            .btn{
                color :#fff; 
                text-decoration: none;
                display: inline-block;
                margin-top: 150px;
                font-weight: bold;
                font-size: 18px;
            }

        </style>
    <head>

    <body>

        <?php
            //oturumu baslat
             session_start();
                //eger admin girisi yoksa admin giris sayfasina yönlendir
                if (!isset($_SESSION['username'])) {
                    header("location: adminGiris.php");
                     exit();
                 }
                require ('baglanti.php');

                 //Kullanici adi ve sifresinin bos veya dolu oldugunu kontrol etme
                if (!empty($_POST['username']) && !empty($_POST['password'])) {
                   extract($_POST);

                    $sql = "INSERT INTO admintbl"."(username,password)"."VALUES ('$username','$password')";

                    $cevap = mysqli_query($baglanti,$sql);

                    if ($cevap) {
                        echo "<p> Kullanıcı Oluşturuldu. </p>";
                        }else {
                            echo "<p>Kullanıcı Oluşturulamadı! </p>";
                        } 
                }

                else {
                    echo "<p> Kullanıcı Oluşturulamadı!</p>";
               }

            echo "<a class='btn' href='menu.php'>Geri Dön</a>";
           
           
           ?>
    </body>
</html>       

