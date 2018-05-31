<?php

namespace Model;

class Comment 
{
    
    private $username;
    private $comment;
    private $timestamp;
    private $toDelete;

    public function __construct($username, $comment) 
    {
        $this->username = $username;
        $this->comment = $comment;
        $this->timestamp = time();
        $this->toDelete = false;
    }
    
    public function getUser() 
    {
        return $this->username;
    }

    public function getComment() 
    {
        return $this->comment;
    }

    public function getTime() 
    {
        return $this->timestamp;
    }

    public function toDelete() 
    {
        return $this->toDelete;
    }

    public function prepareDeletion($toDelete) 
    {
        $this->toDelete = $toDelete;
    }
}
?>
<script>
/*
var commentObject;
commentObject = {"username":"", "comment":"", "timestamp":"", "toDelete":false};
*/
</script>

