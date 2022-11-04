<?php
// Delete Product
include("includes/db.php");
if(isset($_GET['c_delete'])){
	$delete_id=$_GET['c_delete'];
  $delete_customer = mysqli_query($con,"delete from customers where customer_id='$delete_id' ");
  
  if($delete_customer){
  echo "<script>alert('Product has been deleted successfully!')</script>";
  
  echo "<script>window.open('index.php?view_customer','_self')</script>";
  
  }
}

 ?>
