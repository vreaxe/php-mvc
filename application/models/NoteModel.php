<?php

class NoteModel extends Model {
    // public $table = "notes";
    
    public function all() {
        $resultado = $this->query("SELECT * FROM notes");
        return $resultado;
    }
    
    public function getOneById( $id ) {
        $resultado = $this->queryOne("SELECT * FROM notes WHERE id = " . $id);
        return $resultado;
    }
}