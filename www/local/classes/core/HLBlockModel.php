<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

abstract class HLBlockModel {

    protected static $dataBlock;
    protected static $idHlblock = 1;
    protected $entityClass;
    protected $tableID;
    public $id = 0;
    public $data= array();

    public function __construct(){
        if (empty(static::$dataBlock)){
            static::$dataBlock = array();
        }
        static::init();
        $this->entityClass = static::$dataBlock['entityClass'];
        $this->tableID = static::$dataBlock['tableID'];
    }

    public function __set($name, $value){
        $this->data[$name] = $value;
    }

    public function __get($name){
        return  $this->data[$name];
    }

    protected static function init() {
        if (!empty(static::$dataBlock)) {
            return;
        }
        if (!CModule::IncludeModule('highloadblock')){
            return;
        }
        $hlblock   = Bitrix\Highloadblock\HighloadBlockTable::getById( static::$idHlblock )->fetch(); // получаем объект вашего HL блока
        $entity   = Bitrix\Highloadblock\HighloadBlockTable::compileEntity( $hlblock );  // получаем рабочую сущность
        $res = array();
        $res['entityClass'] = $entity->getDataClass(); // получаем экземпляр класса
        $entity_table_name = $hlblock['TABLE_NAME']; // присваиваем переменной название HL таблицы
        $res['tableID'] = 'tbl_'.$entity_table_name; // добавляем префикс и окончательно формируем название
        static::$dataBlock = $res;
    }

    /**
     * @param array $arSelect
     * @param array $arFilter
     * @param array $arOrder
     * @return HLBlockModel[]
     */
    public static function getList($arSelect = array('*'), $arFilter = array(), $arOrder = array("ID"=>"ASC")) {
        static::init();
        $list = array();
        $dataCurBlock = static::$dataBlock;
        $entityClass = $dataCurBlock['entityClass'];
        // подготавливаем данные
        $rsData = $entityClass::getList(array(
            "select" => $arSelect,
            "filter" => $arFilter,
            "order" => $arOrder
        ));
        $rsData = new CDBResult($rsData, $dataCurBlock['tableID']);
        while($arRes = $rsData->Fetch()){
            $hlModel = new static();
            $hlModel->setData($arRes);
            $list[] = $hlModel;
        }
        return $list;
    }

    public static function getById($idFind) {
        static::init();
        $dataCurBlock = static::$dataBlock;
        $entityClass = $dataCurBlock['entityClass'];
        // подготавливаем данные
        $rsData = $entityClass::getById($idFind);
        $rsData = new CDBResult($rsData, $dataCurBlock['tableID']);
        $hlModel = new static();
        if($arRes = $rsData->Fetch()){
            $hlModel->setData($arRes);
        };
        return $hlModel;
    }

    protected function setData($data){
        foreach ($data as $key=>$value) {
            if ($key == 'ID') {
                $this->id = $value;
                continue;
            }
            $this->data[$key] = $value;
        }
    }

    public function save() {
        $entityClass = $this->entityClass;
        if (!empty($this->id)){
            $result = $entityClass::update($this->id, $this->data);
        }else {
            $result = $entityClass::add($this->data);
        }
        return $result->isSuccess();
    }


}