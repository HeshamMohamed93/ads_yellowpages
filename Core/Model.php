<?php   

namespace Core;
use PDO;

abstract class Model {


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
             //   $stmt = $db->query('select id , title , content , created_at from posts order  by created_at');
              //  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $db;
            }catch (PDOException $e)
            {
                echo $e->getMessage();
            }

        } 
    }
}










?>