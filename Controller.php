<?php
namespace Controller;

use Integration\HandleData;
use Model\Comment;
use Model\CheckLogin;
use Model\RegisterNew;

class Controller 
{
    
    const CONTRO = 'controller';
    
    private $datahandler;
    private $username;
    private $password;
    
    private $newusername;
    private $newpassword;
    
    private $status;
    private $currentRecipe;
   
    
    public function __construct() 
    {
        $this->datahandler = new HandleData();
    }
    
    public static function getController() 
    {
        if (!isset($_SESSION[self::CONTRO])) 
        {
            
            return new Controller();
        }
        return unserialize($_SESSION[self::CONTRO]);
    }
    
    public static function storeController(Controller $controller) 
    {
        $_SESSION[self::CONTRO] = serialize($controller);
    }
    
    public function tologin(CheckLogin $log)
    {
        return $this->datahandler->tologin($log);
    }
    
    public function login($username, $password) 
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function saveLoginStatus ($status)
    {
        $this->status = $status;
    }
    
    public function saveCurrentPosition ($currentRecipe)
    {
        $this->currentRecipe = $currentRecipe;
    }
    
    public function getUsername() 
    {
        return $this->username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getLoginResult()
    {
        return $this->status;
    }
    
    public function getCurrentPosition ()
    {
        return $this->currentRecipe;
    }
   
    public function getAllComments (string $current)
    {
        return $this->datahandler->getAllComments($current);
    }
    
    public function newComment(Comment $addcomment, string $current) 
    {
        return $this->datahandler->newComment($addcomment, $current);
    }
    
    public function deleteEntry($timestamp, string $current) 
    {
        $this->datahandler->deleteEntry($timestamp, $current);
    }
}
