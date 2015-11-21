<?php

class Notes extends Controller {
    public function index() {
        $this->model("NoteModel", "notes");
        $notes = $this->notes->all();
        $title = "Notes list";
        // change default footer template
        $this->footer = "common/footer2";
        $this->render("notes/all", compact("title", "notes"));
    }
    
    public function detail( $id ) {
        Log::warning("test");
        Log::info("test2", "testnew");
        $this->model("NoteModel");
        $note = $this->NoteModel->getOneById( $id );
        $title = "Notes detail";
        // remove header template
        $this->header = "";
        $this->render("notes/detail", compact("title", "note"));
    }
}

?>
