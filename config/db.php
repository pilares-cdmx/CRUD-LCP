<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'produccion', '%C2R2B1N2d32MBR0S10%', 'pilaresDB');
        // $db = new mysqli('localhost', 'root', '', 'pilaresDB');

        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
?>
