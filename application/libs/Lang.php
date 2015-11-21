<?php

class Lang {
    public static function get( $location ) {
        $location = trim( $location );
        $folder = Config::get( "language" );
        $names = explode( ".", $location );
        $filename = $names[0];
        $trad = include "application/lang/" . $folder . "/" . $filename . ".php";
        // DELETE THE FILENAME OF THE ARRAY
        unset( $names[0] );
        
        foreach ( $names as $name ) {
            if (isset($trad[$name])) {
                $trad = $trad[$name];
            }
        }
        
        return utf8_decode( $trad );
    }
}