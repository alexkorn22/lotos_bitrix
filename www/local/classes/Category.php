<?php


class Category{

    protected $iblock = 0;
    public $id = 0;
    public function __construct($iblock, $id){
        $this->iblock = $iblock;
        $this->id = $id;
    }

    public function getValueHOne() {
        global $APPLICATION;
        $res = CIBlockSection::GetList(
            Array(),
            [
                'IBLOCK_ID' => $this->iblock,
                'ID' => $this->id
            ],
            false,
            array("UF_VALUE_H1",'ID')
        );
        if($ar_res = $res->GetNext()){
            return $ar_res['UF_VALUE_H1'];
        }
        return $APPLICATION->ShowTitle(false);
    }

}