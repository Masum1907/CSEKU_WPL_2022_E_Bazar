<?php

include("includes/db.php");
if(isset($_GET['v_delete'])){
	$delete_id=$_GET['v_delete'];
  $delete = mysqli_query($con,"delete from vendors where vendor_id='$delete_id' ");
  $delete_pro = mysqli_query($con,"delete from products where vendor_id='$delete_id' ");
  
  if($delete){
  echo "<script>alert('Vendor has been deleted successfully!')</script>";
  
  echo "<script>window.open('index.php?view_vendor','_self')</script>";
  
  }
}

 ?>
