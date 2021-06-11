<?php
require_once('application/controller/buyerController.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validate = new ServerValidation();
    $validate_result =$validate->validate($_POST);

    if($validate_result['resp_code'] == 1){
        echo json_encode($validate_result);
    }else{
        $buyer = new BuyerInfo();
        if(empty($_COOKIE['buyer_receipt']) || $_COOKIE['buyer_receipt'] = 2021){
            $lastInsertedId = $buyer->buyers_info($_POST);
            if($lastInsertedId){
                setcookie('buyer_receipt', 2021, time()+86400);
                echo json_encode(['resp_code' => 0, 'message' => 'Receipt has been Created successfully.']);
            }
        }else{
            echo json_encode(['resp_code' => 1, 'message' => 'You can not Created another receipt within 24 hours']);

        }
    }
}
