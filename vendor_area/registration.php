<!DOCTYPE html>

<html lang="en">
<?php 
session_start();
include("includes/db.php");
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


  <form align="center"method = "post" action="" enctype="multipart/form-data">
    
    <table align="center"bgcolor="#fff" width="800"border="1" style="border-collapse: collapse;">
    
      <tr align="center">	   
       <td colspan="4">
       <h2>Vendor Registration</h2><br />
       <span>
         Already have account? <a href="login.php"style="text-decoration:none">Login Now.</a><br /><br />
       </span>
       </td>	   
      </tr>
      
      <tr  >
       <td width="15%"style="padding:20px;"><b>Name:</b></td>
       <td align="center"colspan="3"style="padding:20px;"><input type="text" name="name" required placeholder="Name" /></td>
      </tr>
      <tr  >
       <td width="15%"style="padding:20px;"><b>Shop Name:</b></td>
       <td align="center"colspan="3"style="padding:20px;"><input type="text" name="shop" required placeholder="Shop Name" /></td>
      </tr>
      
      <tr>
       <td width="15%"style="padding:20px;"><b>Email:</b></td>
       <td align="center"colspan="3"style="padding:20px;"><input type="text" name="email" required placeholder="Email" /></td>
      </tr>
      
      <tr>
       <td width="15%"style="padding:20px;"><b>Password:</b></td>
       <td align="center"colspan="3"style="padding:20px;"><input type="password" id="password_confirm1" name="password" required placeholder="Password" /></td>
      </tr>
      
      <tr style="padding-top:20px;">
       <td width="15%"style="padding:20px;"><b>Confirm Password:</b></td>
       <td align="center"colspan="3"style="padding:20px;"><input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm Password" />
       <p id="status_for_confirm_password"></p><!-- Showing validate password here -->
       </td>
      </tr>
      
      <tr>
       <td width="15%"style="padding:20px;"><b>Image:</b></td>
       <td align="center"colspan="3"style="padding:20px;"><input type="file" name="image" /></td>
      </tr>
      
      <tr>
       <td width="35%"style="padding:20px;"><b>Contact:</b></td>
       <td align="center"colspan="3"style="padding:20px;"><input type="text" name="contact" required placeholder="Contact" /></td>
      </tr>
      
      <tr>
       <td width="35%"style="padding:20px;"><b>Address:</b></td>
       <td align="center"colspan="6"style="padding:20px;"><input type="text" name="address" required placeholder="Address" /></td>
      </tr>
      
     
    </table>
    
       <input style="align:center;margin-top:20px;color:green;font-size:18px;height:30px;"type="submit" name="register" value="Register" />
      
    
    </form>
  
  

  
  <?php 
  if(isset($_POST['register'])){  
    
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])){
    
     $name = $_POST['name'];
     $email = $_POST['email'];
     $shop = $_POST['shop'];
     $password = $_POST['password'];
     $confirm_password = $_POST['confirm_password'];
     $contact = $_POST['contact'];
     $address = $_POST['address'];
     
   $image = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
    
   $check_exist = mysqli_query($con,"select * from vendors where vendor_email= '$email'");
   
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
   elseif($row_register['vendor_email']!=$email && $password == $confirm_password ){
   
    move_uploaded_file($image_tmp,"vendor_area/vendor-images/$image");
	
     
      $run_insert = mysqli_query($con,"insert into vendors (vendor_name,shop_name,vendor_email,vendor_phone,vendor_address,vendor_password,vendor_img) values ('$name','$shop','$email','$contact','$address','$password','$image') ");
      if($run_insert){
        $user = mysqli_query($con,"select * from vendors where vendor_email='$email' ");
        $row_user = mysqli_fetch_array($user);
        
        $_SESSION['vendor_email'] = $row_user['vendor_email'];
        $_SESSION['vendor_name'] = $row_user['vendor_name'] ;
        $_SESSION['vendor_id'] = $row_user['vendor_id'];

         echo "<script>alert('Account has been created successfully!')</script>";
         echo "<script>window.open('login.php','_self')</script>";

        }
     
      
      
      
    
      
      }
      
     }
     
  }
  
  ?>
  


  </div>






</div>
</body>
</html>