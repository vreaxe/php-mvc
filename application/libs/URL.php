<?php

class URL {
    public static function go( $url ) {
        header("Location: " . self::domain( true ) . "/" . $url);
        die();
    }
    
    public static function link( $url ) {
        return self::domain( true ) . "/" . $url;
    }
    
    public static function current( $withHttp = false ) {
        return self::domain( $withHttp ) . $_SERVER['REQUEST_URI'];
    }
    
    public static function domain( $withHttp = false ) {
        $domain = "";
        if ( $withHttp == true ) {
            $domain .= $_SERVER['REQUEST_SCHEME'] . "://";
        }
        $domain .= $_SERVER['SERVER_NAME'];
        return $domain;
    }
}