<?php

class CSS {
    public static function file( $name ) {
        $css = file_get_contents( "./public/css/" . $name . ".css" );
        $css = self::compress( $css );
        echo "<style type='text/css'>" . $css . "</style>";
    }
    
    public static function link( $name ) {
        echo '<link rel="stylesheet" href="../../public/css/' . $name . '.css" type="text/css">';
    }
    
    // http://snippetrepo.com/snippets/simple-php-css-js-minifier
    public static function compress( $css ) {
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        $css = str_replace(["\r\n","\r","\n","\t",'  ','    ','     '], '', $css);
        $css = preg_replace(['(( )+{)','({( )+)'], '{', $css);
        $css = preg_replace(['(( )+})','(}( )+)','(;( )*})'], '}', $css);
        $css = preg_replace(['(;( )+)','(( )+;)'], ';', $css);
        return $css;
    }
}