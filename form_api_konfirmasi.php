<?php
//ob_start();

$apiKey ='0cf7837f1460138d59c29be1252e37a2'; // Your api key
$merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null; 
$amount = isset($_POST['amount']) ? $_POST['amount'] : null; 
$merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null; 
$productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null; 
$additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null; 
$paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null; 
$resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null; 
$merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null; 
$reference = isset($_POST['reference']) ? $_POST['reference'] : null; 
$signature = isset($_POST['signature']) ? $_POST['signature'] : null; 

if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
{
    $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
    $calcSignature = md5($params);

    if($signature == $calcSignature)
    {
        //Your code here
        
	if($resultCode == "00")
	{
    require_once 'koneksi.php';
	   echo "SUCCESS"; // Save to database
	   $sql="INSERT INTO pembayaran (merchantCode,amount,merchantOrderId,productDetail,paymentCode,resultCode,merchantUserId,reference,signature)VALUES('$merchantCode','$amount','$merchantOrderId','$productDetail','$paymentMethod','$resultCode','$merchantUserId ','$reference','$signature')";

     mysqli_query($conn,$sql);
   	}
	else
        {
            echo "FAILED"; // Please update the status to FAILED in database
        }
    }
    else
    {
        throw new Exception('Bad Signature');
    }
}
else
{
    throw new Exception('Bad Parameter');
}
?>