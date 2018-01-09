<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * Class Config
 * @property bool debug;
 * @property array typeMotherClub;
 * @property bool setTempDataRegister;
 * @property int freeDeliverySum;
 * @property string scriptYaMetrik;
 * @property string scriptGoogleAnalytiks;
 * @property string scriptGoogleTagHead;
 * @property string scriptGoogleTagBody;
 */
class Config
{
    protected $data = [];
    public $debug = false;
    protected $default = [
        "countPropertyElements" => 3
    ];

    public function __construct()
    {
        $debug = COption::GetOptionString("grain.customsettings", 'debug');
        if ($debug == 'Y') {
            $this->debug = true;
        }
        $this->readFileConfig();
    }

    protected function readFileConfig()
    {

        if (!$this->debug) {
            return;
        }
        $config = include_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/config.php';
        if (!empty($config)) {
            foreach ($config as $key => $item) {
                if ($key == 'debug') {
                    continue;
                }
                $this->data[$key] = $item;
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


    public function setDebug($debug)
    {
        $adminDebug = "N";
        if($debug){
            $adminDebug = "Y";
        }

        $this->debug = $debug;
        COption::SetOptionString("grain.customsettings",'debug', $adminDebug);

    }


    protected function getDefault($name)
    {
        if (isset($this->default[$name])) {
            return $this->default[$name];
        }
        return NULL;
    }



    public function getTelegramChatCallBack(){
        if($this->debug){
            return App::$config->telegramChatTestSite ;
        }
        return  App::$config->telegramChatCallBack;
    }

    public function getTelegramChatOrder(){
        if($this->debug){
            return App::$config->telegramChatTestSite ;
        }
        return App::$config->telegramChatOrder;
    }
}