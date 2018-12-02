<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--<html>
    <head>
        <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../../public/css/custom.css" >
    <title>Page Title</title>
    </head>-->

<?php include '../public/assest/header.php'; ?>
    <body>
       
         <div>
        <ul class="postsbar">
            <?php session_start(); if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
           <li><a class="active" href=""><?php echo Welcome . ' ' .$_SESSION['username'] ?></a> </li>
  <li class="rightpos"><a class="" href="http://localhost/ads_yellowpages/public/Users/logout" >Logout</a></li>
  <li><a class="" href="http://localhost/ads_yellowpages/public/users/index">Home</a></li>
   <li><a class="" href="http://localhost/ads_yellowpages/public/Posts/create">Create Posts</a></li>
   <li><a class="" href="http://localhost/ads_yellowpages/public/comments/nonconfirmed">Confirm Comments</a></li>
   <?php else: ?>
  <li><a class="active" href="http://localhost/ads_yellowpages/public/Users/login">Login</a></li>
   <?php endif; ?>
    </ul> 

        
        
    </div>
        
         <section>
             
            <div>
           
            <ul class="list-group">
                <?php  foreach($comments as $comment): ?>
                <div class="mycomment">
                    <div class="col-sm-8">
                <div class="panel panel-default">
              <div class="panel-heading">
                  <strong><?php echo $comment['username'];  ?></strong> <span class="text-muted"><?php echo $comment['created_at'];  ?></span>
              </div>
                    <div class="panel-body">
                <li class="list-group-item"><?php echo $comment['comment'];  ?></li>
                <a href="http://localhost/ads_yellowpages/public/comments/<?php echo $comment['id'];  ?>/delete"><button type="button" class="btn btn-danger">Delete</button></a>
                 <a href="http://localhost/ads_yellowpages/public/comments/<?php echo $comment['id'];  ?>/confirm"><button type="button" class="btn btn-success">Confirm</button></a>
                </div>
                </div></div>
             
                </div>
                <?php            endforeach;?>
            </ul>
            
            
        </div>
        
        </section>
        
        
    </body>
</html>
