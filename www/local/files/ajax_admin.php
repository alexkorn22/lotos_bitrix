<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?php

if(isAjaxRequest()){
    // turn on test mode :
        App::$config->turnOnTest($_GET);
}

function isAjaxRequest(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}


?>