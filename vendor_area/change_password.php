
<?php 

$select_user = mysqli_query($con,"select * from vendors where vendor_id='$_SESSION[vendor_id]' ");

$fetch_user = mysqli_fetch_array($select_user);
?>
	
	<div id="product_box">
        <div class="right-custom">
  <form method = "post" action="" enctype="multipart/form-data">
    
  <table style="padding:40px";align="center"bgcolor="#d9dbcb" width="900"border="3">
	
	  <tr align="left">	   
	   <td colspan="4">
	   <h2>Change Password</h2><br />
	   
	   </td>	   
	  </tr>	  
	  
      <tr>
	   <td width="30%"style="padding:10px;"><b>Current Password:</b></td>
	   <td colspan="3"><input type="password" name="current_password" required placeholder="Current Password" /></td>
	  </tr>
      
	  <tr>
	   <td width="15%"style="padding:10px;"><b>New Password:</b></td>
	   <td colspan="3"><input type="password" id="password_confirm1" name="new_password" required placeholder="New Password" /></td>
	  </tr>
	  
	  <tr>
	   <td width="35%"style="padding:10px;"><b>Re-type New Password:</b></td>
	   <td colspan="3"><input type="password" id="password_confirm2" name="confirm_new_password" required placeholder="Re-Type New Password" />
	   <p id="status_for_confirm_password"></p><!-- Showing validate password here -->
	   </td>
	  </tr>	  
	  
	  <tr align="left">
	   <td></td>
	   <td colspan="4"style="padding-top:10px;padding: left 200px;">
	   <input type="submit" name="change_password" value="Save" />
	   </td>
	  </tr>
	
	</table>
	
	
  </form>

</div>
</div>

<?php 
if(isset($_POST['change_password'])){   
   
   $current_password = $_POST['current_password'];

   
   $new_password = $_POST['new_password'];
 
   $confirm_new_password = $_POST['confirm_new_password'];
  
   $select_password = mysqli_query($con,"select * from vendors where vendor_password='$current_password' and vendor_id='$_SESSION[vendor_id]' ");
   
   //Check if current password not empty
   if(mysqli_num_rows($select_password) == 0){
    
	echo "<script>alert('Your Current Password is Wrong!')</script>";
   
   }elseif($new_password != $confirm_new_password){
   
    echo "<script>alert('Password do not match!')</script>";
	
   }else{
    $update = mysqli_query($con,"update vendors set vendor_password='$new_password' where vendor_id='$_SESSION[vendor_id]' ");
	
	if($update){
	echo "<script>alert('Your Password was updated successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
	
	}else{
	
	 echo "<script>alert('Database query failed: mysqli_error($con) !')</script>";
	}
	
   }
}

?>




  
