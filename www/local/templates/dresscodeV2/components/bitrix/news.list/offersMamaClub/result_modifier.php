<?php


foreach ($arResult["ITEMS"] as $key => $arElement) {
    $image = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], array("width" => 430, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL, false);
    $item['imageSrc'] = $image['src'];
    $item['name']     = $arElement["NAME"];
    $db_props = CIBlockElement::GetProperty($arParams['IBLOCK_ID'], $arElement["ID"], "sort", "asc", array());
    while ($ar_props = $db_props->Fetch()) {
        if ($ar_props['CODE'] == 'group_mama_club') {
            $item['groupMamaClub'] = $ar_props['VALUE'];
        }
        if ($ar_props['CODE'] == 'sale') {
            $item['sale'] = $ar_props['VALUE'];
        }
    }
    $arResult['GROUPS_MAMA_CLUB'][]=$item;
}
