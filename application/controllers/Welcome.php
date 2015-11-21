<?php

class Welcome extends Controller {
    public function index() {
        $title = "Another Simple PHP MVC Framework";
        $this->render("welcome/index", compact("title"));
    }
}