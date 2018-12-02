<?php   

namespace Core;
use PDO;

abstract class Model {

/**
 * connect to database using PDO here is using single tone design pattern
 * @staticvar type $db
 * @return PDO
 */
    protected static function getDB()
    {
        static $db = null;
        if($db === null)
        {
            $host = "localhost";
            $username = "root";
            $dbname = "ads_yellowpages";
            $password = "mysql";

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username , $password);
             
                return $db;
            }catch (PDOException $e)
            {
                echo $e->getMessage();
            }

        } 
    }
}










?>