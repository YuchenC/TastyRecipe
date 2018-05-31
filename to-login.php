<?php

namespace View;

use Util\Start;
use Controller\Controller;
require_once 'classes/Util/Start.php';
Start::startSession();

include VIEWS . 'login.php';
