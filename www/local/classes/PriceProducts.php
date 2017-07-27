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

        if ($product['MIN_PRICE']['PRICE_ID'] == $this->typeMotherClub['id']) {
            $oldPrice = $product['PRICES']['BASE']['PRINT_VALUE'];
            $product["MIN_PRICE"]["PRINT_VALUE"] = $oldPrice;
            $product["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"] = $oldPrice;
        }
        return $product;

    }

}