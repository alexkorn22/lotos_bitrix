<?php


foreach ($arResult["ITEMS"] as $key => $arElement) {
    $image = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], array("width" => 430, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL, false);
    $arResult['ITEMS'][$key]['imageSrc'] = $image['src'];
    $db_props = CIBlockElement::GetProperty($arParams['IBLOCK_ID'], $arElement["ID"], "sort", "asc", array());
    while ($ar_props = $db_props->Fetch()) {
        if ($ar_props['CODE'] == 'group_mama_club') {
            $arResult['ITEMS'][$key]['groupMamaClub'] = $ar_props['VALUE'];
        }
        if ($ar_props['CODE'] == 'sale') {
            $arResult['ITEMS'][$key]['sale'] = $ar_props['VALUE'];
        }
    }
}
