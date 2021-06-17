<?php 
    
    include ("baglanti.php");
    
     //eger uye girisi yapılmamışsa uye giris sayfasina yönlendir
     if (!isset($_SESSION['KullaniciAdi'])) {
         header("location: uyeGiris.php");
         exit();
     }

  if(isset($_POST['submit'])){ 
        
      foreach($_POST['miktar'] as $key => $val) { 
          if($val==0) { 
              unset($_SESSION['sepetim'][$key]); 
          }else{ 
              $_SESSION['sepetim'][$key]['miktar']=$val; 
          } 
      } 
        
  } 

?> 

<h1>SEPETİM</h1> 


    <link rel ="stylesheet"  type="text/css" href="urun.css"/>
    <form method="POST" action="siparisSayfasi.php?page=sepet"> 

  <table> 
      <tr> 
          <th>Ürün Adı</th> 
          <th>Miktar</th> 
          <th>Fiyat</th> 
          <th>Ürün Toplamı</th> 
      </tr> 
        
      <?php 
        //urunleri veritabanından alma
          $sql="SELECT * FROM urunler WHERE UrunId IN ("; 
                foreach($_SESSION['sepetim'] as $id => $value) { 
                    $sql.=$id.","; 
                 } 
          
                $sql=substr($sql, 0, -1).") ORDER BY Urunİd ASC"; 
                 $cevap2=mysqli_query($baglanti,$sql); 
                 $totalprice=0; 
                 //urun miktari 0 dan fazla ise toplam fiyati hesapla
                  while($row= mysqli_fetch_array($cevap2)){
                     if($_SESSION['sepetim'][$row['UrunId']]['miktar'] > 0)
                     {
                        
                      $subtotal=(float)($_SESSION['sepetim'][$row['UrunId']]['miktar'])*(float)$row['Fiyat']; 
                      $totalprice+=$subtotal; 
                  ?> 
                      <tr> <!--urun adi,fiyati ,miktari ve ürün toplamını yazdırma -->
                          <td><?php echo $row['UrunAdi'] ?></td> 
                          <td><input type="text" name="miktar[<?php echo $row['UrunId'] ?>]" size="5" value="<?php echo $_SESSION['sepetim'][$row['UrunId']]['miktar'] ?>" /></td> 
                          <td><?php echo $row['Fiyat'] ?>₺</td> 
                          <td><?php echo $_SESSION['sepetim'][$row['UrunId']]['miktar']*$row['Fiyat'] ?>₺</td> 
                      </tr> 
                  <?php 
                       }else{
                           unset($_SESSION['sepetim'][$row['UrunId']]);
                       }
                  } 
                  if($totalprice>0){
      ?> 
                  <tr> <!-- sepet toplamını yazdırma-->
                      <td colspan="4">Toplam: <?php echo $totalprice ?>₺</td> 
                  </tr> 
                  <?php
                  }else{
                      echo "Sepetiniz boş";
                  }
                  ?>
        
  </table> 
  <br />
  <a class = "buton "href="siparisSayfasi.php?page=urunler">Ürün Sayfasına Dön</a>  <br /><br />
  <button class="btn" type="submit" name="submit">Sepeti Güncelle</button> <br /> <br />
  <a href="siparistamamla.php" class="btn">Siparişi Tamamla</a> 
  <br /> 
</form> 
<br /> 
<p>Ürünü Silmek için miktarını 0 yapınız. </p>