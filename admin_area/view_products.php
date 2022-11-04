
      

<div class="view_product_box">

<h2>All Products</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data">

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
 $all_products = mysqli_query($con,"select * from products order by product_id DESC ");
 
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
   <td><img src="product_images/<?php echo  $pro_img?>" width="70" height="50" /></td>
  
      <td><a href="index.php?edit_pro=<?php echo  $pro_id;?>">Edit</a></td>
   <td><a href="index.php?delete_pro=<?php echo  $pro_id;?>">Delete</a></td>


 

 <?php }?>

</table>

</form>

</div><!-- /.view_product_box -->



