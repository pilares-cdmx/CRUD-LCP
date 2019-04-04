<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'pilaresDevSergio', '%C2MB10cl1m2t1c0%', 'pilaresDB');

        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
?>
