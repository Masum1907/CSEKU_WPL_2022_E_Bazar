




    


<?php 

$select_user = mysqli_query($con,"select * from customers where customer_id='$_SESSION[customer_id]' ");

$fetch_user = mysqli_fetch_array($select_user);
?>
<div id="product_box">
        <div class="right-custom">
  <form method = "post" action="" enctype="multipart/form-data">
    
  <table style="padding:40px";align="center"bgcolor="#d9dbcb" width="900"border="3">
	
	  <tr align="left">	   
	   <td colspan="4">
	   <h2>Edit Profile.</h2><br />
	   
	   </td>	   
	  </tr>
	  
	  <tr>
	   <td width="25%"><b>Change Name:</b></td>
	   <td colspan="3"><input type="text" name="name" value="<?php echo $fetch_user['customer_name'];?>" required placeholder="Name" /></td>
	  </tr>	 
	  
	 
	  
	  <tr>
	   <td width="15%"><b>Contact:</b></td>
	   <td colspan="3"><input type="text" name="contact" value="<?php echo $fetch_user['customer_phone'];?>" required placeholder="Contact" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Address:</b></td>
	   <td colspan="3"><input type="text" name="address" value="<?php echo $fetch_user['customer_address'];?>" required placeholder="Address" /></td>
	  </tr>
	  
	  <tr align="left">
	   <td></td>
	   <td colspan="4">
	   <input type="submit" name="edit_profile" value="Save" />
	   </td>
	  </tr>
	
	</table>
	
	
  </form>

</div>
</div>

<?php 
if(isset($_POST['edit_profile'])){  
  
  if($_POST['name'] !=''  && $_POST['contact']!='' && $_POST['address']!='' ){
  
   
   $name = $_POST['name'];
 
   $contact = $_POST['contact'];
   $address = $_POST['address']; 
   
   $update_profile = mysqli_query($con,"update customers set customer_name='$name',customer_phone='$contact', customer_address='$address' where customer_id='$_SESSION[customer_id]'");
   
   if($update_profile){
   echo "<script>alert('Your updated was successfully!')</script>";
   
   echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
  }
  
}

?>




  
