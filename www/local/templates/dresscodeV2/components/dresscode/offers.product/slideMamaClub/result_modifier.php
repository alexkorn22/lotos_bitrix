<?
// prices for mama club :
$priceData = [];
$typeMamaClubId = App::$config->typeMotherClubId;

foreach($arResult["GROUPS"] as $key => $value){
    $arResult['groupId'] = $key;
}


foreach ($arResult["GROUPS"][$arResult['groupId']]["ITEMS"] as $index => $arElement){
    $productId = $arElement['PRICE']['PRODUCT_ID'];
    $priceMamaClub = GetCatalogProductPrice($productId,$typeMamaClubId);

        if(!empty($priceMamaClub)){
            $price = $priceMamaClub['PRICE'];
        }else{
            $price = $arElement["PRICE"]["RESULT_PRICE"]["BASE_PRICE"];
        }

    $priceData[$productId] = $price ;
}

$arResult['PricesMamaClub'] = $priceData;


?>