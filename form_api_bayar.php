<?php
  error_reporting( ~E_NOTICE ); // avoid notice
  
require 'koneksi.php';
$value_1='nama';
$value_2='email';
$value_3='metode_bayar';
$value_4='keterangan_antar'; //product detail
$value_5='nomor'; // nomor hp
$value_6='harga';
ob_start();

//mendefine kan variabel di atas dengan sederhana
$value_1='nama'; // data ini tidak di simpan ke DB, tapi digunakan untuk pengolahan informasi
$value_2='email';
$value_3='metode_bayar';
$value_4='keterangan_antar'; //product detail ketrangan antar kuganti nama, karena bisa di olah DB duitku.com
$value_5='nomor'; //nomor hp
$value_6='harga';

    $merchantCode = 'D6606'; // from duitku
    $merchantKey = '0cf7837f1460138d59c29be1252e37a2'; // from duitku
    $paymentAmount = $_COOKIE[$value_6];
    $paymentMethod = $_COOKIE[$value_3]; // VC = Credit Card
    $customerVaName = $_COOKIE[$value_1];; // display name on bank confirmation display
    $merchantUserId = $_COOKIE[$value_2];; // aku samain dengan email
    $merchantOrderId = time() . ''; // from merchant, unique
    $productDetails = $_COOKIE[$value_4];;
    $email = $_COOKIE[$value_2];; // your customer email
    $phoneNumber = $_COOKIE[$value_5];; // your customer phone number (optional)
    // $additionalParam = ''; // optional
    // $merchantUserInfo = ''; // optional
    $callbackUrl = 'https://nayfatravel.000webhostapp.com/form_api_konfirmasi.php'; // url for callback
    $returnUrl = 'https://nayfatravel.000webhostapp.com/index.php'; // url for redirect
    $expiryPeriod = 10; // set the expired time in minutes
    $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);
    //$vaNumber = 'John Doe';


   $params = array(
        'merchantCode' => $merchantCode,
        'paymentAmount' => $paymentAmount,
        'paymentMethod' => $paymentMethod,
        'merchantUserId' => $merchantUserId,
        'merchantOrderId' => $merchantOrderId,
        'productDetails' => $productDetails,
        'email' => $email,
        'additionalParam' => $additionalParam,
        'merchantUserInfo' => $merchantUserInfo,
        'customerVaName' => $customerVaName,
        'phoneNumber' => $phoneNumber,
        'itemDetails' => $itemDetails,
        'customerDetail' => $customerDetail,
        'callbackUrl' => $callbackUrl,
        'returnUrl' => $returnUrl,
        'signature' => $signature,
        'expiryPeriod' => $expiryPeriod,
      //  'vaNumber' => $vaNumber        

    );

    $params_string = json_encode($params);
    echo $params_string;
    $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
    // $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($params_string))                                                                       
    );   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    //execute post
    $request = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpCode == 200)
    {
        $result = json_decode($request, true);
        header('location: '. $result['paymentUrl']);
        echo "paymentUrl :". $result['paymentUrl'] . "<br />";
        echo "merchantCode :". $result['merchantCode'] . "<br />";
        echo "reference :". $result['reference'] . "<br />";
        echo "merchantUserId :". $result['merchantUserId'] . "<br />";
        
       // echo "vaNumber :". $result['vaNumber'] . "<br />";
        echo "amount :". $result['amount'] . "<br />";
        echo "statusCode :". $result['statusCode'] . "<br />";
        echo "statusMessage :". $result['statusMessage'] . "<br />";
    }
    else
        echo $httpCode;
?>