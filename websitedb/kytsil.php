<html>
    <head>
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

    .btn{
        color:white;
        text-decoration: none;
        
    }
    .btn:hover{
        color:rgb(127, 144, 180);
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
            //admin girisi yoksa admin giris sayfasına yönlendir
            if (!isset($_SESSION['username'])) {
                header("location: adminGiris.php");
                exit();
            }
            //mysql baglanti kodunu ekliyoruz
            include("baglanti.php");

            //sorguyu yaziyoruz
            $sql = " SELECT uyeler.UyeId, uyeler.KullaniciAdi,uyeler.UyeTel, uyeler.UyeEposta, adrestbl.AdresId, adrestbl.Ulke, adrestbl.Sehir, adrestbl.PostaKodu, adrestbl.Mahalle, adrestbl.Cadde 
            FROM ((uyeler
            INNER JOIN uye_adres ON uyeler.UyeId = uye_adres.uye_adres_uyeNo)
            INNER JOIN adrestbl ON uyeler.UyeId = adrestbl.AdresId)";

            //sorguyu veritabanina gonderme
            $cevap = mysqli_query($baglanti,$sql);

            // eger cevap FAlSE ise HATA yazdiriyoruz
            if (!$cevap) {
                echo '<br>Hata:' . mysqli_error($baglanti);
            }

            //sorgudan gelen tüm kayitlari tablo icinde yazdirma
            // tablo basliklari olusturma

            echo "<html>";
            //Türkçe karakter destegi ayari
            echo "<meta http-equiv='Content-Type' "; 
            echo "content='text/html; charset=UTF-8'/>";

            echo "<table border=1 id='table'>";
            echo "<tr>";
            echo "<th>Uye No</th>";
            echo "<th>Kullanıcı Adı</th>";
            echo "<th>Uye Telefon Numarası</th>";
            echo "<th>Uye E-posta</th>";
            echo "<th>Uye AdresNo</th>";
            echo "<th> Ulke </th>";
            echo "<th> Sehir </th>";
            echo "<th>PostaKodu</th>";
            echo "<th>Cadde</th>";
            echo "<th>Mahalle</th>";
            echo "</tr>";

            while($gelen=mysqli_fetch_array($cevap)){
                // veritabanindan gelen değerler ile tablo satirlari olusturalim
                echo "<tr><td>".$gelen['UyeId']." </td>";
                echo "<td>".$gelen['KullaniciAdi']."</td>";
                echo "<td>".$gelen['UyeTel']."</td>";
                echo "<td>".$gelen['UyeEposta']."</td>";
                echo "<td>".$gelen['AdresId']."</td>";
                echo "<td>".$gelen['Ulke']."</td>";
                echo "<td>".$gelen['Sehir']."</td>";
                echo "<td>".$gelen['PostaKodu']."</td>";
                echo "<td>".$gelen['Cadde']."</td>";
                echo "<td>".$gelen['Mahalle']."</td>";
                // sil linki olusturma
                echo "<td><a class='btn' href=UyeSil.php?id=";
                echo $gelen['UyeId'];
                echo "&no=";
                echo $gelen['AdresId'];
                echo "> SİL </a></td></tr>";
            }
            //tablo kodunu bitirme
            echo "</table>";
            echo "<br/><a class='button' href='menu.php'>Geri Dön </a>";
            echo "</html>";

            //veritabani baglantisini kapama
            mysqli_close($baglanti);
            ?>