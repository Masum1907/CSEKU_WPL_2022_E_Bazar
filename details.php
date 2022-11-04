<!DOCTYPE html>

<html lang="en">
<?php 
include("functions/functions.php");
session_start();
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
            <li><a href="all_products.php"style="color:black;font-weight:bolder;">All products</a></li>
            <li><a href="my_account.php">My account</a></li>         
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
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
        <!-- <li><a href="p-j.html">Fashion & Beauty</a></li>
            <li><a href="#">Smart Gadget</a></li>
            <li><a href="#">Babies & Toys</a></li>
            <li><a href="#">Sports & Outdoor</a></li>
            <li><a href="#">Groceries & Pets</a></li>
            <li><a href="#">Men's Fashion</a></li>
            <li><a href="#">Jewellery</a></li>
            <li><a href="#">Fashion & Beauty</a></li>
            <li><a href="#">Electronic Accessories</a></li> -->
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

if(isset($_GET['pro_id'])){

$product_id=$_GET['pro_id'];


$get_pro="select * from products where product_id='$product_id'";
$run_pro=mysqli_query($con,$get_pro);
$get_comment="select * from comments where pro_id='$product_id'";
$run_comment=mysqli_query($con,$get_comment);

while($row_pro=mysqli_fetch_array($run_pro)){



    $pro_id=$row_pro['product_id'];
   
    $pro_title=$row_pro['product_title'];
    $pro_price=$row_pro['product_price'];
   
    $pro_image=$row_pro['product_image'];

    $pro_desc=$row_pro['product_desc'];
    $vendor=$row_pro['vendor_id'];
    $get_vendor="select * from vendors where vendor_id='$vendor'";
$run=mysqli_query($con,$get_vendor);

while($row_pro=mysqli_fetch_array($run)){
    $vendor_name=$row_pro['vendor_name'];
    $shop_name=$row_pro['shop_name'];

}
    echo "
<div class='main-content'>

<div id='details_product'>
<h3>$pro_title</h3></br>
<img src='admin_area/product_images/$pro_image'width='400'height='300'>

<p></br><b>Price Tk- $pro_price</b></p></br>


<a href='index.php'style='float:left;color:white;'>Go Back</a>
<a href='index.php?add_cart=$pro_id'><button style='float:right;color:black;'>Add to Cart</button></a>

</div>

<div id='details_product_desc'>
<p></br><b>Vendor Name- $vendor_name</b></p></br>
<p></br><b>Shop Name- $shop_name</b></p></br>
<p></br><b>Description-</b></p></br>
<p>$pro_desc</p>
</div>
</div>
   








";

}


}
?>



<h2 style="margin-left:45px;padding-top:60px;">Comments</h2><br />

<?php
while($row=mysqli_fetch_array($run_comment)){



    $pro_id=$row['pro_id'];
   
    $comment=$row['comment'];
    $name=$row['customer_name'];
echo "<div style='padding-left:60px;'>


<p></br><b> $name</b></p>
<p style='padding-left:10px;'></br> $comment</p></br>


</div>
";

}

?>
<form method = "post" action="" enctype="multipart/form-data"style="padding-left:0px;padding-top:50px;padding-bottom:50px;">

    <table  width="200"border="5" style="border-collapse: collapse;">
    
     
    <textarea style="display:block;margin-left:45px;" rows="3"cols="83"name="comment" placeholder="Enter your comment here..."></textarea>
    <input style="margin-top:10px;align:center;margin-left:45px; height:40px;width:80px;"type="submit"name="comment_post" value="Post">

</table>
</form>




                </div>


            </div>
           
        </div>

      <?php include('footer.php');?>

   

<?php
if(isset($_POST['comment_post'])){
if(isset($_SESSION['customer_id'])){
    $comment=$_POST['comment'];
    $pro_id=$_GET['pro_id'];
    $name=$_SESSION['customer_name'];
   
    $run_insert = mysqli_query($con,"insert into comments values('$pro_id','$comment','$name')");
    if($run_insert){
        echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";
    }
}
else{
    echo "<script>alert('Login first ')</script>";

}
}
?>
