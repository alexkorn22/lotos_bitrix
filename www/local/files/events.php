<?php
AddEventHandler("main", "OnAfterUserAdd",'cOnAfterUserAdd');
function cOnAfterUserAdd(&$arFields) {
    $event = new EventBitrix();
    $event->onAfterUserAdd($arFields);
}

AddEventHandler("socialservices", "OnUserLoginSocserv",'cOnUserLoginSocserv');
function cOnUserLoginSocserv($socservUserFields) {

    if (!$_SESSION['register_from_socserv']) {
        return;
    }
    unset($_SESSION['register_from_socserv']);
    $rsUser = CUser::GetByLogin($socservUserFields['LOGIN']);
    $arUser = $rsUser->Fetch();
    $dataUser['VALUES'] = [
        'NAME' => '',
        'LAST_NAME' => '',
        'SECOND_NAME' => '',
        'EMAIL' => '',
        'PERSONAL_MOBILE' => '',
        'PERSONAL_CITY' => '',
        'UF_NUMBER_MCLUB' => '',
    ];

    foreach ($dataUser['VALUES'] as $key=>$value){
        $dataUser['VALUES'][$key] = $arUser[$key];
    }

    $userTools = new UserTools();
    App::$debug->inF($dataUser);
    $dataUser = $userTools->getDataForResultRegister($dataUser);
    App::$debug->inF($dataUser);
    App::$msgBox->setMessage($dataUser,'messages/register');
}


