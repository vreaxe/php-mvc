<?php

class View {
    public function render($name, $data = array()) {
        $filename = "application/views/". $name .".php";
        if ( file_exists( "./" . $filename ) ) {
            extract($data);
            include_once("./" . $filename);
        } else {
            $msg = "Error!! {$filename} doesn't exist.";
            include_once("./application/views/" . TEMPLATE_COMMON_ERROR . ".php");
        }
    }
}