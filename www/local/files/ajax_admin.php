<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?php

if(isAjaxRequest()){

    $action = isset($_POST['action'])? $_POST['action'] : "" ;
    $method = isset($_POST['method'])? $_POST['method'] : "" ;
    $params = isset($_POST['params'])? $_POST['params'] : "" ;

    if(class_exists($action,true) && method_exists($action,$method)){
        $button = new $action();
        $button->{$method}($params);
    }

}

?>