<?php 
   //oturumu başlat 
   
   session_start(); 
   
   if ( !isset($_SESSION['KullaniciAdi']) ) { 
   
     header("Location: uyeGiris.php"); 
     exit(); 
    } 
    include("baglanti.php");
   
   ?> 
   

<html>
    <head>
    <meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="uyeOzel.css"> 
    </head>
   
   <body>

     <ul>
         <li><a href ="siparisSayfasi.php"> Sipariş Oluştur </a></li>
         <li style="float:right"><a href='cikis.php'>Oturumu Kapat</a> </li>
     </ul>

     <table border:1 id="table">
                
     <tr>
      <td align="center"> <a href="resim/Atatürk.png" target="_blank"><img src="resim/Atatürk.png"  width="200"  height="220" border="0"></a></td>
         <td align="center"> <a href="resim/tlfnstand.png" target="_blank"><img src="resim/tlfnstand.png"  width="240"  height="220" border="0"></a></td>
         <td align="center"> <a href="resim/HPAnhtr.png" target="_blank"><img src="resim/HPAnhtr.png" width="200"  height="220" border="0"></a> </td>
      </tr>
      <tr>
         <th> M. Kemal Atatürk Biblo </th>
         <th>Ayarlanabilir Telefon Standı </th>
         <th> Harry Potter Anahtarlık</th>
      </tr>

      <tr>
         <td align="center"> <a href="resim/kameraprt.png" target="_blank"><img src="resim/kameraprt.png"  width="200"  height="220" border="0"></a> </td>
         <td align="center"> <a href="resim/kalemliktlf.png" target="_blank"><img src="resim/kalemliktlf.png"  width="200"  height="220" border="0"></a></td>
         <td align="center"> <a href="resim/kablotutucu.png" target="_blank"><img src="resim/kablotutucu.png"  width="200"  height="220" border="0"> </a> </td>
         
      </tr>
      <tr>
         <th> Aksiyon Kamera Aparatı </th>
         <th>Telefon Standlı Kalemlik</th>
         <th> USB Kablo Tutucu </th> 
       
      </tr>
      <tr>
      <td align="center"> <a href="resim/appleKlm.jpeg" target="_blank"><img src="resim/appleKlm2.jpeg"  width="200"  height="170" border="0"> </a> </td>
         <td align="center"> <a href="resim/isimlianhtrlk.jpeg" target="_blank"><img src="resim/isimlianhtrlk.jpeg"  width="240"  height="170" border="0"> </a> </td>
         <td align="center"> <a href="resim/usbkoruyucu.png" target="_blank"><img src="resim/usbkoruyucu.png"  width="240"  height="170" border="0"> </a> </td>
      
      </tr>
      <tr>
        <th> Apple 1.Nesil Kalem Kutusu</th>
         <th>İsme Özel Anahtarlık </th>
        <th> USB Kablo Koruyucu</th>
      </tr>

   

     </table>


           
                


   </body>
  
</html>