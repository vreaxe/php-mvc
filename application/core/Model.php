<?php

class Model extends PDO {
    public $table = null;
    // move $db to another class named Db
    public $db = null;
    
    public function __construct() {
        $this->connect();
        $this->setTable();
    }
    
    public function setTable() {
        if ( $this->table == null ) {
            $className = strtolower( get_called_class() );
            $table = substr($className, 0, -5);
            $this->table = $table;
        }
    }
    
    public function connect() {
        try {
            $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    
    public function query( $sql = '' ) {
        $sql = $this->db->prepare( $sql );
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }
    
    public function queryOne( $sql = '' ) {
        $sql = $this->db->prepare( $sql );
        $sql->execute();
        $result = $sql->fetch();
        return $result;
    }
}