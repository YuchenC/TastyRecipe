<?php

namespace Util;


final class Start
{
    private function __construct() { }

    public static function startSession() 
    {
        self::loader();
        session_start();
        
        define('USERNAME', 'username');
        define('PASS', 'password');
        define('COMMENT', 'comment');
        define('TIMESTAMP', 'timestamp');
        
        define('VIEWS', 'resources/views/');
        define('FRAGMENTS', 'resources/fragments/');
    }
    
    public static function loader ()
    {
        spl_autoload_register(function ($class) 
        {
            require_once 'classes/' .str_replace('\\', '/', $class). '.php';
        });
    }

}
