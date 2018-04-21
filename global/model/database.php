<?php

class dataBase{
    
    public static $_instance;
    
    public static function getHandler(){
        
        $host = "localhost";
        $dbname = "global_store";
        $charset = "utf8";
        $user = "root";
        $password = "";
        
        if ( !isset( self::$_instance ) ) {
            self::$_instance = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset",$user, $password);
        }
        return self::$_instance;
    }
}
?>