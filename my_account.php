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

<div class="main_wrapper2">
    
        <div class="header_wrapper">

            <img id="logo"src="images/e-bazar.png" >
          

        </div>

        <div class="menubar">
            
        <ul id="menu" >
        <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">All products</a></li>
            <li><a href="my_account.php"style="color:black;font-weight:bolder;" >My account</a></li>         
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <div id="form">
            <form method="grt" action="results.php"enctype="multipart/form-data">
            <input type="text"name="user_query" placeholder="Search product...">
            <button ><input type="submit"name="search"value="search"></button>         </form>
        </div>
        
 
        </div>
   <?php if(!isset($_SESSION['customer_id'])){ echo "<div class='product_box'><br><h2 style='padding-left:550px;padding-top:150px;height:300px;'>Login first to access your account</h2><br></div>";?>
    <?php } ?>

    <?php if(isset($_SESSION['customer_id'])){  ?>    
            
<div class="content_wrapper">
    
    <div id="sidebar">
        
<?php 
  $run_image = mysqli_query($con,"select * from customers where customer_id='$_SESSION[customer_id]'");
  
  $row_image = mysqli_fetch_array($run_image);
  
  if($row_image['customer_image'] ==''){  
  ?>
  <div class="user_image" align="center">
    <img src="images/profile-icon.png" />
  </div>
  
  
  <?php }else{ ?>
  <div class="user_image" align="center">
    <img src="customer/customer-images/<?php echo $row_image['customer_image']; ?>" style="width=50%";/>
  </div>
  
  
  <?php } ?>
             
<ul id="cats" >


    <li><a href="my_account.php?action=my_order">My Order</a></li>
	<li><a href="my_account.php?action=edit_account">Edit Account</a></li>
	<li><a href="my_account.php?action=edit_profile">Edit Profile</a></li>
	<li><a href="my_account.php?action=user_profile_picture">User Profile Picture</a></li>
	<li><a href="my_account.php?action=change_password">Change Password</a></li>
	<li><a href="my_account.php?action=delete_account">Delete Account</a></li>
	<li><a href="logout.php">Logout</a></li>
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

        

        <?php 
  if(isset($_GET['action'])){
    $action = $_GET['action'];
  }else{
    $action = '';
  }
  
  switch($action){
  
  case "edit_account";
  include('customer/edit_account.php');
  break;
  case "my_order";
  include('customer/my_order.php');
  break;
  case "edit_profile";
  include('customer/edit_profile.php');
  break;
  
  case "user_profile_picture";
  include('customer/user_profile_picture.php');
  break;
  
  case "change_password";
  include('customer/change_password.php');
  break;
  
  case "delete_account";
  include('customer/delete_account.php');
  break;  
  
  default;
  echo "<div id='product_box'><h1 style='padding-top:110px;padding-bottom:110px;'>Manage Your Account  </h1></div>";
  break;
  }
  
  /*if($_GET['action'] == 'edit_account'){
  echo $action;
  }*/
  
  ?>
        
        
        
   


    </div>
   
</div>
<?php } ?>


<?php include ('footer.php'); ?>


</div>
</body>
</html>





















 