<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class MainRegister extends CBitrixComponent {

    public $result;
    public function parseFIO($fio) {
        $res = explode(' ',$fio);
        foreach ($res as &$item) {
            $item = trim($item);
        }
        $this->result["VALUES"]['NAME'] = $res[1];
        $this->result["VALUES"]['SECOND_NAME'] = $res[2];
        $this->result["VALUES"]['LAST_NAME'] = $res[0];
    }
}