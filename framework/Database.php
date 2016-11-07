<?php
namespace Framework;

class Database
{
    private static $instance;
//googlaj singleton pattern
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function getConnection() {
        try
        {
            $DB_host = 'localhost';
            $DB_user = 'root';
            $DB_pass = '';
            $DB_name = 'file_vault_db';

           // $hash_password= hash('sha256', $password); //Password encryption
            $conn = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "ERROR : ".$e->getMessage();
        }

        return $conn;
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}