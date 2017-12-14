<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?php

if(isAjaxRequest()){
    App::$config->makeTestSite($_POST);
}

?>