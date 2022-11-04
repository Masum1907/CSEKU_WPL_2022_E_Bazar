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
		<li><a href="index.php"style="color:black;font-weight:bolder;" >Home</a></li>
            <li><a href="all_products.php">All products</a></li>
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
  <div id="product_box2">
 
  <form method = "post" action="" enctype="multipart/form-data"style="padding-left:0px;padding-top:50px;padding-bottom:50px;">
    
  <table align="center"bgcolor="#fff" width="800"border="2">
	
	  <tr align="left">	   
	   <td colspan="4">
	   <h2>Register.</h2><br />
	   <span>
	     Already have account? <a href="checkout.php"style="text-decoration:none">Login Now.</a><br /><br />
	   </span>
	   </td>	   
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Name:</b></td>
	   <td colspan="3"><input type="text" name="name" required placeholder="Name" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Email:</b></td>
	   <td colspan="3"><input type="text" name="email" required placeholder="Email" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Password:</b></td>
	   <td colspan="3"><input type="password" id="password_confirm1" name="password" required placeholder="Password" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Confirm Password:</b></td>
	   <td colspan="3"><input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm Password" />
	   <p id="status_for_confirm_password"></p><!-- Showing validate password here -->
	   </td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Image:</b></td>
	   <td colspan="3"><input type="file" name="image" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Contact:</b></td>
	   <td colspan="3"><input type="text" name="contact" required placeholder="Contact" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Address:</b></td>
	   <td colspan="3"><input type="text" name="address" required placeholder="Address" /></td>
	  </tr>
	  
	  <tr align="left">
	   <td></td>
	   <td colspan="4">
	   <input type="submit" name="register" value="Register" />
	   </td>
	  </tr>
	
	</table>
	
	
  </form>


</div>

<?php 
if(isset($_POST['register'])){  
  
  if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])){
   $ip = getIp();
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $hash_password =$password;
   $confirm_password = $_POST['confirm_password'];
   
   $image = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
  
   $contact = $_POST['contact'];
   $address = $_POST['address'];
   
   $check_exist = mysqli_query($con,"select * from customers where customer_email= '$email'");
   
   $email_count = mysqli_num_rows($check_exist);
   
   $row_register = mysqli_fetch_array($check_exist);
   
   if($email_count>0){
   echo "<script>alert('Sorry, your email $email address already exist in our database !')</script>";
   exit();
   }
   if($password != $confirm_password){
	echo "<script>alert('password does not matched')</script>";
	exit();
	}  
   elseif($row_register['customer_email'] !=$email && $password == $confirm_password ){
   
    move_uploaded_file($image_tmp,"customer/customer-images/$image");
	
    $run_insert = mysqli_query($con,"insert into customers (customer_name,customer_email,customer_phone,customer_address,customer_image,customer_password,customer_ip) values ('$name','$email','$contact','$address','$image','$hash_password','$ip') ");
    
	if($run_insert){
	$sel_user = mysqli_query($con,"select * from customers where customer_email='$email' ");
	$row_user = mysqli_fetch_array($sel_user);
	
	$_SESSION['customer_id'] = $row_user['id'] ."<br>";
	
	}
	
	$run_cart = mysqli_query($con,"select * from cart where ip_add='$ip'");
	
	$check_cart = mysqli_num_rows($run_cart);
	
	if($check_cart == 0){
		$_SESSION['customer_address'] = $row_user['customer_address'];
	$_SESSION['customer_email'] = $email;
	$_SESSION['customer_phone'] = $row_user['customer_phone'];
	$_SESSION['customer_name'] = $row_user['customer_name'];
	echo "<script>alert('Account has been created successfully!')</script>";
	
	echo "<script>window.open('index.php','_self')</script>";
	
	}else{
		$_SESSION['customer_phone'] = $row_user['customer_phone'];
	$_SESSION['customer_email'] = $email;
	$_SESSION['customer_name'] = $row_user['customer_name'];
	$_SESSION['customer_address'] = $row_user['customer_address'];
	echo "<script>alert('Account has been created successfully!')</script>";
	
	echo "<script>window.open('index.php','_self')</script>";
	
	}
	
   }
   
  }
  
}

?>





</div>


            </div>
           
        </div>

	
   
<?php include ('footer.php'); ?>
</div>
</body>
</html>