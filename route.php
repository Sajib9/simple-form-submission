<?php
require_once('application/controller/buyerController.php');
require_once('application/model/buyerModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['amount'])) {
    $validate = new BuyerModel();
    $validate_result =$validate->dataValidation($_POST);

    if($validate_result['resp_code'] == 1){
        echo json_encode($validate_result);
    }else{
        $buyer = new BuyerInfo();
        if(empty($_COOKIE['buyer_receipt']) || $_COOKIE['buyer_receipt'] == 2021){
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

if(!empty($_POST['user_id_search'])){
    $user_id = $_POST['user_id_search'];
    $obj = new BuyerInfo();
    $searchResult = $obj->searchByUserId($user_id);

    echo json_encode($searchResult);


}


