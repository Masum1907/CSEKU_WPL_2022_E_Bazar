<!DOCTYPE html>
<?php

include("includes/db.php");
if(isset($_GET['v_detail'])){

	$get_id=$_GET['v_detail'];
	$order = mysqli_query($con,"select * from vendors where vendor_id='$get_id'");
    $row = mysqli_fetch_array($order);
 $name=$row['vendor_name'];
 $email=$row['vendor_email'];
 $phone=$row['vendor_phone'];
 $address=$row['vendor_address'];

    
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
                <td colspan="2"><h2 style="padding-top:20px;"><b>Vendors Details</b></h2></td>
            </tr>
            <tr >
                <td align="right"><b>Vendor_name:</b></td>
                <td style="padding:10px ;"><input type="text"value="<?php echo $name;?>"size="50" style="height:30px;font-size:14pt;"required></td>
            </tr>

            

            <tr >
                <td align="right"> <b>Vendor_phone:</b></td>
                <td style="padding:10px;"><input type="text"value="<?php echo $phone;?>"  style="height:30px;"></td>
            </tr>

            <tr >
                <td align="right"><b>Vendor_email:</b></td>
                <td style="padding:10px;"><input type="text"value="<?php echo $email;?>"  style="height:30px;"></td>
            </tr>
            <tr >
                <td align="right"><b>Vendor_address:</b></td>
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
	
	
	echo "<script>window.open('index.php?view_vendor','_self')</script>";
	
}
	
?>