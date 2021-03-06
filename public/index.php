<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  


spl_autoload_register(function($class){
    $root = dirname(__DIR__);
    $file= $root . '/' . str_replace('\\', '/', $class). '.php';
    if(is_readable($file))
    {
        require $root.'/'. str_replace('\\', '/', $class) . '.php';
    }
});


$router = new Core\Router();


$router->add('', ['controller' => 'Home' , 'action' => 'index']);

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');


$router->dispatch($_SERVER['QUERY_STRING']);