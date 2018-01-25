<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


class PriceProducts {

    protected $products = [];
    protected $typeMotherClub;

    public function __construct(&$products){
        $this->products = &$products;
        $this->typeMotherClub['id'] = App::$config->typeMotherClubId;
        $this->typeMotherClub['code'] = App::$config->typeMotherClubCode;
    }

    public function fillMotherClub() {
        foreach ($this->products as &$product) {
            $product = $this->fillMotherClubForProduct($product);
        }

    }

    protected function fillMotherClubForProduct($product) {

        if (isset($product['MIN_PRICE'])) {
            $product["MIN_PRICE"]["motherClub"] = false;
            if ($product['MIN_PRICE']['PRICE_ID'] == $this->typeMotherClub['id']) {
                $oldPrice = $product['PRICES']['BASE']['PRINT_VALUE'];
                $product["MIN_PRICE"]["PRINT_VALUE"] = $oldPrice;
                $product["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"] = $oldPrice;
                $product["MIN_PRICE"]["motherClub"] = true;
            }
        } else {
            $product["PRICE"]["motherClub"] = false;
            if ($product['PRICE']['PRICE']['ID'] == $this->typeMotherClub['id']) {
                $oldPrice = $this->getOldPrice($product['ID']);
                $product["PRICE"]["DISCOUNT"][] = $oldPrice;
                $product["PRICE"]["RESULT_PRICE"]["BASE_PRICE"] = $oldPrice;
                $product["PRICE"]["motherClub"] = true;
            }
        }

        // Не авторойяован
        if($product['MIN_PRICE']['PRICE_ID'] != $this->typeMotherClub['id'] && isset($_GET['group_mama_club'])){
            $priceMClub = GetCatalogProductPrice($product['ID'], $this->typeMotherClub['id']);
            $product["MIN_PRICE"]["PRINT_VALUE"] =  $priceMClub['PRICE'];
            $product["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"] = $priceMClub['PRICE'];
        }


        return $product;

    }

    protected function getOldPrice($idProduct) {
        $res = CPrice::GetBasePrice($idProduct);
        return $res['PRICE'];
    }

}