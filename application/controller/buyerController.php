<?php
require_once('application/model/buyerModel.php');


class BuyerInfo{
    public function buyers_info($data){
        //$salt = '$' . $data['email'] . '=$' . $data['amount'] . '$' . $data['city'];
        $salt = substr(md5(uniqid(rand(), TRUE)), 0, 5);
        $amount = $data['amount'];
        $buyer_name = $data['buyer_name'];
        $receipt_id = $data['receipt_id'];
        $item = implode("|",$data['item']);
        $email = $data['email'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $note = $data['note'];
        $city = $data['city'];
        $phn = "0".$data['phone'];
        $hash = hash('sha512', $salt.$data['receipt_id']);
        //$hash = crypt($data['receipt_id'], $salt);
        $date = date("Y-m-d");
        $entry_by = $data['enter_by'];


        $buyer_model = new BuyerModel();

        $insertId = $buyer_model->store($amount,$buyer_name,$receipt_id,$item,$email,$ip,$note,$city,$phn,$hash,$date,$entry_by);
        return $insertId;

    }

    public function allInfo(){
        $buyer_model = new BuyerModel();
        $getInfo = $buyer_model->getInfo();
        if(!empty($getInfo))
            return $getInfo;
        else
            return "No data Found";

    }

}