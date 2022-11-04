<!DOCTYPE html>
<?php

include("includes/db.php");
if(isset($_GET['edit_pro'])){
	$get_id=$_GET['edit_pro'];
	$all_products = mysqli_query($con,"select * from products where product_id='$get_id' ");
 
 $i = 0;
 
 $row=mysqli_fetch_array($all_products);
 $pro_id=$row['product_id'];
 $pro_title=$row['product_title'];
 $pro_price=$row['product_price'];
 $pro_img=$row['product_image'];
 $pro_desc=$row['product_desc'];
 $pro_keywords=$row['product_keywords'];
 $pro_cat_id=$row['product_cat'];
 $cat_name = mysqli_query($con,"select * from categories where cat_id=' $pro_cat_id' ");
 $row_cat=mysqli_fetch_array($cat_name);
 $pro_cat=$row_cat['cat_title'];
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
                <td colspan="2"><h2 style="padding-top:20px;"><b>Edit the Product</b></h2></td>
            </tr>
            <tr >
                <td align="right"><b>Edit Title:</b></td>
                <td style="padding:10px ;"><input type="text"name="product_title"value="<?php echo $pro_title;?>"size="50" style="height:30px;font-size:14pt;"required></td>
            </tr>

            <tr> 
                <td align="right"><b>Edit Category:</b></td>
                <td style="padding:10px" >
                    <select name="product_cat"style="height:30px;" >
                        <option   ><b><?php echo $pro_cat;?></b></option>
                        <?php
 
 $get_cats="select * from categories";
 $run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats)){


$cat_id=$row_cats['cat_id'];
$cat_title=$row_cats['cat_title'];

echo "<option value='$cat_id'>$cat_title</option>";

}

                        ?>
                    </select>
                </td>
            </tr>

            <tr >
                <td align="right"> <b>Edit Price:</b></td>
                <td style="padding:10px;"><input type="text"name="product_price"value="<?php echo $pro_price;?>"  style="height:30px;"></td>
            </tr>

            <tr >
                <td align="right"><b>Edit Image:</b></td>
                <td style="padding:10px"><input type="file"name="product_image" style="height:30px;" ><img src="product_images/<?php echo  $pro_img?>" width="70" height="50" /></td>
            </tr>


            <tr >
                <td align="right"><b>Edit Description:</b></td>
                <td  style="padding:10px">
                    <textarea name="product_desc"cols="80"  rows="7"> <?php echo  $pro_desc;?></textarea>
                </td>
            </tr>

            <tr >
                <td align="right"> <b>Edit Keywords:</b></td>
                <td style="padding:10px;"><input type="text"name="product_keywords"value="<?php echo $pro_keywords;?>"size="60" style="height:30px;"required></td>
            </tr>
            <tr  align="center">
                
                <td  style="padding:10px"colspan="2"><input type="submit"name="edit_product" value="Update Now"></td>
            </tr>

        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['edit_product'])){
	$update_id=$pro_id;
	$product_title = $_POST['product_title'];

	$product_cat = $_POST['product_cat'];
	

	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keywords']; 
	
	
	// Getting the image from the field
	$product_image  = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	
	if(!empty($_FILES['product_image']['name'])){
	
	if(move_uploaded_file($product_image_tmp,"product_images/$product_image")){
		if(empty($product_cat)){
			$cat_name = mysqli_query($con,"select * from categories where cat_id=' $pro_cat_id' ");
		 $row_cat=mysqli_fetch_array($cat_name);
		 $product_cat=$row_cat['cat_id'];
	$update_product = mysqli_query($con,"update products set product_cat='$product_cat', product_title='$product_title', product_price='$product_price', product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id' ");
		}
		else 	$update_product = mysqli_query($con,"update products set  product_title='$product_title', product_price='$product_price', product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id' ");

	}
	
	}
	else{
		if(empty($product_cat)){
			$cat_name = mysqli_query($con,"select * from categories where cat_id=' $pro_cat_id' ");
		 $row_cat=mysqli_fetch_array($cat_name);
		 $product_cat=$row_cat['cat_id'];
	$update_product = mysqli_query($con,"update products set  product_cat='$product_cat',product_title='$product_title', product_price='$product_price', product_desc='$product_desc',product_keywords='$product_keywords' where product_id='$update_id' ");
		}
		else
	{$update_product = mysqli_query($con,"update products set product_title='$product_title', product_price='$product_price', product_desc='$product_desc',product_keywords='$product_keywords' where product_id='$update_id' ");}
	
	}


	if($update_product){
	
	echo "<script>alert('Product was updated successfully!')</script>";
	
	echo "<script>window.open('index.php?view_products','_self')</script>";
	}
	
	}
?>