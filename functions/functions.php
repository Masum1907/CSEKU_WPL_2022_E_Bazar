<?php

$con=mysqli_connect("localhost","root","","e_bazar");

function getCats(){
 global $con;
 $get_cats="select * from categories";
 $run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats)){


$cat_id=$row_cats['cat_id'];
$cat_title=$row_cats['cat_title'];

echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

}

}


function cart(){
    if(isset($_GET['add_cart']))  {
        global $con;
        $ip=getIp();
        $pro_id=$_GET['add_cart'];
        $check_pro="select * from cart where ip_add='$ip' and p_id='$pro_id'";

        $run_check=mysqli_query($con,$check_pro);
        if(mysqli_num_rows($run_check)>0){
            echo "";
        } 
        else{
            
            $insert_pro="insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
            $run_pro=mysqli_query($con,$insert_pro);
        
            echo "<script>window.open('index.php','_self')</script>";
        }

    }}


    function total_items(){
        if(isset($_GET['add_cart'])){
            global $con;
            $ip=getIp();

$get_items="select * from cart where ip_add='$ip'";
$run_items=mysqli_query($con,$get_items);
$count_items=mysqli_num_rows($run_items);
}
else {
    global $con;

    $ip=getIp();

    $get_items="select * from cart where ip_add='$ip'";
    $run_items=mysqli_query($con,$get_items);
    $count_items=mysqli_num_rows($run_items);

}
echo $count_items;

        }






        function total_price(){
            $total=0;
            global $con;
            $ip=getIp();
    
    
    $run_cart=mysqli_query($con,"select * from cart where ip_add='$ip'");

while($fetch_cart=mysqli_fetch_array($run_cart)){

    $pro_id=$fetch_cart['p_id'];

    $result_pro=mysqli_query($con,"select * from products where product_id='$pro_id'");
    while($fetch_product=mysqli_fetch_array($result_pro)){
        $product_price=array($fetch_product['product_price']);
        $product_title=$fetch_product['product_title'];
        $product_image=$fetch_product['product_image'];
        $single_price=$fetch_product['product_price'];
        $values=array_sum($product_price);
//getting quantity

        $run_qty= mysqli_query($con,"select * from cart where p_id='$pro_id'");
        $row_qty=mysqli_fetch_array($run_qty);
        $qty=$row_qty['qty'];
        $values_qty=$values *$qty;
        $total+=$values_qty;
    }

}
echo $total." (Tk)";

        }






    function getIp() {
        $ip = $_SERVER['REMOTE_ADDR'];
     
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
     
        return $ip;
    }







function getPro(){
    if(!isset($_GET['cat'])){
    global $con;

$get_pro="select * from products order by RAND() LIMIT 0,8";
$run_pro=mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro)){

    $vendor_id=$row_pro['vendor_id'];
    $get_shop="select * from vendors where vendor_id='$vendor_id' ";
    $run_shop=mysqli_query($con,$get_shop);
    while($row=mysqli_fetch_array($run_shop)){
        $s_name=$row['shop_name'];}
    $pro_id=$row_pro['product_id'];
    $pro_cat=$row_pro['product_cat'];
    $pro_title=$row_pro['product_title'];
    $pro_price=$row_pro['product_price'];
    $pro_desc=$row_pro['product_desc'];
    $pro_image=$row_pro['product_image'];

    echo "
    
    <div id='single_product'>

    <h3><a href='details.php?pro_id=$pro_id'style='float:left;color:white;'>$pro_title</a>
    </h3></br>
    <img src='admin_area/product_images/$pro_image'width='180'height='180'>
    
    <p></br><b>Price: Tk- $pro_price</b></p></br>
    <a href='shop_result.php?vendor_id=$vendor_id'style='float:left;color:white;'>$s_name</a>
    <a href='index.php?add_cart=$pro_id'><button style='float:right;color:black;background-color:#f53b57!important;'>Add to Cart</button></a>
    
    </div>
    
    ";

}
    }
}

// 
function getCatPro(){
    if(isset($_GET['cat'])){
        $cat_id=$_GET['cat'];
    global $con;

$get_cat_pro="select * from products where product_cat='$cat_id'";
$run_cat_pro=mysqli_query($con,$get_cat_pro);
$count_cats=mysqli_num_rows($run_cat_pro);

if($count_cats==0){
    echo "<h2 style='padding-top:190px;padding-bottom:190px;text-align:center;'>There is no product in this category</h2>";
 
}

else{
while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){


    $pro_id=$row_cat_pro['product_id'];
    $pro_cat=$row_cat_pro['product_cat'];
    $pro_title=$row_cat_pro['product_title'];
    $pro_price=$row_cat_pro['product_price'];
    $pro_desc=$row_cat_pro['product_desc'];
    $pro_image=$row_cat_pro['product_image'];

   
echo "
    
<div id='single_product'>
<h3>$pro_title</h3></br>
<img src='admin_area/product_images/$pro_image'width='180'height='180'>

<p></br><b>Price: $ $pro_price</b></p></br>
<a href='details.php?pro_id=$pro_id'style='float:left;color:white;'>Details</a>
<a href='index.php?pro_id=$pro_id'><button style='float:right;color:black;'>Add to Cart</button></a>

</div>
    
    ";

  }
}
}
}



?>