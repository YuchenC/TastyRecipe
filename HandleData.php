<?php

namespace Integration;

use Model\Comment;
use Model\CheckLogin;
use Model\RegisterNew;

class HandleData {
    
    const FILE_NAME_1 = 'comment_1.txt';
    const FILE_NAME_2 = 'comment_2.txt';
    const FILE_NAME_3 = 'comment_3.txt';
    const FILE_NAME_4 = 'comment_4.txt';
    const LOGINCHECK = 'logincheck.txt';
    const PATH_TO_APP_ROOT = '/../../';
    const NEWLINE = ";\n";
    private $file_path_1;
    private $file_path_2;
    private $file_path_3;
    private $file_path_4;
    private $logincheck;

    public function __construct() 
    {
        $this->file_path_1 = __DIR__ . self::PATH_TO_APP_ROOT . self::FILE_NAME_1;
        $this->file_path_2 = __DIR__ . self::PATH_TO_APP_ROOT . self::FILE_NAME_2;
        $this->file_path_3 = __DIR__ . self::PATH_TO_APP_ROOT . self::FILE_NAME_3;
        $this->file_path_4 = __DIR__ . self::PATH_TO_APP_ROOT . self::FILE_NAME_4;
        $this->logincheck = __DIR__ . self::PATH_TO_APP_ROOT . self::LOGINCHECK;
    }
    
    public function tologin(CheckLogin $log)
    {
        $nameuser = $log->getUser();
        $passuser = $log->getPass();
        $combine = $nameuser.';'.$passuser;
        $file = fopen($this->logincheck, "r");
        $lines=file(self::LOGINCHECK);
        for ($i = 0; $i < count($lines); ++$i)
        {
            list($name, $pass, $test) = explode(';', $lines[$i]);
            if ($nameuser == $name)
            {
                if(password_verify($passuser, $pass))
                {
                    return true;
                }
            }   
        }
        return false;    
    }
    
    public function newComment(Comment $comment, string $current) 
    {
        $toadd=$comment->getComment();
        if (ctype_print($toadd))
        {
            if ($current == 'first')
            {
                \file_put_contents($this->file_path_1, \serialize($comment) . self::NEWLINE, FILE_APPEND);
                
            }
            else if ($current == 'second')
            {
                \file_put_contents($this->file_path_2, \serialize($comment) . self::NEWLINE, FILE_APPEND);
            }
            else if ($current == 'third')
            {
                \file_put_contents($this->file_path_3, \serialize($comment) . self::NEWLINE, FILE_APPEND);
            }
            else if ($current == 'fourth')
            {
                \file_put_contents($this->file_path_4, \serialize($comment) . self::NEWLINE, FILE_APPEND);
            }
        }
    }
    
    public function getAllComments(string $current)
    {
        $commentCollection = array();
        $commentFile =  \explode(self::NEWLINE, \file_get_contents($this->file_path_1));
        for ($i = 0; $i < count($commentFile); ++$i)
        {
            $singleComment = \unserialize($commentFile[$i]);
            //echo $singleComment->getComment().'<br>';
            array_push($commentCollection, $singleComment);  
        }
        return $commentCollection;
    }
    
    public function toRegister (RegisterNew $register)
    {
        $nameuser = $register->getUser();
        $passuser = $register->getPass();
        if (ctype_alnum($nameuser))
        {
            $passuser = password_hash($passuser, PASSWORD_DEFAULT);
            $combine = $nameuser.';'.$passuser;
            file_put_contents($this->logincheck, $combine . self::NEWLINE, FILE_APPEND);
            return true;
        }   
        else
        {
            return false;
        }
    }

    public function deleteEntry($timestamp, string $current) 
    {
        if ($current == 'first')
        {
            $file_path = $this->file_path_1;
        }
        else if ($current == 'second')
        {
            $file_path = $this->file_path_2;
        }
        else if ($current == 'third')
        {
            $file_path = $this->file_path_3;
        }
        else if ($current == 'fourth')
        {
            $file_path = $this->file_path_4;
        }
        
    }
}
