
<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
class EventBitrix {

    public function onBeforeUserAdd(&$arParams) {
        UserTools::updateMClub($arParams);
    }


    public function onBeforeUserUpdate(&$arParams){
       UserTools::updateMClub($arParams);
    }


    public function OnBeforePriceUpdate(&$arFields){
        $isProductMClub = $this->IsProductMClub($arFields['PRODUCT_ID']);
        // ID prices  :
       $IdPrices = $this->getIdPrices($arFields['PRODUCT_ID']);
        // Delete price mama club :
       if($arFields['CATALOG_GROUP_ID'] == 2 && !$isProductMClub){
           CPrice::DeleteByProduct($arFields['PRODUCT_ID'],$IdPrices);
       }

    }

    protected function IsProductMClub($productId){
        $iBlockId = CIBlockElement::GetIBlockByID($productId);
        $dbMClubProp = CIBlockElement::GetProperty($iBlockId,
            intval($productId),
            array("sort" => "asc"),
            Array("CODE" => "UCHASTVUET_V_MAMA_KLUB")
        );
        while($arNextMClubProp = $dbMClubProp->Fetch()){
            $idPropertyMClub =  $arNextMClubProp["VALUE"] ;
        }
        if($idPropertyMClub != '560'){ // товар не участвует в мама клуб
            return false;
        }
        return true;
    }

    protected function getIdPrices($productId){
        $db_res = CPrice::GetList(
            array(),
            array(
                "PRODUCT_ID" => $productId,
                "!CATALOG_GROUP_ID" => 2
            ),
            false,
            false,
            ['ID']
        );
        while ($ar_res = $db_res->Fetch())
        {
            $res[] = $ar_res;
        }
        foreach ($res as $id){
            $IdPrices[] = $id['ID'];
        }

        return $IdPrices ;
    }

    public function onUserLoginSocserv($socservUserFields) {
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
        $dataUser = $userTools->getDataForResultRegister($dataUser);
        App::$msgBox->setMessage($dataUser,'messages/register');
    }

    public function makeTestSite($params)
    {
        global $USER;
        if ($USER->IsAdmin() && $params['makeTestSite'] == 'true'){
            App::$config->setDebug(true);
            $file = $_SERVER["DOCUMENT_ROOT"] . "/robots.txt";
            $content = "User-Agent: \n*Disallow:/";
            file_put_contents($file, $content);

        }
    }

}

?>

