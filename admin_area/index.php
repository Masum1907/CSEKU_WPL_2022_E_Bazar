
<?php 

 session_start(); 

 if(!isset( $_SESSION['admin_id'] )){
    echo "<script>window.open('login.php?not_admin=You are not an Admin!!','_self')</script>";
 }
else{

?>
<!DOCTYPE html>
<?php  include("includes/db.php"); ?>
<html >
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="styles/style.css"></link>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css   "/>

    <title>admin area</title>

</head>
<body>
    
<div class="content-wrapper">
               
<div class="header_wrapper"style="padding-bottom:30px">

<h1 >Admin Dashboard</h>
<hr>
</div>
<div id="sidebar"style="padding-top:30px">
                <div id="slidebar_title">
                <a href="index.php?dashboard" style="text-decoration:underline;color:black;">Dashboard</a> 
                </div>
                     
        <ul id="cats" >
  
       
            <li><a href="index.php?view_products">View Products</a></li>
              <li><a href="index.php?view_cats">View Category</a></li>
            <li><a href="index.php?order">View Orders</a></li>
            <li><a href="index.php?insert_category">Add Category</a></li>
           
   
    
            
       
        </ul>
          
                <div id="slidebar_title">
                Manage User
                </div>
                     
        <ul id="cats" >
  
       
            <li><a href="index.php?view_customer">View Customers</a></li>
            <li><a href="index.php?view_vendor">View Vendors</a></li>
        
            <li><a href="logout.php">Logout</a></li>
            
       
        </ul>
            </div>
            <div id="content_area">
                
                <div id="shopping_cart">


                    <span style="float:right;font-size:20px;padding:5px;line-height:40px;">
                  <b style="padding-right:15px;padding-left:15px;color:red;"> 
<?php if(isset($_SESSION['admin_id'])){
                        echo "<b style='color:black;'>Welcome : </b>". $_SESSION['user_name'];
                    }
                    else{    echo "<script>window.open('login.php','_self')</script>";
                    }
                        
  
  ?>
</b>
  


  </span>

                </div>
             <?php   if(isset($_GET['dashboard'])){ include("dashboard.php");}?>
   
    <div id="right">
        <div class="right-custom">
<?php

if(isset($_GET['insert_product'])){

    include("insert_product.php");
}
if(isset($_GET['view_customer'])){

    include("view_customer.php");
}
if(isset($_GET['view_vendor'])){

    include("view_vendor.php");
}
if(isset($_GET['insert_category'])){

    include("insert_category.php");
}
if(isset($_GET['view_products'])){

    include("view_products.php");
}
if(isset($_GET['edit_pro'])){

    include("edit_product.php");
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
if(isset($_GET['logout'])){

    include("logout.php");
}
if(isset($_GET['c_detail'])){

    include("c_detail.php");
}
if(isset($_GET['c_delete'])){

    include("c_delete.php");
}
if(isset($_GET['v_detail'])){

    include("v_detail.php");
}
if(isset($_GET['v_delete'])){

    include("v_delete.php");
}
if(isset($_GET['order'])){

    include("order.php");
}
?>
</div>
    </div>


    
</div>

</body>
</html>

<?php }?>