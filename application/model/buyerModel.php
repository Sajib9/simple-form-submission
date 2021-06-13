<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/simple-form-submission/application/config/database.php');

class BuyerModel{

    public function dataValidation($value){
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
            return ['resp_code' => 0, 'message' => 'ok'];
        }else{
            return ['resp_code' => 1, 'message' => $msg];
        }


    }

    public function store($amount,$buyer_name,$receipt_id,$item,$email,$ip,$note,$city,$phn,$hash,$date,$entry_by){
        $conn = new DatabaseConnection();

        $this->conn = $conn->databaseConnection();

        $query = "INSERT INTO buyers (amount, buyer_name, receipt_id, item, email, buyer_ip, note, city, phone, hash_key, entry_at, enter_by) VALUES ('".$amount."', '".$buyer_name."', '".$receipt_id."', '".$item."', '".$email."', '".$ip."', '".$note."', '".$city."', '".$phn."', '".$hash."', '".$date."', '".$entry_by."')";

        $sql = $this->conn->prepare($query);
        $sql->execute();
        $insertId = $sql->insert_id;
        return $insertId;

    }

    public function getInfo(){
        $conn = new DatabaseConnection();
        $this->conn = $conn->databaseConnection();

        $sql = "SELECT * FROM buyers ORDER BY id";
        $result = $this->conn->query($sql);

        $resultset = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }

    public function searchByUserId($user_id){
        $conn = new DatabaseConnection();
        $this->conn = $conn->databaseConnection();

        $query = "SELECT * FROM buyers WHERE enter_by = $user_id";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        $result = $sql->get_result();
        $resultset = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
        
    }
    public function allSearch($user_id,$from,$to){
        $conn = new DatabaseConnection();
        $this->conn = $conn->databaseConnection();

        $query = "SELECT * FROM buyers WHERE entry_at >= '$from'  AND entry_at <= '$to' AND enter_by = $user_id ";

        $sql = $this->conn->prepare($query);
        $sql->execute();
        $result = $sql->get_result();
        $resultset = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }
}