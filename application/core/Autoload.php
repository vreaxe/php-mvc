<?php

class Autoload {
    public static function load( $classname ) {
        if ( file_exists( "./application/core/". $classname .".php" ) ) {
            $filename = "./application/core/". $classname .".php";
            include_once($filename);    
        } else if ( file_exists( "./application/controllers/". $classname .".php" ) ) {
            $filename = "./application/controllers/". $classname .".php";
            include_once($filename);    
        } else if ( file_exists( "./application/models/". $classname .".php" ) ) {
            $filename = "./application/models/". $classname .".php";
            include_once($filename);    
        } else if ( file_exists( "./application/libs/". $classname .".php" ) ) {
            $filename = "./application/libs/". $classname .".php";
            include_once($filename);    
        }
    }
}

spl_autoload_register( 'Autoload::load' );