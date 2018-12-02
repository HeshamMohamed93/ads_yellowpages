<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use PDO;

/**
 * Description of Comment
 *
 * @author Hesham Mohamed
 */
class Comment extends \Core\Model {

    /**
     * add comment to post
     * 
     * @param int $post_id
     * @param string $comment
     * @param string $username
     * @return boolean
     */
    public static function insert_comment($post_id, $comment, $username) {

        // construct SQL insert statement
        $db = static::getDB();
        $sql = "INSERT INTO comments(post_id  , comment , username)
    VALUES(?,?,?)";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$post_id, $comment, $username]);

        if ($result === false) {

            return false;
        } else {
            return true;
        }
    }

    /**
     * get comment by post id
     * 
     * @param type $post_id
     * @return type
     */
    public static function getCommentById($post_id) {

       
        try {
            $db = static::getDB();
            $stmt = $db->prepare('select comment , username , created_at from comments where comments.status = 1 and comments.post_id = :postid');
            $stmt->execute(array('postid' => $post_id));

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * update the comment status change it to 1 if it's confirmed by admin
     * @param type $id
     * @return boolean
     */
    public static function update_comment_status($id) {


        
        $db = static::getDB();
        $sql = "UPDATE comments SET status = 1   where id=?";
        $stmt = $db->prepare($sql);

        $result = $stmt->execute([$id]);

        if ($result === false) {

            return false;
        } else {

            return true;
        }
    }

    /**
     * get comments based on it's status 0 if not confirmed and 1 if confirmed 
     * @param int $status
     * @return type
     */
    public static function get_comment_status($status) {


        
        try {
            $db = static::getDB();
            $stmt = $db->prepare('select id , comment , username , created_at from comments where comments.status = :status');
            $stmt->execute(array('status' => $status));

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
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
      
         $stmt =   $db->prepare('DELETE FROM comments WHERE id = :commentid');
         $stmt->execute(array('commentid' => $id));  
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}
