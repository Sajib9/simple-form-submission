<?php

class DatabaseConnection{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'buyer_receipt';
    public $connection;

    public function __construct(){
        $this->connection = $this->databaseConnection();
    }

    public function databaseConnection(){
        $connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $connection;
    }

}