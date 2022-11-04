<!DOCTYPE html>

<html lang="en">
<?php 
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
        <li><a href="index.php"style="color:black;font-weight:bolder;" >Home</a></li>
            <li><a href="all_products.php">All products</a></li>
            <li><a href="my_account.php">My account</a></li>         
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <div id="form">
            <form method="get" action="results.php"enctype="multipart/form-data">
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
                        echo "<b>Welcome :</b>". $_SESSION['customer_name'];
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
if (isset($_GET['search'])){
    
$search_query=$_GET['user_query'];
$get_pro="select * from products where product_keywords like '%$search_query%' ";
$get_vendor="select vendor_id from vendors where vendor_name like'%$search_query%' ";
$get_shop="select * from vendors where shop_name like'%$search_query%' ";


$run_v=mysqli_query($con,$get_vendor);

while($row_vendor=mysqli_fetch_array($run_v)){
    $id=$row_vendor['vendor_id'];
}

$run_s=mysqli_query($con,$get_shop);

while($row_vendor=mysqli_fetch_array($run_s)){
    $id=$row_vendor['vendor_id'];
}
$get_pro="select * from products where vendor_id='$id' ";

$run_pro=mysqli_query($con,$get_pro);
$count_cats=mysqli_num_rows($run_pro);

if($count_cats==0){
    echo "<h2 style='padding-top:190px;padding-bottom:190px;text-align:center;'>There is no product by this search</h2>";
 
}

while($row_pro=mysqli_fetch_array($run_pro) ){


    $pro_id=$row_pro['product_id'];
    $pro_cat=$row_pro['product_cat'];
    $pro_title=$row_pro['product_title'];
    $pro_price=$row_pro['product_price'];
    $pro_desc=$row_pro['product_desc'];
    $pro_image=$row_pro['product_image'];

    echo "
    
<div id='single_product'>
<h3>$pro_title</h3></br>
<img src='admin_area/product_images/$pro_image'width='180'height='180'>

<p></br><b>Tk- $pro_price</b></p></br>
<a href='details.php?pro_id=$pro_id'style='float:left;color:white;'>Details</a>
<a href='index.php?pro_id=$pro_id'><button style='float:right;color:black;'>Add to Cart</button></a>

</div>
    
    ";
}
}
?>
                </div>
            </div>     
        </div>
    
    <?php  include('footer.php');?>
        
</div>
</body>
</html>