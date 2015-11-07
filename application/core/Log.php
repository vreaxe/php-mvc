<?php

class Log {
    private static $filename = "logs";
    private static $folder = "logs";
    private static $now;
    
    private function setNow() {
        self::$now = date("d/m/Y H:i:s");
    }
    
    private function checkIfExistsFolder() {
        if (!file_exists(self::$folder)) {
            mkdir(self::$folder, 0777, true);
        }
    }
    
    private function generate($type, $msg, $differentFilename = '') {
        if ( $differentFilename != ' ' && $differentFilename != '' ) {
            $filename = $differentFilename;
        } else {
            $filename = self::$filename;
        }
        
        $file = fopen(self::$folder . "/" . $filename . ".txt", "a");
        $txt = "[" . $type . "] " . self::$now . " - " . $msg . "\n\n";
        fwrite($file, $txt);
        fclose($file);
    }
    
    public static function __callStatic($name, $args) {
        if ( ENABLE_LOGS == 1 ) {
            self::checkIfExistsFolder();
            self::setNow();
            
            self::generate(strtoupper($name), $args[0], $args[1]);
        }
    }
}