<!DOCTYPE html>
<html>
<head>
  <title>dashboard</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="styles/style.css"></link>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css   "/>

  </head>
</head>
<body >
<?php 
session_start();
include("includes/db.php");
?>

<div class="content_wrapper">
            
<div class="header_wrapper"style="padding-bottom:30px">

<h1 >Vendor Dashboard</h>
<hr>
</div>

<div id="sidebar"style="padding-top:30px">
                <div id="slidebar_title">
                Dashboard
                </div>
                     
        <ul id="cats" >
  
       
            <li><a href="index.php?view_products">All Products</a></li>
            <li><a href="index.php?insert_product">Insert New Product</a></li>
            <li><a href="index.php?view_orders">Pending Orders</a></li>
            <li><a href="index.php?view_del">Deliverd Orders</a></li>
            <li><a href="index.php?view_cats">VIew Category</a></li>
           
            
       
        </ul>
          
                <div id="slidebar_title">
                Manage Account
                </div>
                     
        <ul id="cats" >
  
       
            <li><a href="index.php?edit_account">Edit Account</a></li>
            <li><a href="index.php?edit_profile">Edit Profile</a></li>
            <li><a href="index.php?change_password">Change Password</a></li>
            <li><a href="index.php?delete_account">Delete Account</a></li>
            <li><a href="logout.php">Logout</a></li>
            
       
        </ul>
            </div>
            <div id="content_area">
                
                <div id="shopping_cart">


                    <span style="float:right;font-size:20px;padding:5px;line-height:40px;">
                  <b style="padding-right:15px;padding-left:15px;color:red;"> 
<?php if(isset($_SESSION['vendor_id'])){
                        echo "<b style='color:black;'>Welcome : </b>". $_SESSION['vendor_name'];
                    }
                    else{    echo "<script>window.open('login.php','_self')</script>";
                    }
                        
  
  ?>
</b>
  


  </span>

                </div>
    <div class="product_box">
            <div class="cards">
                <div class="card">
                    <i class="fa fa-users" style="font-size: 70px;padding:10px;"></i>
                    <h2 >Total Customers</h4>
                    <h1 style="color:red;">
                    <?php
                        $sql="SELECT * from customers ";
                        $result=$con-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                
            </div>
            
                <div class="card">
                    <i class="fa fa-th-large" style="font-size: 70px;padding:10px;"></i>
                    <h2>Total Categories</h4>
                    <h1 style="color:red;">
                    <?php
                       
                       $sql="SELECT * from categories";
                       $result=$con-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
            
            </div>
            
            <div class="card">
                    <i class="fa fa-th" style="font-size: 70px;padding:10px;"></i>
                    <h2>Your Products</h4>
                    <h1 style="color:red;">
                    <?php
                       $id=$_SESSION['vendor_id'];
                       $sql="SELECT * from products where vendor_id='$id'";
                       $result=$con-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                
            </div>
            
        </div>
        
  
        </div>  
            <div id="right">
        <div class="right-custom">
<?php
if(isset($_GET['view_products'])){
    
    include("view_products.php");
}
if(isset($_GET['insert_product'])){
    
    include("insert_product.php");
}



if(isset($_GET['edit_pro'])){

    include("edit_product.php");
}

if(isset($_GET['details'])){

    include("details.php");
}
if(isset($_GET['detail1'])){

    include("detail1.php");
}
if(isset($_GET['delete_pro'])){

    include("delete_pro.php");
}
if(isset($_GET['delete_cat'])){

    include("delete_cat.php");
}
if(isset($_GET['edit_cat'])){

    include("edit_cat.php");
}
if(isset($_GET['view_cats'])){

    include("view_cats.php");
}
if(isset($_GET['view_orders'])){

    include("view_orders.php");
}
if(isset($_GET['view_del'])){

    include("delivared_order.php");
}
if(isset($_GET['logout'])){

    include("logout.php");
}


if(isset($_GET['delete_account'])){

    include("delete_account.php");
}
if(isset($_GET['change_password'])){

    include("change_password.php");
}
if(isset($_GET['edit_account'])){

    include("edit_account.php");
}
if(isset($_GET['edit_profile'])){

    include("edit_profile.php");
}
?>

</div>
    </div>
             
            
       
        </div>  
<?php include('footer.php');?>
</body>
 
</html>