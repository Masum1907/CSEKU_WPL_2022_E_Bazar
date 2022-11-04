
<?php session_start(); 
include("includes/db.php");
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
        <h1 class="login-title">Recover Password</h1>
        <input type="text" class="login-input" name="email" placeholder="Email" autofocus="true"/>
        
        <input type="submit" value="Send" name="recover" class="login-button"/>
       
  </form>
   


</body>
<?php
         if(isset($_POST['recover'])){
          
$email =$_POST['email'];

$run = mysqli_query($con, "select * from vendors where vendor_email='$email'  " );
$row= mysqli_fetch_array($run);
  $check = mysqli_num_rows($run);
  if($check == 1){

$password=$row['vendor_password'];

            $url = "https://script.google.com/macros/s/AKfycbz7c_sdEue4LzoNWdIfL8o3ORbZvDmMJT7ZFXx8m5jJVOvMo9Z1Gd7-vFsNwtn4ZQjJ6w/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $_POST['email'],
                  "subject"   => "Your Password",
                  "body"      => "Your Password is  - ".$password
               ])
            ]);
            $result = curl_exec($ch);
            echo "<script>alert('Password has been sent to your email')</script>";
            echo "<script>window.open('login.php','_self')</script>";}
            else{
               echo"<script>alert('At first create an account ')</script>";}
         }
         ?>
      