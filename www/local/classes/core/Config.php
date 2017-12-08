<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * Class Config
 * @property bool debug;
 * @property array typeMotherClub;
 * @property bool setTempDataRegister;
 * @property int freeDeliverySum;
 * @property array telegram;
 */
class Config
{
    protected $data  = [];
    protected $debug = true;
    protected $default = [
    ];

    public function __construct()
    {
        $debug = COption::GetOptionString("grain.customsettings", 'debug');
        if(!empty($debug)){
            $this->debug = $debug == 'Y';
        }

        if (!$this->debug) { // working site
            $config = require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/config.php';
            if (empty($config)) {
                return;
            }
            foreach ($config as $key => $value) {
                $this->data[$key] = $value;
            }
        }


    }

    public function __get($name)
    {
        if (!isset($this->data[$name])) {
            $this->data[$name] = COption::GetOptionString("grain.customsettings", $name);
        }
        if (empty($this->data[$name])) {
            $this->data[$name] = $this->getDefault($name);
        }
        return $this->data[$name];
    }


    public function getDefault($name)
    {
        if(isset($this->default[$name])){
            return $this->default[$name];
        }
        return NULL;
    }


}