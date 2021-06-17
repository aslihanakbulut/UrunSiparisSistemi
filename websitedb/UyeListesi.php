<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8";/>
        <title> Üye Bİlgileri </title>
    <style>
       body{
        background-color: rgb(127, 144, 180);
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
       
    }


        .button{
            text-decoration: none;
            color:#100835;
            margin-left:150px;
            font-weight: bold;
            font-size: 18px; 
            
    }

        #table{
            margin:auto;
            margin-top:50px;
            border-collapse: collapse;
            width: 80%;
            
    }
        #table td, #table th{
            border: 1px solid black;
            padding: 8px;
            font-weight:bold;
        

    }
        #table tr{ 
            background-color:#100835;
            color:white;
    }


        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(127, 144, 180); ;
            color:#100835;
            font-weight:bold;
        
        }
   </style> 


    </head>   
    
    <body>
            <?php
        // oturumu baslat
        session_start();
        //eger admin girisi yoksa admin giris sayfasina yönlendir
        if (!isset($_SESSION['username'])) {
            header("location: adminGiris.php");
            exit();
        }
  
        include("baglanti.php");

        $sql = " SELECT uyeler.UyeId, uyeler.KullaniciAdi,uyeler.UyeTel, uyeler.UyeEposta, adrestbl.AdresId, adrestbl.Ulke, adrestbl.Sehir, adrestbl.PostaKodu, adrestbl.Mahalle, adrestbl.Cadde 
        FROM ((uyeler
        INNER JOIN uye_adres ON uyeler.UyeId = uye_adres.uye_adres_uyeNo)
        INNER JOIN adrestbl ON uyeler.UyeId = adrestbl.AdresId)";

        $cevap = mysqli_query($baglanti,$sql);

        if (!$cevap) {
            echo '<br>Hata:' . mysqli_error($baglanti);
        }

        echo "<html>";

        echo "<meta http-equiv='Content-Type' "; 
        echo "content='text/html; charset=UTF-8'/>";

        echo "<table border =1px id='table'>";
        echo "<tr >";
        echo "<th>Üye No</th>";
        echo "<th>Kullanıcı Adı</th>";
        echo "<th>Üye Telefon Numarası</th>";
        echo "<th>Üye E-posta</th>";
        echo "<th>Üye Adres No</th>";
        echo "<th> Ülke </th>";
        echo "<th> Şehir </th>";
        echo "<th>PostaKodu</th>";
        echo "<th>Mahalle</th>";
        echo "<th>Cadde</th>";
        echo "</tr>";

        while($gelen=mysqli_fetch_array($cevap)){
            echo "<tr><td >".$gelen['UyeId']." </td>";
            echo "<td >".$gelen['KullaniciAdi']."</td>";
            echo "<td >".$gelen['UyeTel']."</td>";
            echo "<td >".$gelen['UyeEposta']."</td>";
            echo "<td >".$gelen['AdresId']."</td>";
            echo "<td >".$gelen['Ulke']."</td>";
            echo "<td >".$gelen['Sehir']."</td>";
            echo "<td >".$gelen['PostaKodu']."</td>";
            echo "<td >".$gelen['Mahalle']."</td>";
            echo "<td >".$gelen['Cadde']."</td></tr>";
        }
        echo "</table>";
        echo "<br/><a href='menu.php' class='button'>Geri Dön </a>";
        echo "</html>";

        //veritabani baglantisini kapama
        mysqli_close($baglanti);
        ?>

    </body>    
</html>    
