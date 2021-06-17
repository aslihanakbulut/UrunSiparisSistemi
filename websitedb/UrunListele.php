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
        padding:10px;
        margin-top: 10px;
    }

        #table{
            margin:auto;
            margin-top:50px;
            border-collapse: collapse;
            width: 60%;
            
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
            background-color: rgb(127, 144, 180); 
            color:#100835;
            font-weight:bold;
        
        }
        </style>

    </head>
      
    <body>
        <?php
            // oturumu baslat
            session_start();
            //eger admin giri yapılmamışsa admin giris sayfasina yönlendir
            if (!isset($_SESSION['username'])) {
                header("location: adminGiris.php");
                exit();
            }
            include("baglanti.php");
            ?>
                <?php 
                    if(isset($message)){ 
                        echo "<h2>$message</h2>"; 
                    } 
                ?> 
                <table id="table" border:1px> 
                    <tr> 
                        <th>Ürün adı</th>  
                        <th>Fiyat</th> 
                        
                    </tr> 
                    
                    <?php 
                    
                        $sql2="SELECT * FROM urunler ORDER BY UrunId ASC"; 
                        $cevap2=mysqli_query($baglanti,$sql2); 
                        
                        while ($row2=mysqli_fetch_array($cevap2)) { 
                            
                    ?> 
                        <tr> 
                            <td><?php echo $row2['UrunAdi'] ?></td> 
                            <td><?php echo $row2['Fiyat'] ?> ₺</td> 
                            
                        </tr> 
                    <?php 
                            
                        } 
                    
                    ?> 
                    
                </table>

                <a class="btn" href= "menu.php"> Geri Dön </a>

    </body>  
    
    </html>
