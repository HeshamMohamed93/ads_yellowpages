<?php
class PostFactory
{
    public static function create($route_params)
    {
        return new Posts($route_params);
    }
}
?>
