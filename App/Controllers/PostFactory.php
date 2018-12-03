<?php

namespace App\Controllers;

/**
 * Description of PostFactory 
 * used to make a factory pattern 
 * @author Hesham Mohamed
 */

class PostFactory
{
    public static function create($route_params)
    {
        return new Posts($route_params);
    }
}
?>
