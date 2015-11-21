<?php

class Router {
    public $view;
    
    public function __construct() {
        $this->view = new View();
        $this->parser();
    }
    
    public function parser() {
        $url = explode ( "/", rtrim( $_GET["url"], "/" ) );

        if ( $url[0] ) {
            $controller = $url[0];
        } else {
            $controller = Config::get("mainController");
        }
        
        if ( $url[1] ) {
            $method = $url[1];
        } else {
            $method = Config::get("mainMethodEachController");
        }
        
        $params = array();
        if ( $url[2] ) {
            $params = array_slice( $url, 2 );
        }
        
        $controller = ucfirst( $controller );
        
        if ( class_exists($controller) ) {
            $disp = new $controller();
            if ( method_exists( $disp, $method ) ) {
                call_user_func_array( array( $disp, $method ), $params );
            } else {
                $this->view->render( Config::get("templateError404") );
            }
        } else {
            $this->view->render( Config::get("templateError404") );
        }
    }
}