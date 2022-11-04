
<?php session_start(); 
?>

<head>
<meta charset="UTF-8">
<title>Log In</title>

<link rel="stylesheet" href="styles/style.css" />

</head>

<body>
    
<h2 style="text-align:center;padding-top:30px;"><?php echo @$_GET['not_admin'];?></h2>
    <h2 style="text-align:center;padding-top:30px;"><?php echo @$_GET['logout'];?></h2>


	
    <form class="form" method="post" name="login">
        <h1 class="login-title">Vendor Login</h1>
        <input type="text" class="login-input" name="vendor_email" placeholder="Email" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="login" class="login-button"/>
       <p class="link"><a href="registration.php">New Registration</a></p>
       <a href="reset.php"style="padding-right:150px;text-decoration:none;">
       Forgot Password?
     </a> 
  </form>
   


</body>

<?php 

include('../includes/db.php');
 if(isset($_POST['login'])){
 
 $email = $_POST['vendor_email'];
 
 $password = $_POST['password'];
 
 
 
 $admin= "select * from vendors where vendor_email ='$email' AND vendor_password='$password' ";
 
 $run_user = mysqli_query($con, $admin) ;
 
 $check_user = mysqli_num_rows($run_user);
 
 if($check_user > 0){
 
 $row = mysqli_fetch_array($run_user);
 


  $_SESSION['vendor_email'] = $row['vendor_email'];
  $_SESSION['vendor_id'] = $row['vendor_id'];
  $_SESSION['vendor_name'] = $row['vendor_name'] ;

  echo "<script>alert('You have successfully Logged In!')</script>";

 echo "<script>window.open('index.php?logged_in=You have successfully Logged In!','_self')</script>";
 

 
 }
 else{
 echo "<script>alert('Password or Email is wrong, try again!')</script>";
 
 }
 
 }
?>



