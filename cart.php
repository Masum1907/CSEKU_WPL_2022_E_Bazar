<!DOCTYPE html>

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

                <div id="cart_table">

                <form action="cart.php" method="post" enctype="multipart/form-data"style="padding-bottom:150px;padding-top:40px;">  
                    <table  width="100%"bgcolor="white"style="padding-top:10px;">
                 
                        <tr align="center">
                            <th>Remove</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Qty</th>
                            
                            <th>Unit Price (BDT)</th>

<?php
     $total=0;
     global $con;
    $ip=getIp();
    
    
    $run_cart=mysqli_query($con,"select * from cart where ip_add='$ip'");

while($fetch_cart=mysqli_fetch_array($run_cart)){

    $pro_id=$fetch_cart['p_id'];

    $result_pro=mysqli_query($con,"select * from products where product_id='$pro_id'");
    while($fetch_product=mysqli_fetch_array($result_pro)){
        $product_price=array($fetch_product['product_price']);
        $product_title=$fetch_product['product_title'];
        $product_image=$fetch_product['product_image'];
        $single_price=$fetch_product['product_price'];
        $values=array_sum($product_price);
//getting quantity

        $run_qty= mysqli_query($con,"select * from cart where p_id='$pro_id'");
        $row_qty=mysqli_fetch_array($run_qty);
        $qty=$row_qty['qty'];
        $values_qty=$values *$qty;
        $total+=$values_qty;
   
 ?>



                    <tr align="center">
                    
                        <td><input type="checkbox"name="remove[]"value="<?php echo $pro_id;?>"/></td>
                        <td> <img src="admin_area/product_images/<?php echo $product_image; ?>"width="60"height="60"/>
                        </td>
                        <td><?php echo $product_title; ?>
                    </td>
                    
                     <td><input type="number"size="4"name="qty_name"value="<?php echo $qty; ?>">
                     <input type="hidden" name="update_quantity_id"  value="<?php echo $pro_id; ?>" >
                     </td>  <td><?php echo $single_price." tk ";?></td>
                    </tr>
                  <?php  }  }  ?>
                    
                    <tr align="right">
                        <td colspan="3" style="text-align:right;"><b>Total Price:</b></td>
                        <td ><b><?php echo $total ." tk";?></b></td>
                    </tr>
                    

                    <tr align="center" >
                        <td ><input type="submit"name="update_cart"value="Update Cart"></td>
                        <td ><input type="submit"name="update_qty"value="Update Qty"></td>
                        
                        <td> <input type="submit" name="continue" value="Continue Shopping"></td>
                        <td colspan="2"><button><a href="checkout.php?price=<?php echo $total ?>"style="text-decoration:none;color:black;">Checkout</a></button></td>
                    </tr>
                    </table>
                  

                </form>
<?php

    global $con;
    $ip=getIp();

    if(isset($_POST['update_cart'])){
        if($_POST['remove']){
        foreach($_POST['remove'] as $remove_id){

        $delete_product = "DELETE FROM `cart` WHERE `p_id`='$remove_id' AND `ip_add`='$ip'";
        $run_delete = mysqli_query($con, $delete_product);

        if($run_delete){

            echo "<script>window.open('cart.php','_self')</script>";
        }
        }
    }
    else {echo "<script>window.open('cart.php','_self')</script>";}
    }
    
    if(isset($_POST['update_qty'])){
        $update_value = $_POST['qty_name'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($con, "UPDATE cart SET qty = '$update_value' WHERE p_id = '$update_id'");
        if($update_quantity_query){
            echo "<script>window.open('cart.php','_self')</script>";
        }
     }
    
    
    
    if(isset($_POST['continue'])){

        echo "<script>window.open('index.php','_self')</script>";
    }



?>

                </div>


            </div>
           
        </div>

        <?php include('footer.php');?>

        
