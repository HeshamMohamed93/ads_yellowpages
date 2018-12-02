<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;
use App\Models\Post;
use \Core\View;
/**
 * Description of Home
 *
 * @author Hesham Mohamed
 */
class Home extends \Core\Controller {
    

/**
     * home page with posts
     */
     public function index ()
    {
       $posts = Post::getAll();
       View::render('Home/index.php' , ['posts' => $posts]);
    }
    
}
