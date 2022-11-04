<?php
// Delete Category
include("includes/db.php");
if(isset($_GET['delete_cat'])){
	$delete_id=$_GET['delete_cat'];
$delete_pro=mysqli_query($con,"delete from products where product_cat='$delete_id' ");
  $delete_cat = mysqli_query($con,"delete from categories where cat_id='$delete_id' ");
  
  if($delete_cat){
  echo "<script>alert('Category has been deleted successfully!')</script>";
  
  echo "<script>window.open('index.php?view_cats','_self')</script>";
  
  }
}

 ?>
