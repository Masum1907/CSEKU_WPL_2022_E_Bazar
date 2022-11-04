
      

<div class="view_product_box">

<h2>All Vendors</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data">

<table width="100%">
 <thead>
  <tr>
   
   <th>SL No.</th>
   <th>Vendor ID</th>
   <th>Name</th>
   <th>Image</th>
  
   
  </tr>
 </thead>
 
 <?php 
 $all_products = mysqli_query($con,"select * from vendors  ");
 
 $i = 0;
 
 while($row=mysqli_fetch_array($all_products)){
 $v_id=$row['vendor_id'];
 $v_name=$row['vendor_name'];

 $v_img=$row['vendor_img'];
$i++;

 
 ?>
 

  <tr align="center">
   <td><?php echo $i; ?></td>
   <td><?php echo $v_id ?></td>
   <td><?php echo  $v_name ?></td>
 
   <td><img src="../vendor_area/vendor-images/<?php echo  $v_img?>" width="70" height="50" /></td>
  
      <td><a href="index.php?v_detail=<?php echo  $v_id;?>">Details</a></td>
   <td><a href="index.php?v_delete=<?php echo  $v_id;?>">Delete</a></td>


 

 <?php }?>

</table>

</form>

</div><!-- /.view_product_box -->



