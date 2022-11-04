<?php
// Delete Product
include("includes/db.php");
if(isset($_GET['delete_pro'])){
	$delete_id=$_GET['delete_pro'];
  $delete_product = mysqli_query($con,"delete from products where product_id='$delete_id' ");
  
  if($delete_product){
  echo "<script>alert('Product has been deleted successfully!')</script>";
  
  echo "<script>window.open('index.php?view_products','_self')</script>";
  
  }
}

 ?>
