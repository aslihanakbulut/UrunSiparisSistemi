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
            //admin girisi yoksa admin giris sayfasına yonlendir
            if (!isset($_SESSION['username'])) {
                header("location:adminGiris.php");
                exit();
            }
            //mysql baglanti kodunu ekliyoruz
            include("baglanti.php");

            //sorguyu yaziyoruz
            $sql = " SELECT urunler.UrunId, Urunler.UrunAdi,urunler.Fiyat FROM urunler ";

            //sorguyu veritabanina gonderme
            $cevap = mysqli_query($baglanti,$sql);

            // eger cevap FAlSE ise HATA yazdiriyoruz
            if (!$cevap) {
                echo '<br>Hata:' . mysqli_error($baglanti);
            }

            //sorgudan gelen tüm kayitlari tablo icinde yazdirma
            // tablo basliklari olusturma

            echo "<html>";
            //türkçe karakter destegi ayari
            echo "<meta http-equiv='Content-Type' "; 
            echo "content='text/html; charset=UTF-8'/>";

            echo "<table border=1px id ='table'>";
            echo "<tr>";
            echo "<th>Ürün No</th>";
            echo "<th>Ürün Adı</th>";
            echo "<th>Fiyat </th>";

            echo "</tr>";

            while($gelen=mysqli_fetch_array($cevap)){
                // veritabanindan gelen değerler ile tablo satirlari olusturalim
                echo "<tr><td>".$gelen['UrunId']." </td>";
                echo "<td>".$gelen['UrunAdi']."</td>";
                echo "<td>".$gelen['Fiyat']." ₺"."</td>";
            
                // Guncellestirme
                echo "<td><a class = 'btn' href=UrunGuncelle.php?u_id=";
                echo $gelen['UrunId'];
                echo ">Güncelle</a></td></tr>";
            }
            //tablo kodunu bitirme
            echo "</table>";
            echo "<br/><a class='button' href='menu.php'>Geri Dön </a>";
            echo "</html>";

            //veritabani baglantisini kapama
            mysqli_close($baglanti);
        ?>
    </body>
</html>