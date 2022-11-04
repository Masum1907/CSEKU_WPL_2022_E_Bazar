
      

<div class="view_product_box">
<br><br>
<h2>Your Products</h2><br><br>

<form action="" method="post" enctype="multipart/form-data"style="padding-bottom:130px;">



<table width="100%">
 <thead>
  <tr>
   
   <th>SL No.</th>
   <th>Product ID</th>
   <th>Title</th>
   <th>Price</th>
   <th>Image</th>
  <th>Edit</th>
   <th>Delete</th>
   
  </tr>
 </thead>
 
 <?php 
 $v_id=$_SESSION['vendor_id'];
 $all_products = mysqli_query($con,"select * from products  where vendor_id='$v_id'");
 
 $i = 0;
 
 while($row=mysqli_fetch_array($all_products)){
 $pro_id=$row['product_id'];
 $pro_title=$row['product_title'];
 $pro_price=$row['product_price'];
 $pro_img=$row['product_image'];
$i++;

 
 ?>
 

  <tr align="center">
   <td><?php echo $i; ?></td>
   <td><?php echo $pro_id ?></td>
   <td><?php echo  $pro_title ?></td>
   <td><?php echo  $pro_price ?></td>
   <td ><img  src="product-images/<?php echo  $pro_img?>" width="70" height="50" /></td>
  
      <td><a href="index.php?edit_pro=<?php echo  $pro_id;?>">Edit</a></td>
   <td><a href="index.php?delete_pro=<?php echo  $pro_id;?>">Delete</a></td>


 

 <?php }?>

</table>

</form>

</div><!-- /.view_product_box -->



