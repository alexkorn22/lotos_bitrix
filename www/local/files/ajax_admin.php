<?php

if(isAjaxRequest()){
    $action = $_POST['action'];
    $method = $_POST['method'];
    $params = $_POST['params'];
// check isset post
    $button = new $action();
    $button->{$method}($params);
}

?>