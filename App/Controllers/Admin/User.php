<?php 


namespace App\Controllers\Admin;




class User extends \Core\Controller
{

    protected function before ()
    {
        echo "before";
        return false;
    }


    protected function after ()
    {
        echo "after";
        return true;
    }



    public function indexAction ()
    {
        echo "hello from admssssin";
    }








}














?>