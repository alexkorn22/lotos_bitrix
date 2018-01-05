<?php
AddEventHandler("main", "OnAfterUserAdd",'cOnAfterUserAdd');
function cOnAfterUserAdd(&$arFields) {
    $event = new EventBitrix();
    $event->onAfterUserAdd($arFields);
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






