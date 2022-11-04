<!DOCTYPE html>
<?php

include("includes/db.php");
if(isset($_GET['c_detail'])){

	$get_id=$_GET['c_detail'];
	$order = mysqli_query($con,"select * from customers where customer_id='$get_id'");
    $row = mysqli_fetch_array($order);
 $name=$row['customer_name'];
 $email=$row['customer_email'];
 $phone=$row['customer_phone'];
 $address=$row['customer_address'];

    
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer_details</title>
    <link rel="stylesheet" href="styles/style6.css" media="all"/>
   
</head>
<body>
<form style="padding-top:30px;"action=""method="post"enctype="multipart/form-data"style="margin-top:45px";>
        <table align="center"bgcolor="#d9dbcb" width="900"border="3">
            <tr align="center">
                <td colspan="2"><h2 style="padding-top:20px;"><b>Customer Details</b></h2></td>
            </tr>
            <tr >
                <td align="right"><b>Customer_name:</b></td>
                <td style="padding:10px ;"><input type="text"value="<?php echo $name;?>"size="50" style="height:30px;font-size:14pt;"required></td>
            </tr>

            

            <tr >
                <td align="right"> <b>Customer_phone:</b></td>
                <td style="padding:10px;"><input type="text"value="<?php echo $phone;?>"  style="height:30px;"></td>
            </tr>

            <tr >
                <td align="right"><b>Customer_email:</b></td>
                <td style="padding:10px;"><input type="text"value="<?php echo $email;?>"  style="height:30px;"></td>
            </tr>
            <tr >
                <td align="right"><b>Customer_address:</b></td>
                <td style="padding:10px;"><input type="text"value="<?php echo $address;?>" size="50" style="height:30px;"></td>
            </tr>

            <tr  align="center">
                
                <td  style="padding:10px"colspan="2"><input type="submit"name="ok" value="OK"></td>
            </tr>

        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['ok'])){
	
	
	echo "<script>window.open('index.php?view_customer','_self')</script>";
	
}
	
?>