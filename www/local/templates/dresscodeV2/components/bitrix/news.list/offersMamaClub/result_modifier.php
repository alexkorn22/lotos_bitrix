<?php


foreach ($arResult["ITEMS"] as $arElement) {
    $image = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], array("width" => 430, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL, false);
    $arResult[$arElement['ID']]['imageSrc'] = $image['src'];
    $db_props = CIBlockElement::GetProperty($arParams['IBLOCK_ID'], $arElement["ID"], "sort", "asc", array());
    while ($ar_props = $db_props->Fetch()) {
        if ($ar_props['CODE'] == 'group_mama_club') {
            $arResult[$arElement['ID']]['groupMamaClub'] = $ar_props['VALUE'];
        }
        if ($ar_props['CODE'] == 'sale') {
            $arResult[$arElement['ID']]['sale'] = $ar_props['VALUE'];
        }
    }
}
