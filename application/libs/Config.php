<?php

class Config {
    private static $filename = "config.php";
    
    public static function get( $name ) {
        $data = include self::$filename;
        return $data[$name];
    }
}