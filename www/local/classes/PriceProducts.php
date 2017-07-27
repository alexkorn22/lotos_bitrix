<?php



class PriceProducts {

    protected $products = [];
    protected $typeMotherClub;

    public function __construct(&$products){
        $this->products = &$products;
        $this->typeMotherClub = App::$config->typeMotherClub;
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
                App::$debug->inF($product["PRICE"]);
            }
        }

        return $product;

    }

    protected function getOldPrice($idProduct) {
        $res = CPrice::GetBasePrice($idProduct);
        App::$debug->inF($res);
        return $res['PRICE'];
    }

}