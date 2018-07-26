<?php
require_once ('core/core.php');
if(!isset($_REQUEST['c'])){
    $controller = 'index';
    require_once ('controller/'.$controller.'Controller.php');
    $controller = $controller.'Controller';
    $controller = new $controller();
    $controller -> index();
} else {
    $controller = $_REQUEST['c'];
    require_once ('controller/'.$controller.'Controller.php');
    $controller = $controller.'Controller';
    $controller = new $controller();
    $method = isset($_REQUEST['m']) ? $_REQUEST['m'] : 'index';
    call_user_func(array($controller, $method));
}