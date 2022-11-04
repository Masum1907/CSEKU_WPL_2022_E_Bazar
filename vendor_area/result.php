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
            <li><a href="index.php?order">View Orders</a></li>
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
                    <h2 >Total Users</h4>
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
                    <h2>Total Products</h4>
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
            
      

<div class="view_product_box">

<h2>Your Products</h2><br>
<div class="border_bottom"></div>
<div id="form">
            <form method="grt" action="result.php"enctype="multipart/form-data">
           
            <input type="submit"name="search"value="search">
        
        <select name="color" id="color">
	<option value="">Select search option</option>
	<option value="name">Search by name</option>
	<option value="sale">Search by sale</option>
	<option value="cat">Search by category</option>
</select></form>
        </div>
<form action="" method="post" enctype="multipart/form-data"style="padding-bottom:130px;">



<table width="100%">
 <thead>
  <tr>
   
   <th>SL No.</th>
   <th>Product ID</th>
   <th>Title</th>
   <th>Price</th>
   <th>Image</th>
  <th>Edit</th>
   <th>Delete</th>
   
  </tr>
 </thead>
<?php
if (isset($_GET['search'])){
    $v_id=$_SESSION['vendor_id'];
    $all_products = mysqli_query($con,"select *, sum(qty)
    from products,order_new
    where order_new.pro_id=products.product_id
    group by product_id");
    
    $i = 0;
    
    while($row=mysqli_fetch_array($all_products)){
        
    $pro_id=$row['product_id'];
    $pro_title=$row['product_title'];
    $pro_price=$row['product_price'];
    $pro_img=$row['product_image'];
   $i++;
   
    }
?>

<tr align="center">
   <td><?php echo $i; ?></td>
   <td><?php echo $pro_id ?></td>
   <td><?php echo  $pro_title ?></td>
   <td><?php echo  $pro_price ?></td>
   <td ><img  src="product-images/<?php echo  $pro_img?>" width="70" height="50" /></td>
  
      <td><a href="index.php?edit_pro=<?php echo  $pro_id;?>">Edit</a></td>
   <td><a href="index.php?delete_pro=<?php echo  $pro_id;?>">Delete</a></td>


 

 <?php }?>

</table>

</div>
    </div>
             
            
       
        </div>  
<?php include('footer.php');?>
</body>
 
</html>