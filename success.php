<?php

include("includes/db.php");

     
     global $con;
   
    
echo "Succeddd\n";

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("cseku634245451293e");
$store_passwd=urlencode("cseku634245451293e@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;
    



		

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;
    // echo print_r($result, true);

	echo "<script>alert('Order placed successfully!')</script>";
	
	echo "<script>window.open('index.php','_self')</script>";

    //echo $status." ".$tran_id." ".$tran_date." ".$amount." ".$card_type;
	$sql = "update orders set date='$tran_date'where transaction_id='$tran_id'";
	mysqli_query($con,$sql);
	$run_cart=mysqli_query($con,"select * from orders where transaction_id='$tran_id'");

	while($fetch_cart=mysqli_fetch_array($run_cart)){
	
		$t_id=$fetch_cart['transaction_id'];
		$o_id=$fetch_cart['id'];
	}
		$run_cartt=mysqli_query($con,"select * from cart ");
   
while($fetch_cartt=mysqli_fetch_array($run_cartt)){

    $pro_id=$fetch_cartt['p_id'];
        $run_qty= mysqli_query($con,"select * from cart where p_id='$pro_id'");
        $row_qty=mysqli_fetch_array($run_qty);
        $qty=$row_qty['qty'];
		$sql = "INSERT INTO order_new (order_id,pro_id,qty)
		VALUES ('$o_id','$pro_id','$qty')";
	mysqli_query($con,$sql);
	

}
} else {

	echo "Failed to connect with SSLCOMMERZ";
}


