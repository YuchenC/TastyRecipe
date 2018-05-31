<?php
namespace View;

use Util\Start;
//use Model\Comment;
use Model\CheckLogin;
use Controller\Controller;

require_once 'classes/Util/Start.php';
Start::startSession();

$controller = Controller::getController();

$username = $_POST[USERNAME];
$password = $_POST[PASS];

echo 'do user = '.$_POST[USERNAME].'<br>';
echo 'do pass = '.$_POST[PASS].'<br>';

echo 'do user = '.$username.'<br>';
echo 'do pass = '.$password.'<br>';

$controller->login($username, $password);
echo 'test1<br>';
$status = $controller->tologin(new CheckLogin($username, $password));
echo 'test2<br>';
$controller->saveLoginStatus($status);
$user = $controller->getUsername();
echo 'user = '.$user;
Controller::storeController($controller);

if ($status)
{
    include VIEWS. 'login-success.php';
}
else
    include VIEWS . 'login-fail.php';


