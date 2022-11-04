<!DOCTYPE html>

<html lang="en">
<?php 
session_start();
include("functions/functions.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style6.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css   "/>
     <title>contact</title>
</head>
<body>

<div class="main_wrapper">
    
        <div class="header_wrapper">

            <img id="logo"src="images/e-bazar.png" >
          

        </div>

        <div class="menubar">
            
        <ul id="menu" >
            <li><a href="index.php" >Home</a></li>
            <li><a href="all_products.php">All products</a></li>
            <li><a href="my_account.php">My account</a></li>
            
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php"style="color:black;font-weight:bolder;">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <div id="form">
            <form method="grt" action="results.php"enctype="multipart/form-data">
            <input type="text"name="user_query" placeholder="Search product...">
            <input type="submit"name="search"value="search">
        </form>
        </div>
        </div>



        <div class="content_wrapper">
            
            <div id="sidebar">
                <div id="slidebar_title">
                    Categories
                </div>
                     
        <ul id="cats" >
  
        <?php getCats(); ?>
       
       
        </ul>
            </div>
            <div id="content_area">
                <?php cart(); ?>
                <div id="shopping_cart">

                <span style="float:right;font-size:20px;padding:5px;line-height:40px;">
                    <b style="color:black;padding-right:25px;">Your Cart-</b><b style="padding-right:15px;">   Total Items:</b><b style="color:black;"><?php total_items(); ?> </b>     <b style="padding-right:15px;">     Total Price:</b><b style="color:black;"><?php total_price(); ?> </b>  
                  <b style="padding-right:15px;padding-left:15px;"> 
<?php if(isset($_SESSION['customer_email'])){
                        echo "<b>Welcome : </b><b style='color:black;'>". $_SESSION['customer_name']."</b>";
                    }
                        else {
                            echo "Welcome guest";}

  
  ?>
</b>
  
                    <b style="padding-right:15px;"> 
                    <?php if(!isset($_SESSION['customer_email'])){
                        echo "<a href='checkout.php'>Login Now</a>";
                    }
                        else {
                            echo "<a href='logout.php'>Logout</a>";}

  
  ?></b>
  


  </span>

                </div>

                <div class="product_box">
                <div style="padding-top: 40px;
    padding-left:220px;">
                <form method="post" action=""style="font-size:20px;padding-bottom:60px;">
            <br>
            Enter your mail :<br>
            <input size="30"type="text" name="email" required><br>
            <br> Subject :<br>
            <input size="30"type="text" name="subject" required><br>
            <br> Body :<br>
            <textarea  rows="4" cols="50"name="body" required></textarea><br>
            <br><input type="submit" value="SEND" name="submit">            
         </form>
         <?php
         if(isset($_POST['submit'])){
            $url = "https://script.google.com/macros/s/AKfycbz7c_sdEue4LzoNWdIfL8o3ORbZvDmMJT7ZFXx8m5jJVOvMo9Z1Gd7-vFsNwtn4ZQjJ6w/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => "wplebazar@gmail.com",
                  "subject"   => $_POST['subject'],
                  "body"      => "from: ".$_POST['email']."\n\nMessage -".$_POST['body']
               ])
            ]);
            $result = curl_exec($ch);
            echo "Password has been sent to your email ";
            echo "<script>window.open('index.php?customer_login','_self')</script>";
         }
         ?>
   
              
                </div>
                </div>


            </div>
           
        </div>

        
        
        <?php include ('footer.php'); ?>



        
</div>
</body>
</html>
        