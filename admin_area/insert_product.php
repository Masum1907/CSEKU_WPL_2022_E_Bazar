<!DOCTYPE html>
<?php

include("includes/db.php");

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
    <form style="padding-top:30px;"action="insert_product.php"method="post"enctype="multipart/form-data"style="margin-top:45px";>
        <table align="center"bgcolor="#83af00" width="900"border="3">
            <tr align="center">
                <td colspan="2"><h2 style="padding-top:20px;"><b>Insert New Product</b></h2></td>
            </tr>
            <tr >
                <td align="right"><b>Product Title:</b></td>
                <td style="padding:10px ;"><input type="text"name="product_title"size="50" style="height:30px;font-size:14pt;"required></td>
            </tr>

            <tr> 
                <td align="right"><b>Product Category:</b></td>
                <td style="padding:10px" >
                    <select name="product_cat"style="height:30px;" >
                        <option   ><b>Select a Category</b></option>
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
                <td align="right"> <b>Product Price:</b></td>
                <td style="padding:10px;"><input type="text"name="product_price"  style="height:30px;" required></td>
            </tr>

            <tr >
                <td align="right"><b>Product Image:</b></td>
                <td style="padding:10px"><input type="file"name="product_image" style="height:30px;" required ></td>
            </tr>


            <tr >
                <td align="right"><b>Product Description:</b></td>
                <td  style="padding:10px">
                    <textarea name="product_desc" cols="80"  rows="7"></textarea>
                </td>
            </tr>

            <tr >
                <td align="right"> <b>Product Keywords:</b></td>
                <td style="padding:10px;"><input type="text"name="product_keywords"size="60" style="height:30px;"required></td>
            </tr>
            <tr  align="center">
                
                <td  style="padding:10px"colspan="2"><input type="submit"name="insert_post" value="Insert Now"></td>
            </tr>

        </table>
    </form>
</body>
</html>

<?php

if(isset($_POST['insert_post'])){

    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_image=$_FILES['product_image']['name'];
    $dest="product_images/";
    $product_image_tmp=$_FILES['product_image']['tmp_name'];


move_uploaded_file($product_image_tmp,$dest.$product_image);


$insert_product="insert into products (product_cat,product_title,product_price,product_desc,product_image,product_keywords)
values('$product_cat','$product_title',' $product_price','$product_desc','$product_image','$product_keywords')";

$insert_pro=mysqli_query($con,$insert_product);

if($insert_pro){
    echo "<script>alert('product has been inserted')</script>";
    echo "<script>window.open('index.php?insert_product','_self')</script>";
 }
}
?>