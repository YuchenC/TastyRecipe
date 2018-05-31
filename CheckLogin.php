<?php
namespace Model;
        
class CheckLogin
{
    private $username;
    private $password;
            
    public function __construct($username, $password) 
    {
        echo 'checklogin constructor<br>';
        $this->username = $username;
        $this->password = $password;
    }   
    
    public function getUser()
    {
        return $this->username;
    }
    
    public function getPass()
    {
        return $this->password;
    }
}