<?php

class DataBase{
    private static $host_name = 'localhost';
    private static $dbname = 'abcsalles';
    private static $user_name = 'root';
    private static $password = '1234';

    private static $connection = null;

    public static function Connect()
    {
        try {
            self::$connection = new PDO("mysql:host=".self::$host_name.";dbname=".self::$dbname,
             self::$user_name, self::$password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (PDOException $e) {
            echo "Erreur!: " . $e->getMessage() . "<br/>";
            die();
        }

        return self::$connection;
    }

    public static function Disconnect(){
        self::$connection = null;
    }
}

// DataBase::Connect();


?>