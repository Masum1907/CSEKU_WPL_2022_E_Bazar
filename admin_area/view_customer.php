
      

<div class="view_product_box">

<h2>All Customers</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data">

<table width="100%">
 <thead>
  <tr>
   
   <th>SL No.</th>
   <th>Customer ID</th>
   <th>Name</th>
   <th>Image</th>
  
   
  </tr>
 </thead>
 
 <?php 
 $all_products = mysqli_query($con,"select * from customers  ");
 
 $i = 0;
 
 while($row=mysqli_fetch_array($all_products)){
 $c_id=$row['customer_id'];
 $c_name=$row['customer_name'];

 $c_img=$row['customer_image'];
$i++;

 
 ?>
 

  <tr align="center">
   <td><?php echo $i; ?></td>
   <td><?php echo $c_id ?></td>
   <td><?php echo  $c_name ?></td>
 
   <td><img src="../customer/customer-images/<?php echo  $c_img?>" width="70" height="50" /></td>
  
      <td><a href="index.php?c_detail=<?php echo  $c_id;?>">Details</a></td>
   <td><a href="index.php?c_delete=<?php echo  $c_id;?>">Delete</a></td>


 

 <?php }?>

</table>

</form>

</div><!-- /.view_product_box -->



