
      

<div class="view_product_box">

<h2 style="padding-top:40px;">Category List</h2>
<div class="border_bottom"></div>

<form align="center"action="" method="post" enctype="multipart/form-data"style="margin-left:350px;font-size:20px;">



<table width="600">
 <thead>
  <tr>
   
   <th>SL No.</th>
   <th>Title</th>
   
  
  </tr>
 </thead>
 
 <?php 
 $all_categories = mysqli_query($con,"select * from categories order by cat_id DESC ");
 
 $i = 0;
 
 while($row=mysqli_fetch_array($all_categories)){
 $cat_id=$row['cat_id'];
 $cat_title=$row['cat_title'];

$i++;

 
 ?>
 

  <tr align="center">
   <td style="padding:10px;"><?php echo $i; ?></td>
   <td><?php echo  $cat_title; ?></td>
   
     
 

 <?php }?>

</table>

</form>

</div><!-- /.view_product_box -->




