<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', 'S2NT2m2r2d0n2...', 'pilaresDB');

        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
?>
