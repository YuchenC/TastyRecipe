<?php
namespace View;

use Util\Start;
use Controller\Controller;

require_once 'classes/Util/Start.php';
Start::startSession();
$controller = Controller::getController();

$username = $controller->getUsername();
$status = $controller->getLoginResult();
$controller->saveCurrentPosition('first');
$current = $controller->getCurrentPosition();
$commentCollection = $controller->getAllComments($current);



Controller::storeController($controller);

include VIEWS . 'comment.php';