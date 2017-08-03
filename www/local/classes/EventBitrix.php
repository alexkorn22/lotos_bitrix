<?php

/**
 * Created by PhpStorm.
 * User: korns
 * Date: 31.07.2017
 * Time: 9:37
 */
class EventBitrix {

    public function onAfterUserAdd(&$arFields) {
        $checkMClub = 0;
        $arFields['UF_NUMBER_MCLUB'] = trim($arFields['UF_NUMBER_MCLUB']);
        if (!empty($arFields['UF_NUMBER_MCLUB'])) {
            $checkMClub = 1;
        }
        $fields = [
            'UF_CHECK_M_CLUB' => $checkMClub,
        ];
        $user = new CUser;
        return $user->Update($arFields['ID'], $fields);
    }
}