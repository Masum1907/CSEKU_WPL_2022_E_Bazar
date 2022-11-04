
      

<div class="view_product_box">
<br><br>
<h2>New Orders</h2><br><br>

<form action="" method="post" enctype="multipart/form-data"style="padding-bottom:130px;">



<table width="100%">
 <thead>
  <tr>
   
   <th>SL No.</th>
   <th>Product ID</th>
 
   <th>Product title</th>
   <th>Qty</th>
 
  <th>Customer Details</th>
   
   
  </tr>
 </thead>
 
 <?php 
 $v_id=$_SESSION['vendor_id'];
 $all_products = mysqli_query($con,"
    select product_id,product_title,qty,order_id from products,order_new where products.product_id=order_new.pro_id and products.vendor_id='$v_id'and order_new.visible=0 ");
 
 $i = 0;
 
 while($row=mysqli_fetch_array($all_products)){
 $pro_id=$row['product_id'];
 $pro_title=$row['product_title'];
 $pro_qty=$row['qty'];
 $order_id=$row['order_id'];
$i++;

 
 ?>
 

  <tr align="center">
   <td style="padding:10px;"><?php echo $i; ?></td>
   <td><?php echo $pro_id ?></td>
   <td><?php echo $pro_title ?></td>
   <td><?php echo $pro_qty ?></td>
  
  
      <td><a href="index.php?details=<?php echo  $order_id;?>">Details</a></td>
   


 

 <?php }?>

</table>

</form>

</div><!-- /.view_product_box -->



