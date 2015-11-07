<?php

class Controller {
    public $view;
    
    public function __construct() {
        $this->view = new View();
    }
    
    public function model($name, $propName = '') {
        if ( $propName != ' ' && $propName != '' ) {
            $prop = $propName;
        } else {
            $prop = $name;
        }
        
        $this->{$prop} = new $name;
    }
    
    public function render($name, $data = array()) {
        $this->view->render($name, $data);
    }
}