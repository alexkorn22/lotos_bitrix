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

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "cOnAfterIBlockElementUpdate");
function cOnAfterIBlockElementUpdate(&$arFields){

  if($arFields['PROPERTY_VALUES']['98'][0]['VALUE'] != '560'){ // товар не учасник мама клуба
      AddEventHandler("catalog", "OnBeforePriceUpdate","cOnBeforePriceUpdate");
  }

}

function cOnBeforePriceUpdate($ID,&$arFields){
    $event = new EventBitrix();
    $event->OnBeforePriceUpdate($arFields);
}








