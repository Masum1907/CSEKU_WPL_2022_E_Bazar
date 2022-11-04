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
     <title>recover password</title>
</head>
<body>

<div class="main_wrapper">
    
        <div class="header_wrapper">

            <img id="logo"src="images/e-bazar.png" >
          

        </div>

        <div class="menubar">
            
        <ul id="menu" >
            <li><a href="index.php" style="color:black;font-weight:bolder;">Home</a></li>
            <li><a href="all_products.php">All products</a></li>
            <li><a href="#">My account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="#">Contact Us</a></li>
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


                    <span style="float:right;font-size:18px;padding:5px;line-height:40px;">
                    <b style="color:black;">Your Cart- </b>  Total Items: <b style="color:black;"><?php total_items(); ?> </b> Total Price: <b style="color:black;"><?php total_price(); ?> </b>  
                   
                    <?php if(!isset($_SESSION['customer_email'])){
                        echo "<a href='checkout.php'>Login</a>";
                    }
                        else {
                            echo "<a href='logout.php'>Logout</a>";}

  
  ?>
<?php if(isset($_SESSION['customer_email'])){
                        echo "<b>Welcome :</b>". $_SESSION['customer_name'];
                    }
                        else {
                            echo "Welcome guest";}

  
  ?>
                  </span>

                </div>

                <div class="product_box">
     
               
         <form method="post" action="" style="padding-top:50px;padding-bottom:50px;"align="center";>
  
            <h2>Recover your password</h2><br>
            Enter Your Email :<br><br>
            <input type="text" name="email"placeholder="email"><br>
            <br>
            <input type="submit" value="SEND" name="submit">   <br><br>         
         </form>
         
         <?php
         if(isset($_POST['submit'])){
          
$email =$_POST['email'];

$run = mysqli_query($con, "select * from customers where customer_email='$email'  " );
$row= mysqli_fetch_array($run);
  $check = mysqli_num_rows($run);
  if($check == 1){

$password=$row['customer_password'];

            $url = "https://script.google.com/macros/s/AKfycbz7c_sdEue4LzoNWdIfL8o3ORbZvDmMJT7ZFXx8m5jJVOvMo9Z1Gd7-vFsNwtn4ZQjJ6w/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $_POST['email'],
                  "subject"   => "Your Password",
                  "body"      => "Your Password is  - ".$password
               ])
            ]);
            $result = curl_exec($ch);
            echo "<script>alert('Password has been sent to your email')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";}
            else{
               echo"<script>alert('At first create an account ')</script>";}
         }
         ?>
      
      
                </div>


            </div>
           
        </div>

        
        
        <?php include ('footer.php'); ?>



        
</div>
</body>
</html>




























