<?php
session_start();
require ('baglanti.php');

if (isset($_POST['username']) and isset($_POST['password'])) {
    extract($_POST);

    $sql = "SELECT * FROM admintbl WHERE username='$username' AND password='$password'";

    $cevap = mysqli_query($baglanti,$sql);
    // eger cevap FALSE ise HATA yazdiriyoruz.
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($baglanti);
    }
    //veritabanindan dönen satir sayisini bulma
    $say = mysqli_num_rows($cevap);
    if ($say == 1) {
        $_SESSION['username'] = $username;
       
    }else{
        $mesaj="<h1>Hatalı kullanıcı adı veya şifre! </h1>";
    }
    
} 
if (isset($_SESSION['username'])) {
    header("location: menu.php");
   
}else {
    //Oturum yok ise giris ekrani görüntülenir
} 



?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8";/>
        <title> Admin Girişi </title>
        <link rel ="stylesheet"  type="text/css" href="adminGiris.css"/>
    </head>
    
    <body>
    <form action="<?php $_PHP_SELF ?>" method="POST">
    
<?php
if (isset($mesaj)) {
echo $mesaj;
}
?>
    
        <div class= "giris">
            <h2>ADMİN GİRİŞİ</h2>
            <input class ="input" type="text" name="username" placeholder="KULLANICI ADI">  
            <br /> <br />
             <input class ="input" type="password" name="password" placeholder="ŞİFRE">   
            <br /> <br /> <br />
            <input class ="inpt" type="submit" class="buton" value="GİRİŞ YAP"/>
            <a class ="geri" href="index.php">ANASAYFA </a>

        </div>


    </form>

    </body>
</html>    
