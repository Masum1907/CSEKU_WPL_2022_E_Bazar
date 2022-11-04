
      

<div class="view_product_box">

<h2>All Categories</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data">


<table width="100%" >
 <thead>
  <br>
  <tr >
   
   <th>SL No.</th>
   <th>Title</th>
   
  <th>Edit</th>
   <th>Delete</th>
   
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
   <td style="font-size:20px;padding:15px;"><?php echo $i; ?></td>
   <td style="font-size:20px;padding:15px;"><?php echo  $cat_title ?></td>
   
      <td><a href="index.php?edit_cat=<?php echo  $cat_id;?>">Edit</a></td>
   <td><a href="index.php?delete_cat=<?php echo  $cat_id;?>">Delete</a></td>


 

 <?php }?>

</table>

</form>

</div><!-- /.view_product_box -->




