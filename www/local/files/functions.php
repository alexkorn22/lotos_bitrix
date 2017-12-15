<?php

function isAjaxRequest(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

?>