




    


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
	   <h2>User Profile Picture.</h2><br />
	   
	   </td>	   
	  </tr>	  
	  
	  <tr>
	   <td width="15%"><b>Image:</b></td>
	   <td colspan="3"><div>
       <input type="file" name="image" />
       
       <img src="customer/customer-images/<?php echo $fetch_user['customer_image']; ?>" width="100" height="70" />
       </div>
       </td>
	  </tr>	  
	  
	  <tr align="left">
	   <td></td>
	   <td colspan="4">
	   <input type="submit" name="user_profile_picture" value="Save" />
	   </td>
	  </tr>
	
	</table>
	
	
  </form>

</div>
</div>

<?php 
if(isset($_POST['user_profile_picture'])){   
 
 // Check if file not empty 
 if(!empty($_FILES['image']['name'])){
 
   $image = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];   
   $target_file = "customer/customer-images/" . $image;   
   $uploadOk = 1;
   $message = '';  
   
   
   // Check if the file size more than 5 MB.
   if($_FILES["image"]["size"] < 5098888){
  
   // Check if file already exists
   if(file_exists($target_file)){
   
    $uploadOk = 0;
	$message .=" Sorry, file already exists. ";
	
   }if($uploadOk == 0){ // Check if uploadOk is set to 0 by an error
   
    $message .="Sorry, your file was not uploaded . ";
	
   }else{
    if(move_uploaded_file($image_tmp, $target_file)){
	
	$update_image = mysqli_query($con,"update customers set customer_image='$image' where customer_id='$_SESSION[customer_id]'");
	
	$message .= "The file" . basename($image) . " has been uploaded. ";
	}else{
	 $message .= "Sorry, there was an error uploading your file. ";
	}
   }
   
   }// End if the file size more than 5 MB.
   else{
    $message .= "File size max 5 MB. ";
   }
   
   }
  
}

?>

<p style="color:black;margin-left:45px">
<?php if(isset($message)){echo $message;} ?>
</p>





  
