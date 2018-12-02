<?php 


namespace App\Controllers;
use App\Models\User;
use App\Models\Post;
use Core\View;



class Users extends \Core\Controller
{

 
    
    
    
     public function index ()
    {
        $posts = Post::getAll();
        View::render('admin/admin_dashboard.php', ['posts' => $posts]);

    }
    
    


    public function login ()
    {
    
        
          $login = User::login($_POST['user_name'] , $_POST['password']);
    
        if($login != false)
        {
            session_start();
            $_SESSION['username'] = $login[0]['user_name'];
            $_SESSION['user_id'] = $login[0]['user_id'];
          header('Location: http://localhost/ads_yellowpages/public/users/index');
            
            
        }else {
            echo 'please enter you username and password';
        }
      
        View::render('admin/index.php');
    }
    
    
    public function logout ()
    {
        session_start();
        session_unset('loggedin');
        header('Location: http://localhost/ads_yellowpages/public/');
    }
    
    






}














?>