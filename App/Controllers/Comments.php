<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use App\Models\Comment;
use Core\View;

/**
 * Description of Comments
 *
 * @author Hesham Mohamed
 */
class Comments extends \Core\Controller {
    
    
    public function __construct($route_params) {
          
        parent::__construct($route_params);
        
        
    }
    
    
    /**
     * add new post
     */
    
    public function add() 
    {
       
        $comment = Comment::insert_comment($_POST['post_id'], $_POST['comment'] , $_POST['username']);
        
        header('Location: http://localhost/ads_yellowpages/public/posts/'.$_POST['post_id'].'/show');
         

    }
    
    /**
     * get non confirmed comments
     */
    public function nonconfirmed() 
    {
     
 
        $comments = Comment::get_comment_status(0);
        
       View::render('admin/comment_check.php', ['comments'=>$comments]);
         

    }
    
    /**
     * confirm comments by admin
     */
    public function confirm() 
    {
     
 
        if($this->validateSession()){
        $id =  $this->route_params['id'];
         $comment = Comment::update_comment_status($id);
     
       header('Location: http://localhost/ads_yellowpages/public/comments/nonconfirmed');
        }
         

    }
    
    
    /**
     * delete comment by admin
     */
    public function delete()
    {
        
        if($this->validateSession()){
        $id =  $this->route_params['id'];
         $comment = Comment::delete($id);
     
       header('Location: http://localhost/ads_yellowpages/public/comments/nonconfirmed');
        }
         
    }
    
    
    

    
}
