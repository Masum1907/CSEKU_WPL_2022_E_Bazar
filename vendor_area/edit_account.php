
    


<?php 

$select_user = mysqli_query($con,"select * from vendors where vendor_id='$_SESSION[vendor_id]' ");

$fetch_user = mysqli_fetch_array($select_user);
?>
	
	<div id="product_box">
        <div class="right-custom">

  <form method = "post" action="" enctype="multipart/form-data">
    
  <table style="padding:40px;"align="center"bgcolor="#d9dbcb" width="600"border="3">
	
	  <tr align="left">	   
	   <td colspan="4">
	   <h2>Edit Account</h2><br/>
	   
	   </td>	   
	  </tr>  
	  
	  <tr>
	   <td style="padding:20px;"width="15%"><b>Change Email:</b></td>
	   <td colspan="3"><input type="text" name="email" value="<?php echo $fetch_user['vendor_email'];?>" required placeholder="Email" /></td>
	  </tr>
	  
      <tr>
	   <td width="30%"><b>Current Password:</b></td>
	   <td colspan="3"><input type="password" name="current_password" required placeholder="Current Password" /></td>
	  </tr>	  
	  
	  <tr align="center">
	   <td></td>
	   <td colspan="4" style="padding-top:20px;" >
	   <input type="submit" name="edit_account" value="Save" />
	   </td>
	  </tr>
	
	</table>
	
	
  </form>

</div>
</div>
<?php 
if(isset($_POST['edit_account'])){  
  
   $email = $_POST['email'];
   $current_password = $_POST['current_password'];
   $hash_password = $current_password;
   
   $check_exist = mysqli_query($con,"select * from vendors where vendor_email = '$email'");
   
   $email_count = mysqli_num_rows($check_exist);
   
   $row_register = mysqli_fetch_array($check_exist);
   
   if($email_count > 0){
   
   echo "<script>alert('Sorry, your email $email address already exist in our database !')</script>";
   
   }elseif($fetch_user['vendor_password'] != $hash_password ){
   
  	echo "<script>alert('Your Current Password is Wrong!')</script>";
    
	}else{
	 $update_email = mysqli_query($con,"update vendors set vendor_email='$email' where vendor_id='$_SESSION[vendor_id]'");
	 
	 if($update_email){
	 echo "<script>alert('Your Email was updated successfully!')</script>";
	 
	 echo "<script>window.open('index.php,'_self')</script>";
	 
	 }
	 
	}
	
  
}

?>




  
