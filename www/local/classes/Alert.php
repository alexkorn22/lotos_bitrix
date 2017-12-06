<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class Alert {
    protected $data;
    protected $text;
    public function __construct($data = []) {
        $this->data = $data;
    }

    public function parseText($pattern) {
        $this->text = $pattern;
        foreach ($this->data as $key => $value) {
            $this->text = str_replace('%' . $key . '%',$value, $this->text);
        }
    }

    public function sendTelegram($idChat) {
        $bot = new Telegram($idChat);
        $bot->sendMessage($this->text);
    }

    public function getData($key,$default = '') {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return $default;
    }

    public function setData($key,$value) {
        $this->data[$key] = $value;
    }

    public function sendEmailNewOrder($orderId = 0) {
        global $SERVER_NAME,$DB;
        $eventName = "SALE_NEW_ORDER";
        $arFields = Array(
            "ORDER_ID" => $orderId,
            "ORDER_DATE" => $this->getData("ORDER_DATE",Date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT", SITE_ID)))),
            "ORDER_USER" => $this->getData("ORDER_USER"),
            "PRICE" => $this->getData("PRICE",0),
            "BCC" => $this->getData("BCC",COption::GetOptionString("sale", "order_email", "order@".$SERVER_NAME)),
            "EMAIL" => $this->getData("USER_EMAIL"),
            "ORDER_LIST" => $this->getStrOrderList($orderId),
            "SALE_EMAIL" => $this->getData("SALE_EMAIL",COption::GetOptionString("sale", "order_email", "order@".$SERVER_NAME))
        );

        $bSend = true;
        foreach(GetModuleEvents("sale", "OnOrderNewSendEmail", true) as $arEvent)
            if (ExecuteModuleEventEx($arEvent, Array($orderId, &$eventName, &$arFields))===false)
                $bSend = false;

        if($bSend) {
            $event = new CEvent;
            $event->Send($eventName, SITE_ID, $arFields, "N");
        }
    }

    protected function getStrOrderList($orderId) {
        $strOrderList = '';
        $dbBasketItems = CSaleBasket::GetList(
            array("ID" => "ASC"),
            array("ORDER_ID" => $orderId),
            false,
            false,
            ['NAME','QUANTITY','PRICE']
        );
        while ($arBasketItems = $dbBasketItems->Fetch())
        {
            $strOrderList .= $arBasketItems["NAME"];
            $strOrderList .= " - ".$arBasketItems["QUANTITY"]." шт.";
            $strOrderList .= " x ". CCurrencyLang::CurrencyFormat($arBasketItems["PRICE"], CSaleLang::GetLangCurrency(SITE_ID), true);
            $strOrderList .= "\n";
        }
        return $strOrderList;
    }
}