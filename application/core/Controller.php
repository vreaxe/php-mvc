<?php

class Controller {
    public $view;
    public $header;
    public $footer;
    
    public function __construct() {
        $this->view = new View();
        $this->header = Config::get('templateHeader');
        $this->footer = Config::get('templateFooter');
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
        if ( trim( $this->header ) != "" ) {
            $this->view->render($this->header, $data);
        }
        
        $this->view->render($name, $data);
        
        if ( trim( $this->footer ) != "" ) {
            $this->view->render($this->footer, $data);
        }
    }
}