<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class FastBackCart{
    const ERROR_USER = 0;
    const ERROR_FILLING = 1;
    const ERROR_PAYSYSTEM = 2;
    const ERROR_DELIVERY = 3;
    const ERROR_USER_BASKET = 4;

    protected $idUser= 0;
    protected $idBasketUser= 0;
    protected $personItem= [];
    protected $idSite = 0;
    protected $paySystem = [];
    protected $delivery = [];
    protected $idOrder = 0;
    protected $messageUser = '';
    protected $nameUser = '';
    protected $phoneUser = '';

    public function __construct($idSite = false){
        $this->idSite = $idSite;
        if (!$this->idSite) {
            $this->idSite = SITE_ID;
        }
    }

    public function createOrder() {
        if(empty($this->phoneUser)){
            return $this->msgError(self::ERROR_FILLING);
        }
        if (empty($this->getBasketUserId())) {
            return $this->msgError(self::ERROR_USER_BASKET);
        }
        if (empty($this->getUserID())) {
            return $this->msgError(self::ERROR_USER);
        }
        if (!$this->fillPaySystem()) {
            return $this->msgError(self::ERROR_PAYSYSTEM);
        }
        if (!$this->fillDelivery()) {
            return $this->msgError(self::ERROR_DELIVERY);
        }
        $this->addOrder();
        $this->fillPropsOrder();
        $this->setOrderBasket();
        return $this->msgSuccess();
    }

    public function setData($data) {
        $keys = ['name','phone','message'];
        foreach ($keys as $key){
            $keyObj = $key . 'User';
            $this->$keyObj = htmlspecialchars($data[$key]);
        }
    }

    protected function msgSuccess() {
        $result = array(
            "heading" => "Ваш заказ успешно отправлен",
            "message" => "В ближайшее время Вам перезвонит наш менеджер для уточнения деталей заказа.",
            "success" => true
        );
        return $result;
    }

    protected function msgError($error) {
        $msg = 'Непредвиденная ошибка';
        switch ($error) {
            case self::ERROR_USER:
                $msg = "Ошибка, пользователь не найден!";
                break;
            case self::ERROR_USER_BASKET:
                $msg = "Ошибка, корзина пустая!";
                break;
            case self::ERROR_FILLING:
                $msg = "Ошибка, заполните обязательные поля!";
                break;
            case self::ERROR_PAYSYSTEM:
                $msg = "Ошибка, платежная система не создана!";
                break;
            case self::ERROR_DELIVERY:
                $msg = "Ошибка, служба доставки не создана!";
                break;
        };
        $result = array(
            "heading" => "Ошибка",
            "message" => $msg,
            "success" => false
        );

        return $result;
    }

    protected function getUserID() {
        global $USER;
        $this->idUser = 0;
        if ($this->fillPersonType()) {
            $this->idUser = intval($USER->GetID());
            if($this->idUser == 0){
                $rsUser = CUser::GetByLogin("unregistered");
                $arUser = $rsUser->Fetch();
                if(!empty($arUser)){
                    $this->idUser = $arUser["ID"];
                }else{

                    $newUser = new CUser;
                    $newPass = rand(0, 999999999);
                    $arUserFields = Array(
                        "NAME"              => "unregistered",
                        "LAST_NAME"         => "unregistered",
                        "EMAIL"             => "unregistered@unregistered.com",
                        "LOGIN"             => "unregistered",
                        "LID"               => "ru",
                        "ACTIVE"            => "Y",
                        "GROUP_ID"          => array(),
                        "PASSWORD"          => $newPass,
                        "CONFIRM_PASSWORD"  => $newPass,
                    );

                    $this->idUser = $newUser->Add($arUserFields);
                }
            }
        }
        return $this->idUser;
    }

    protected function fillPersonType() {
        $getPersonType = CSalePersonType::GetList(Array("SORT" => "ASC"), Array("LID" => htmlspecialcharsbx($this->idSite), "ACTIVE" => "Y"));
        if ($arPersonItem = $getPersonType->Fetch()){
            $this->personItem = $arPersonItem;
            return true;
        }
        return false;
    }

    protected function fillPaySystem() {
        $db_ptype = CSalePaySystem::GetList($arOrder = Array("SORT" => "ASC", "PSA_NAME" => "ASC"),
            Array("ACTIVE" => "Y", "PERSON_TYPE_ID" => $this->personItem["ID"])
        );
        if ($ptype = $db_ptype->Fetch()){
            $this->paySystem = $ptype;
            return true;
        }
        return false;
    }

    protected function fillDelivery() {
        $db_dtype = CSaleDelivery::GetList(
            array(
                "SORT" => "ASC",
                "NAME" => "ASC"
            ),
            array(
                "LID" => htmlspecialcharsbx($_GET["SITE_ID"]),
                "ACTIVE" => "Y",
            ),
            false,
            false,
            array()
        );
        if ($dtype = $db_dtype->Fetch()){
            $this->delivery = $dtype;
            return true;
        }
        return false;
    }

    protected function addOrder() {
        $OPTION_CURRENCY  = CCurrency::GetBaseCurrency();
        $arFields = array(
            "LID" => htmlspecialcharsbx($this->idSite),
            "PERSON_TYPE_ID" => $this->personItem["ID"],
            "PAYED" => "N",
            "CANCELED" => "N",
            "STATUS_ID" => "N",
            "PRICE" => $this->getSumCart(),
            "CURRENCY" => $OPTION_CURRENCY,
            "USER_ID" => $this->idUser,
            "PAY_SYSTEM_ID" => $this->paySystem["ID"],
            "PRICE_DELIVERY" => 0,
            "DELIVERY_ID" => $this->delivery["ID"],
            "DISCOUNT_VALUE" => 0,
            "TAX_VALUE" => 0.0,
            "USER_DESCRIPTION" => BX_UTF != 1 ? iconv("UTF-8","windows-1251//IGNORE", $this->messageUser) : $this->messageUser
        );

        $ORDER_ID = CSaleOrder::Add($arFields);
        $this->idOrder = IntVal($ORDER_ID);
    }

    protected function getBasketUserId() {
        $this->idBasketUser = CSaleBasket::GetBasketUserID(true);
        return $this->idBasketUser;
    }

    protected function getSumCart() {
        $total = \Bitrix\Sale\BasketComponentHelper::getFUserBasketPrice($this->idBasketUser, $this->idSite);
        return CCurrencyLang::CurrencyFormat($total, CSaleLang::GetLangCurrency($this->idSite), true);
    }

    protected function fillPropsOrder() {

        $db_props = CSaleOrderProps::GetList(
            array("SORT" => "ASC"),
            array(
                "PERSON_TYPE_ID" => $this->personItem["ID"],
                "UTIL" => "N"
            ),
            false,
            false,
            array()
        );

        while ($props = $db_props->Fetch()){
            if($props["IS_PROFILE_NAME"] == "Y"){
                CSaleOrderPropsValue::Add(array(
                    "ORDER_ID" => $this->idOrder,
                    "ORDER_PROPS_ID" => $props["ID"],
                    "NAME" => $props["NAME"],
                    "CODE" => $props["CODE"],
                    "VALUE" => BX_UTF != 1 ? iconv("UTF-8","windows-1251//IGNORE", $this->nameUser) : $this->nameUser
                ));
            }else if(strtoupper($props["CODE"]) == "TELEPHONE" || strtoupper($props["CODE"]) == "PHONE" || $props["IS_PHONE"] == "Y"){
                CSaleOrderPropsValue::Add(array(
                    "ORDER_ID" => $this->idOrder,
                    "ORDER_PROPS_ID" => $props["ID"],
                    "NAME" => $props["NAME"],
                    "CODE" => $props["CODE"],
                    "VALUE" => BX_UTF != 1 ? iconv("UTF-8","windows-1251//IGNORE", $this->phoneUser) :$this->phoneUser
                ));
            }
        }
    }

    protected function setOrderBasket() {
        CSaleBasket::OrderBasket($this->idOrder, $this->idBasketUser, $this->idSite);
    }

}