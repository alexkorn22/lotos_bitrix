<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

    $fuserId = \Bitrix\Sale\Fuser::getId(true);
    $totalPrice = \Bitrix\Sale\BasketComponentHelper::getFUserBasketPrice($fuserId, SITE_ID);

    $arResult["FREE_DELIVERY_SUM"] = App::$config->freeDeliverySum;
    $arResult["ART_TOTAL_PRICE"] = App::$config->freeDeliverySum - $totalPrice;
    $arResult["ART_TOTAL_PRICE_STR"] = CCurrencyLang::CurrencyFormat($arResult["ART_TOTAL_PRICE"], CSaleLang::GetLangCurrency(SITE_ID), true);
    foreach ($arResult["CATEGORIES"]["READY"] as &$arItem){
        if(empty($arItem["PICTURE_SRC"]))$arItem["PICTURE_SRC"]= SITE_TEMPLATE_PATH."/images/empty.png";
    }
?>