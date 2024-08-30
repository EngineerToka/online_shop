<?php

require_once 'Request.php';
require_once 'Session.php';
require_once 'DB.php';

use sessions\microFrameWork\Request;
use sessions\microFrameWork\Session;
use sessions\microFrameWork\DB;


$request= new Request;
$session= new Session;
$DB= new DB("localhost","root","","online_shop");




?>