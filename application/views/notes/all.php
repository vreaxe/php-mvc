<!DOCTYPE html>
<html>
    <title><?php echo $title; ?></title>
    <body>
    <?php
        foreach ($notes as $note) {
            echo "<p>".$note["id"] . " - <b>" . $note["name"] . "</b></p>";
        }
    ?>
    </body>
</html>