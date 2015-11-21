<?php

class Model extends Db {
    public $table = null;
    
    public function __construct() {
        parent::__construct();
        $this->setTable();
    }
    
    public function setTable() {
        if ( $this->table == null ) {
            $className = strtolower( get_called_class() );
            $table = substr($className, 0, -5);
            $this->table = $table;
        }
    }
    
    public function query( $sql = '' ) {
        $sql = $this->db->prepare( $sql );
        $sql->execute();
        if ( $sql->rowCount() == 1 ) {
            $result = $sql->fetch();
        } else {
            $result = $sql->fetchAll();
        }
        return $result;
    }
    
    public function queryOne( $sql = '' ) {
        $sql = $this->db->prepare( $sql );
        $sql->execute();
        $result = $sql->fetch();
        return $result;
    }
}