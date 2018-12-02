<?php

namespace App\Models;

use PDO;

class User extends \Core\Model {

     /**
     * check login of user if username and password are matched
     * 
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public static function login($username, $password) {


        try {
            $db = static::getDB();
            $stmt = $db->prepare('select * from users where user_name = :username and password = :password limit 1');
            $stmt->execute(array('username' => $username, 'password' => $password));

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $count = $stmt->rowCount();
            if ($count == 1) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

   
}

?>