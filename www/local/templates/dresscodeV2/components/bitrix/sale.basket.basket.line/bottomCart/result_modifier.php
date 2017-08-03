<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();


    $fuserId = \Bitrix\Sale\Fuser::getId(true);
    $totalPrice = \Bitrix\Sale\BasketComponentHelper::getFUserBasketPrice($fuserId, SITE_ID);

    $arResult["ART_TOTAL_PRICE"] = App::$config->freeDeliverySum - $totalPrice;
    $arResult["ART_TOTAL_PRICE_STR"] = CCurrencyLang::CurrencyFormat($arResult["ART_TOTAL_PRICE"], CSaleLang::GetLangCurrency(SITE_ID), true);

?>