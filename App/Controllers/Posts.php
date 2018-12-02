<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;
use App\Models\Post;
use App\Models\Comment;

use Core\View;

/**
 * Description of Posts
 *
 * @author Hesham Mohamed
 */
class Posts extends \Core\Controller {
    
    public function __construct($route_params) {
          
        parent::__construct($route_params);
     
        
    }
   
      

    
    public function create() 
    {
         if($this->validateSession()== true){
      
        if($this->route_params['id'])
        {
           $post = Post::getbyID($this->route_params['id']);
           
           View::render('Home/edit.php' , ['post' => $post]);
        }
        else {
        View::render('Home/create.php');
        }
         }
    }
    
    
    public function show() 
    {
      
        $id =  $this->route_params['id'];
        $post = Post::getbyID($id);
        $comments = Comment::getCommentById($id);
 
         View::render('Home/show.php', ['post' => $post , 'comments'=>$comments]);

    }


    public function edit() 
    {
         if($this->validateSession() == true){
      
        $filename = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $location = "../public/images/";
        move_uploaded_file($tmp_name, $location.$filename);
        echo $filename;

        $post = Post::insert_post($_POST['title'], $filename);
        
        header('Location: http://localhost/ads_yellowpages/public/users/index');
         }

    }
    
    public function delete()
    {
        if($this->validateSession()){
        $id =  $this->route_params['id'];
        
        $post = Post::delete($id);
       header('Location: http://localhost/ads_yellowpages/public/users/index');
        }
         
    }
    
    
    
    public function update() 
    {
       
       if($this->validateSession() == true ){
 
        $filename = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $location = "../public/images/";
        move_uploaded_file($tmp_name, $location.$filename);
        echo $filename;

        $post = Post::update_post($_POST['title'], $filename , $_POST['id']);
        
        header('Location: http://localhost/ads_yellowpages/public/users/index');
       }

    }
    

    
}
