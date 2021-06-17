<?php
session_start();
//admin girisi yapıldı mı kontrol et giris yoksa admin giris sayfasına yonlendir
if (!isset($_SESSION['username'])) {
        header("location: adminGiris.php");
        exit();
 }

?>                 
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8";/>
            <title> Admin Ekleme </title>
            <link rel ="stylesheet"  type="text/css" href="adminKyt.css"/>
    </head>     

    <body>
        <div class="panel">
            <form action="Adminekle.php" method="POST">
            <h2>Admin Bilgileri </h2>
                Kullanıcı Adı:  &nbsp;&nbsp;
                <input type="text" name="username" class="inpt"> <br /><br />
                Şifre: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <input type="password" name="password" class="inpt"> <br /><br />

                <input type="submit" class="button" value="KAYDET"/> <br /> 
                <a href="menu.php" class="btn"> Geri Dön </a> 
                   

            </form>

            
        </div>    

       
    </body>
</html>
