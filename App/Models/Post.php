<?php 

namespace App\Models;

use PDO;

class Post extends \Core\Model {


    /**
     * get all posts
     * 
     * @return array
     */
    public static function getAll()
    {
      

        try {
           $db = static::getDB();
           
            $stmt = $db->query('select id , title , image_name , created_at from posts order  by created_at');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
     /**
     * get post by id
     * 
     * @param int $id
     * @return array
     */
    public static function getbyID($id)
    {
      

        try {
           $db = static::getDB();
         $stmt =   $db->prepare('select id , title , image_name , created_at from posts where id = :postid');
         $stmt->execute(array('postid' => $id));  
       
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    /**
     * insert post
     * 
     * @param type $title
     * @param type $image_name
     * @return boolean
     */
   public static function insert_post($title ,$image_name ){

 
 $db = static::getDB();
 $sql = "INSERT INTO posts(title , image_name)
    VALUES(?,?)";
 $stmt =   $db->prepare($sql);
 $result = $stmt->execute([$title, $image_name]);
 
 if($result === false){

 return false;
 }else{
 return true;
 }
}



/**
 * update existing post using post id
 *  
 * @param string $title
 * @param string $image_name
 * @param int $id
 * @return boolean
 */
 public static function update_post($title ,$image_name , $id ){

    
 // construct SQL insert statement
 $db = static::getDB();
 $sql = "UPDATE posts SET title=? , image_name=? where id=?";
 $stmt =   $db->prepare($sql);

 $result = $stmt->execute([$title, $image_name , $id]);

 if($result === false){

 return false;
 }else{

 return true;
 }
}




/**
 * delete post using post id
 * @param int $id
 * @return type
 */
public static function delete($id)
    {
      

        try {
           $db = static::getDB();
      
         $stmt =   $db->prepare('DELETE FROM posts WHERE id = :postid');
         $stmt->execute(array('postid' => $id));  
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }


}








?>