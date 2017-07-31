<?php

/**
 * Created by PhpStorm.
 * User: korns
 * Date: 31.07.2017
 * Time: 9:37
 */
class EventBitrix {

    public function onAfterUserAdd(&$arFields) {
        App::$debug->inF($arFields);
        $userTools = new UserTools();
        $arFields['UF_TMP_PHONE'] = trim($arFields['UF_TMP_PHONE']);
        $userTools->setPhone($arFields['ID'],$arFields['UF_TMP_PHONE']);
        $arFields['UF_TMP_PHONE'] = '';
    }
}