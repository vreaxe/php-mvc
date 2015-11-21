<?php

class Db extends PDO {
    public $db = null;
    
    public function __construct() {    
        $this->connect();
    }
    
    public function connect() {
        try {
            $this->db = new PDO('mysql:host='.Config::get("dbHost").';dbname='.Config::get("dbName"), Config::get("dbUser"), Config::get("dbPassword"));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
}