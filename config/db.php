<?php
class Database{
    public static function connect(){
        // $db = new mysqli('localhost', 'francisco', 'tu_contrasena', 'pilaresDB');
        $db = new mysqli('localhost', 'root', '', 'pilaresDB');

        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
?>
