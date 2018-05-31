<?php

namespace View;

use \Util\Start;
use \Model\Comment;
use \Controller\Controller;

require_once 'classes/Util/Start.php';
Start::startSession();
$controller = Controller::getController();

if (empty($_POST[COMMENT])) 
{
    $comment = "";
} 
else 
{
    $comment = $_POST[COMMENT];
}

$username = $controller->getUsername();
$status = $controller->getLoginResult();
$current = $controller->getCurrentPosition();
$controller->newComment(new Comment($username, $comment), $current);
$commentCollection = $controller->getAllComments($current);
Controller::storeController($controller);

/*
if ($current == 'first')
{
    include VIEWS . 'first_recipe.php';
}

else if ($current == 'second')
{
    include VIEWS . 'second_recipe.php';
}

else if ($current == 'third')
{
    include VIEWS . 'third_recipe.php';
}

else if ($current == 'fourth')
{
    include VIEWS . 'fourth_recipe.php';
}
 * 
 */
include VIEWS . 'comment.php';