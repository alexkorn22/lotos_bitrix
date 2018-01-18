<?php
AddEventHandler("main", "OnBeforeUserAdd",'cOnBeforeUserAdd');
function cOnBeforeUserAdd(&$arParams) {
    $event = new EventBitrix();
    $event->onBeforeUserAdd($arParams);
}

AddEventHandler("main", "OnBeforeUserUpdate",'conBeforeUserUpdate');
function conBeforeUserUpdate(&$arParams) {
    $event = new EventBitrix();
    $event->onBeforeUserUpdate($arParams);
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






