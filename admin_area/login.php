
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
        <h1 class="login-title">Admin Login</h1>
        <input type="text" class="login-input" name="user_name" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="login" class="login-button"/>
  </form>
   


</body>

<?php 

include('../includes/db.php');
 if(isset($_POST['login'])){
 
 $name = $_POST['user_name'];
 
 $password = $_POST['password'];
 
 
 
 $admin= "select * from admin where user_name ='$name' AND admin_password='$password' ";
 
 $run_user = mysqli_query($con, $admin) ;
 
 $check_user = mysqli_num_rows($run_user);
 
 if($check_user > 0){
 
 $row = mysqli_fetch_array($run_user);
 


 $_SESSION['admin_id'] = $row['admin_id'];
 $_SESSION['user_name'] = $row['user_name'];
  $_SESSION['admin_email'] = $row['admin_email']; 

 echo "<script>window.open('index.php?logged_in=You have successfully Logged In!','_self')</script>";
 

 
 }
 else{
 echo "<script>alert('Password or Email is wrong, try again!')</script>";
 
 }
 
 }
?>



