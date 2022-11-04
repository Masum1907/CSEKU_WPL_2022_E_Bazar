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
     <title>index</title>
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
            
            <li><a href="cart.php"style="color:black;font-weight:bolder;">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <div id="form">
            <form method="grt" action="results.php"enctype="multipart/form-data">
            <input type="text"name="user_query" placeholder="Search product...">
            <button ><input type="submit"name="search"value="search"></button>         </form>
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
                <?php

if(!isset($_SESSION['customer_email'])){

    include("customer_login.php");
 
}


else{
    include("payment.php");
}
?>
              
                </div>


            </div>
           
        </div>

        
        
        <?php include ('footer.php'); ?>



