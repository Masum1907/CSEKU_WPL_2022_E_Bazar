<!DOCTYPE html>
<?php

include("includes/db.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category inserting</title>
    <link rel="stylesheet" href="styles/style6.css" media="all"/>
   
</head>
<body bgcolor="skyblue">
    <form style="padding-top:120px;"action="insert_category.php"method="post"enctype="multipart/form-data"style="margin-top:45px";>
        <table style="padding:40px";align="center"bgcolor="#d4dbd9" width="900"border="3">
            <tr align="center">
                <td colspan="2"><h2><b>Insert New Category</b></h2></td>
            </tr>
            <tr >
                <td align="right"><b>Category Title:</b></td>
                <td style="padding:10px ;"><input type="text"name="category_title"size="50" style="height:30px;font-size:14pt;"required></td>
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

    $category_title=$_POST['category_title'];
 
 


$insert_category="insert into categories (cat_title) values('$category_title')";

$insert_cat=mysqli_query($con,$insert_category);

if($insert_cat){
    echo "<script>alert('Catgory has been inserted')</script>";
    echo "<script>window.open('index.php?insert_category','_self')</script>";
 }
}
?>

