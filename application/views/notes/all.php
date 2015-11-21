<?php
    // CSS::link("style");
    // JS::file("script");
    foreach ($notes as $note) {
        echo "<p><a href='" . URL::link( "notes/detail/" . $note["id"] ) . "'>".$note["id"] . " - <b>" . $note["name"] . "</b></a></p>";
    }
    // URL::go("notes/detail/1");
    // echo URL::current(true);
?>