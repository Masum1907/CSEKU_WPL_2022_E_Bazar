<?php 

include("includes/db.php");

?>
	
  <div id="product_box2">
        <div class="right-custom">

<form method = "post" action="">
  
<table style="padding:40px;"align="center"bgcolor="#B2C1E1  " width="700"border="3">
  
    <tr align="left">	   
     <td colspan="4">
     <h2>Login Now</h2><br />
     <span style="font-size:18px;color:black;">
       Don't have account? <a href="customer_register.php"style="padding-left:10px;text-decoration:none;" >Register Here</a><br /><br />
     </span>
     </td>	   
    </tr>
    
    <tr>
     <td width="30%"><b>Email:</b></td>
     <td colspan="3"><input type="text" name="email" required placeholder="Email" /></td>
    </tr>
    
    <tr>
     <td width="30%"><b>Password:</b></td>
     <td colspan="3"><input type="password" name="password" required placeholder="Password" /></td>
    </tr>
    
  
    
    <tr align="left">
     
     <td colspan="9"> 
      <a href="reset.php"style="padding-right:150px;text-decoration:none;">
       Forgot Password?
     </a>
     <input type="submit" name="login" value="Login" />
    
     
     </td>
     
    </tr>
  
  </table>
  
  
</form>

</div>

</div>

<?php 
if(isset($_POST['login'])){

$email =$_POST['email'];
$password = $_POST['password'];


$run_login = mysqli_query($con, "select * from customers where customer_password='$password' AND customer_email='$email' " );

$check_login = mysqli_num_rows($run_login);

$row_login = mysqli_fetch_array($run_login);

if($check_login == 0){
 echo "<script>alert('Password or email is incorrect, please try again!')</script>";
 echo "<script>window.open('checkout.php','_self')</script>";
 exit();
}
$ip = getIp();

$run_cart = mysqli_query($con, "select * from cart where ip_add='$ip'");

$check_cart = mysqli_num_rows($run_cart);

if($check_login > 0 AND $check_cart==0){

$_SESSION['customer_id'] = $row_login['customer_id'];
$_SESSION['customer_name'] = $row_login['customer_name'];
$_SESSION['customer_phone'] = $row_login['customer_phone'];
$_SESSION['customer_address'] = $row_login['customer_address'];

$_SESSION['customer_email'] = $email;
echo "<script>alert('You have logged in successfully !')</script>";
echo "<script>window.open('my_account.php','_self')</script>";

}else{
$_SESSION['customer_id'] = $row_login['customer_id'];
$_SESSION['customer_name'] = $row_login['customer_name'];
$_SESSION['customer_phone'] = $row_login['customer_phone'];
$_SESSION['customer_address'] = $row_login['customer_address'];

$_SESSION['customer_email'] = $email;
echo "<script>alert('You have logged in successfully !')</script>";
echo "<script>window.open('cart.php','_self')</script>";
}

}

?>




