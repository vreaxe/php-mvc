<?php

class JS {
    public static function file( $name ) {
        $js = file_get_contents( "./public/js/" . $name . ".js" );
        $js = self::compress( $js );
        echo "<script type='text/javascript'>" . $js . "</script>";
    }
    
    public static function script( $name ) {
        echo '<script type="text/javascript" src="../../public/js/' . $name . '.js"></script>';
    }
    
    // http://snippetrepo.com/snippets/simple-php-css-js-minifier
    public static function compress( $js ) {
        $js = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $js);
        $js = str_replace(["\r\n","\r","\t","\n",'  ','    ','     '], '', $js);
        $js = preg_replace(['(( )+\))','(\)( )+)'], ')', $js);
        return $js;
    }
}