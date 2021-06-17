<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8";/>
        <title> Bilgileri Güncelle </title>
        <link rel ="stylesheet"  type="text/css" href="guncelle.css"/>
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
        $sql = "SELECT * FROM uyeler WHERE UyeId=".$_GET['id'];
        $sql2 = "SELECT * FROM adrestbl WHERE AdresId=".$_GET['no'];

        //sorguyu veritabanina gönderme
        $cevap = mysqli_query($baglanti,$sql);
        $cevap2 = mysqli_query($baglanti,$sql2);

        //Eger cevap FALSE ise HATA yazidrma
        if ( (!$cevap) && (!$cevap2) ) {
            echo '<br>Hata:' . mysqli_error($baglanti);
        }

        //veritabanindan gelen cevabi alma
        $gelen=mysqli_fetch_array($cevap);
        $gelen2=mysqli_fetch_array($cevap2);

        $id=(int)$_GET['id'];
        $no=(int)$_GET['no'];

        echo "<html>";
        echo "<form class='arkaplan' action='_gnclkydt.php?id=$id&no=$no'";

        echo " method='POST'>";
        echo "<br> Kullanıcı Adı: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;";
        echo "<input class= 'input' type='text' ";
        echo "name='KullaniciAdi'";
        echo "value=";
        echo $gelen['KullaniciAdi'];
        echo " />";
        echo "<br />";
        echo "Şifre: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
        echo "<input class= 'input' type='text' ";
        echo "name='Sifre'";
        echo "value=";
        echo $gelen['Sifre'];
        echo " />";
        echo "<br />";
        echo "Telefon Numarası: &nbsp;&nbsp";
        echo "<input class= 'input' type='text' ";
        echo "name='UyeTel'";
        echo "value=";
        echo $gelen['UyeTel'];
        echo " />";
        echo "<br />";
        echo "E-Posta: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
        echo "<input class= 'input'  type='text' ";
        echo "name='UyeEposta'";
        echo "value=";
        echo $gelen['UyeEposta'];
        echo " />";
        echo "<br />";
        echo "Ülke: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
        echo "<input class= 'input' type='text' ";
        echo "name='Ulke'";
        echo "value=";
        echo $gelen2['Ulke'];
        echo " />";
        echo "<br />";
        echo "Şehir: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; ";
        echo "<input class= 'input' type='text' ";
        echo "name='Sehir'";
        echo "value=";
        echo $gelen2['Sehir'];
        echo " />";
        echo "<br />";
        echo "Posta Kodu: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
        echo "<input class= 'input'  type='text' ";
        echo "name='PostaKodu'";
        echo "value=";
        echo $gelen2['PostaKodu'];
        echo " />";
        echo "<br />";
        echo "Mahalle: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
        echo "<input class= 'input'  type='text' ";
        echo "name='Mahalle'";
        echo "value=";
        echo $gelen2['Mahalle'];
        echo " />";
        echo "<br />";
        echo "Cadde: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
        echo "<input class= 'input'  type='text' ";
        echo "name='Cadde'";
        echo "value=";
        echo $gelen2['Cadde'];
        echo " />";
        echo "<br />";
        echo "<br />";
        echo "<input class ='btn' type='submit' ";
        echo "value='KAYDET'";
        echo " />";
        echo "<br /> <br /> <a class ='buton' href='menu.php'>İptal </a> ";
        echo "</form>";
        echo "</html>";

       

        ?>
        
    </body>
</html>    

