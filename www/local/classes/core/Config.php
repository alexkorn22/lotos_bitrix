<?php


/**
 * Class Config
 * @property bool debug;
 * @property array typeMotherClub;
 * @property bool setTempDataRegister;
 * @property int freeDeliverySum;
 */
class Config {
    protected $data = [];

    public function __construct(){
        $config = require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/config.php';
        if (empty($config)) {
            return;
        }
        foreach ($config as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    public  function __get($name){
        return $this->data[$name];
    }
}