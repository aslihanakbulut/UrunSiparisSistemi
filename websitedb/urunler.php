<?php 
  
    include ("baglanti.php");
     //eger uye girisi yapılmamışsa uye giris sayfasina yönlendir
     if (!isset($_SESSION['KullaniciAdi'])) {
         header("location: uyeGiris.php");
         exit();
     }
    
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['sepetim'][$id])){ 
              
            $_SESSION['sepetim'][$id]['miktar']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM urunler WHERE UrunId={$id}"; 
            $query_s=mysqli_query($baglanti,$sql_s); 
            
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                
                $_SESSION['sepetim'][$row_s['UrunId']]=array( "miktar" => 1,"Fiyat" => $row_s['Fiyat']); 
                
                  
            }else{ 
                  
                $message="Ürün Tanımlı Değil!"; 
                  
            } 
              
        } 
          
    } 
  
?> 
    <h1>ÜRÜNLER</h1> 
    <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
    ?> 
    <table> 
           
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel ="stylesheet"  type="text/css" href="urun.css"/>
    
        <tr> 
            <th>Ürün Adı</th> 
            <th>Fiyat </th> 
            <th></th>
        </tr> 
          
        <?php 
            include ("baglanti.php");
          
            $sql_1="SELECT * FROM urunler ORDER BY UrunId ASC"; 
            $query_1=mysqli_query($baglanti,$sql_1); 
              
            while ($row=mysqli_fetch_array($query_1)) { 
                  
        ?> 
            <tr> 
                <td><?php echo $row['UrunAdi'] ?></td>  
                <td><?php echo $row['Fiyat'] ?>₺</td> 
                <td><a href="siparisSayfasi.php?page=urunler&action=add&id=<?php echo $row['UrunId'] ?>">Sepete Ekle</a></td> 
            </tr> 
            
        <?php 
                  
            } 
          
        ?> 
          
    </table>
    <a class ="btn" href="siparisSayfasi.php?page=sepet"> Sepete Git</a> 