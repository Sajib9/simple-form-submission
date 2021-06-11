<?php
require_once('application/config/database.php');

class BuyerModel{
    public function store($amount,$buyer_name,$receipt_id,$item,$email,$ip,$note,$city,$phn,$hash,$date,$entry_by){
        $conn = new DatabaseConnection();

        $this->conn = $conn->databaseConnection();

        $query = "INSERT INTO buyers (amount, buyer_name, receipt_id, item, email, buyer_ip, note, city, phone, hash_key, entry_at, enter_by) VALUES ('".$amount."', '".$buyer_name."', '".$receipt_id."', '".$item."', '".$email."', '".$ip."', '".$note."', '".$city."', '".$phn."', '".$hash."', '".$date."', '".$entry_by."')";

        $sql = $this->conn->prepare($query);
        $sql->execute();
        $insertId = $sql->insert_id;
        return $insertId;

    }
}