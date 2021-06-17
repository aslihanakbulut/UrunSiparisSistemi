<?php 
   session_start(); 
    include ("baglanti.php");
    //uye girisi yoksa uye giris sayfasın yönlendir
    if (!isset($_SESSION['KullaniciAdi'])) {
        header("location: uyeGiris.php");
         exit();
     }
  
    if(isset($_SESSION['sepetim'])){ 
          //veritabanından verileri çekme 
        $sql_2="SELECT * FROM urunler WHERE UrunId IN ("; 
          
        foreach($_SESSION['sepetim'] as $id => $value) { 
            $sql_2.=$id.","; 
        } 
          
        $sql2=substr($sql_2, 0, -1).") ORDER BY UrunId ASC"; 
        $query3=mysqli_query($baglanti,$sql2); 
        if($query3 != "")
        {
        while($row=mysqli_fetch_array($query3)){ 
              
        ?> 
            <p><?php echo $row['UrunAdi'] ?> x <?php echo $_SESSION['sepetim'][$row['UrunId']]['miktar'] ?></p> 
        <?php 
              
        } 
    }
    ?> 
        <hr /> 
        
    <?php 
          
    }
  
?>

<?php 
    
    include ("baglanti.php");
    if(isset($_GET['page'])){ 
          
        $pages=array("urunler", "sepet"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="urunler"; 
              
        } 
          
    }else{ 
          
        $_page="urunler"; 
          
    } 
  
?> 

<html>
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel ="stylesheet"  type="text/css" href="urun.css"/>
  
    <title>Sipariş Ekle</title> 
  
  
</head> 
  
<body> 
      
    <div id="container"> 
  
        <div id="main"> 
              
            <?php include ($_page.".php"); ?> 
  
        </div>
          
        <div id="sidebar"> 
              
        </div>
       
    </div>
    
    <a class = "btn" href ="uyeOzel.php"> İptal </a>
       
    
  
</body> 
</html>