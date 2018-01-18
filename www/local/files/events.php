<?php
AddEventHandler("main", "OnBeforeUserAdd",'cOnBeforeUserAdd');
function cOnBeforeUserAdd(&$arFields) {
    $event = new EventBitrix();
    $event->onBeforeUserAdd($arFields);
}

AddEventHandler("main", "OnBeforeUserUpdate",'conBeforeUserUpdate');
function conBeforeUserUpdate(&$arFields) {
    $event = new EventBitrix();
    $event->onBeforeUserUpdate($arFields);
}

AddEventHandler("socialservices", "OnUserLoginSocserv",'cOnUserLoginSocserv');
function cOnUserLoginSocserv($socservUserFields){
    $event = new EventBitrix();
    $event->onUserLoginSocserv($socservUserFields);
}

AddEventHandler("main", "OnAdminTabControlBegin", "cOnAdminTabControlBegin");
function cOnAdminTabControlBegin(&$form){
        $tab = new AdminButton();
        $tab->addTabButtons($form);
}






