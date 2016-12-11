<?php
class DB {

    private static $_instance;

    public static function get() {
        $host    = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "world";
        if(!isset(self::$_instance)) {
            self::$_instance = new mysqli($host,$db_user,$db_pass,$db_name);
            if(mysqli_connect_errno()) {
                trigger_error('Connection failed: '.self::$_instance->error);
            }
        }
        return self::$_instance;
    }
}
?>