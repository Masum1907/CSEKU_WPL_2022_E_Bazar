<!DOCTYPE html>
<?php

include("includes/db.php");
if(isset($_GET['edit_cat'])){
	$get_id=$_GET['edit_cat'];

 $row=mysqli_fetch_array(mysqli_query($con,"select * from categories where cat_id='$get_id' "));
 $cat_id=$row['cat_id'];
 $cat_title=$row['cat_title'];
 
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product is inserting...</title>
    <link rel="stylesheet" href="styles/style6.css" media="all"/>
   
</head>
<body bgcolor="skyblue">
    <form style="padding-top:30px;"action=""method="post"enctype="multipart/form-data"style="margin-top:45px";>
        <table align="center"bgcolor="#d9dbcb" width="900"border="3">
            <tr align="center">
                <td colspan="2"><h2 style="padding-top:20px;"><b>Edit the Category name</b></h2></td>
            </tr>
            <tr >
                <td align="right"><b>Edit Title:</b></td>
                <td style="padding:10px ;"><input type="text"name="cat_title"value="<?php echo $cat_title;?>"size="50" style="height:30px;font-size:14pt;"required></td>
            </tr>

           
            <tr  align="center">
                
                <td  style="padding:10px"colspan="2"><input type="submit"name="edit_cat" value="Update Now"></td>
            </tr>

        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['edit_cat'])){
	$update_id=$cat_id;
	$new_title = $_POST['cat_title'];

	$update_cat = mysqli_query($con,"update categories set cat_title='$new_title' where cat_id='$update_id' ");


	if($update_cat){
	
	echo "<script>alert('Category was updated successfully!')</script>";
	
	echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
	
	}
?>