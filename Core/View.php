<?php

namespace Core;

class View
{

    /**
     * use render to load view with view path and pass args to it
     * @param string $view
     * @param array $args
     */
    public static function render($view , $args = [])
    {
        extract($args , EXTR_SKIP);
        $file = "../App/Views/$view";
        if(is_readable($file))
        {
            require $file;
        }else {
            echo $file. " not found";
        }
    }
}



















?>