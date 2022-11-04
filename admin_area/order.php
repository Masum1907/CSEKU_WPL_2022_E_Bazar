
      

<div class="view_product_box">
<br><br>
<h2>All Orders</h2><br><br>

<form action="" method="post" enctype="multipart/form-data"style="padding-bottom:130px;">



<table width="100%">
 <thead>
  <tr>
   
   <th>SL No.</th>
   <th>Order ID</th>
 
   <th>Customer Name</th>
   <th>Amount</th>
   
   <th>Transaction_id</th>
   <th>Order Date</th>

 
   
  </tr>
 </thead>
 
 <?php 

 $all_products = mysqli_query($con,"
    select * from orders");
 
 $i = 0;
 
 while($row=mysqli_fetch_array($all_products)){
 $id=$row['id'];
 $name=$row['name'];
 $amount=$row['amount'];
 
 $t_id=$row['transaction_id'];
 $t_date=$row['date'];
$i++;

 
 ?>
 

  <tr align="center">
   <td style="padding:10px;"><?php echo $i; ?></td>
   <td ><?php echo $id ?></td>
   <td><?php echo $name ?></td>
   <td><?php echo $amount ?></td>
 
   <td><?php echo $t_id ?></td>
   <td><?php echo $t_date ?></td>
  
      
   


 

 <?php }?>

</table>

</form>

</div><!-- /.view_product_box -->



