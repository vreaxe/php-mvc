<?php

class Notes extends Controller {
    public function index() {
        $this->model("NoteModel", "notes");
        $notes = $this->notes->all();
        $title = "Notes list";
        $this->render("notes/all", compact("title", "notes"));
    }
    
    public function detail( $id ) {
        Log::warning("test");
        Log::info("test2", "testnew");
        $this->model("NoteModel", "notes");
        $note = $this->notes->getOneById( $id );
        $title = "Notes detail";
        $this->render("notes/detail", compact("title", "note"));
    }
}

?>
