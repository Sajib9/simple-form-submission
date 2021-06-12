<?php
require_once('application/model/buyerModel.php');
class ServerValidation{
    public function validate($value){
        $msg = '';

        if(empty($value['amount']) || !is_numeric($value['amount']) ){
            $msg .= "Amount should not be empty & have to be numeric";
        }
        if(empty($value['buyer_name']) || strlen($value['buyer_name']) > 20){
            $msg .= "Buyer should not be empty Or should not be more than 20 chars";
        }
        if(empty($value['receipt_id'])){
            $msg .= "receipt id should not be null";
        }
        if(empty($value['item'])){
            $msg .= "items should not be null";
        }
        if(empty($value['email']) || !filter_var($value['email'], FILTER_VALIDATE_EMAIL)){
            $msg .= "Email should not be empty Or Invalid email";
        }
        if(empty($value['note']) || str_word_count($value['note']) > 30){
            $msg .= "Note should not be empty Or should not be more than 30 words";
        }
        if(empty($value['city']) || strlen($value['city']) > 20){
            $msg .= "city should not be empty Or should not be more than 20 words";
        }
        if(empty($value['phone']) || !is_numeric($value['phone'])){
            $msg .= "phone should not be empty Or should be numeric";
        }
        if(empty($value['enter_by']) || !is_numeric($value['enter_by'])){
            $msg .= "enter by should not be empty Or should be numeric";
        }

        if(empty($msg)){
            return ['resp_code' => 0, 'code'=> 200, 'message' => 'ok'];
        }else{
            return ['resp_code' => 1, 'code'=> 422, 'message' => $msg];
        }



    }

}

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