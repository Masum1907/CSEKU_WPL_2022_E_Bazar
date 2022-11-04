<form method = "post" action="" enctype="multipart/form-data">
    
<table align="center"bgcolor="#d9dbcb" width="900"border="none"style="margin-left:80px;margin-top:30px;">

 <thead>
  <br>
  <tr >
   <td width="264"><b>Order ID:</b></td>
     <td width="270"><b>Amount(TK):</b></td>
       <td width="200"><b>Transaction ID</b></td>
       <td width="300"><b>Date</b></td>
  </tr>
 </thead>


 <?php


$select_user = mysqli_query($con,"select * from orders where name='$_SESSION[customer_name]' ");

while($fetch_user = mysqli_fetch_array($select_user)){

?>

  
  
	  
	  <tr>
	 
	   <td width="300"><?php echo $fetch_user['id'];?> </td>
	   <td width="300"><?php echo $fetch_user['amount'];?></td>
	   <td width="300"><?php echo $fetch_user['transaction_id'];?></td>
	   <td width="300"><?php echo $fetch_user['date'];?></td>
	  </tr>
	  
	 
	
	

<?php }
?>

</table>
	
	
  </form>



  
