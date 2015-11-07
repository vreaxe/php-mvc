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
            $controller = MAIN_CONTROLLER;
        }
        
        if ( $url[1] ) {
            $method = $url[1];
        } else {
            $method = MAIN_METHOD_EACH_CTRL;
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
                $this->view->render( TEMPLATE_ERROR_404 );
            }
        } else {
            $this->view->render( TEMPLATE_ERROR_404 );
        }
    }
}