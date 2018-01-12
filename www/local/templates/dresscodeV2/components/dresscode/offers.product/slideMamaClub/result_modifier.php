<?
// prices for mama club :
$priceData = [];
global $USER;

foreach($arResult["GROUPS"] as $key => $value){
    $arResult['groupId'] = $key;
}

$groupId                    = $arResult['groupId'];
$typeMamaClubId             = App::$config->typeMotherClubId;
$userGroupsId               = CUser::GetUserGroup($arResult['UserID']);
$mClubGroupOfUsersId        = App::$config->mClubGroupOfUsersId;
$arResult['MemberMamaClub'] = false;
$arResult['UserID']         = $USER->GetID();


if(in_array($mClubGroupOfUsersId,$userGroupsId)){
    $arResult['MemberMamaClub'] = true;
}

foreach ($arResult["GROUPS"][$groupId]["ITEMS"] as $index => $arElement){
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