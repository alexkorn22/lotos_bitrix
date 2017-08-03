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

    public function getDataForResult() {
        $data = [
            'FIO' => [
                'title' => 'ФИО',
                'value' => $this->getValueFIO(),
            ],
        ];
        foreach ($this->result['VALUES'] as $key=>$value) {
            if ($key == 'UF_NUMBER_MCLUB') {
                $val = 'Вы не являетесь участником Мама клуба';
                if (!empty($value)){
                    $val = 'Выполняется премодерация Вашей карты Мама клуб';
                }
                $data[$key] = ['value' => $val];
                continue;
            }
            $title = $this->getTitleField($key);
            if (!$title) {
                continue;
            }
            $data[$key] = [
                'title' => $title,
                'value' => $value,
            ];
        }
        return $data;
    }

    protected function getTitleField($field) {
        $fields = [
            'EMAIL' => 'E-mail',
            'PERSONAL_MOBILE' => 'Телефон',
            'PERSONAL_CITY' => 'Город',
            'PERSONAL_STREET' => 'Адрес',
        ];

        return $fields[$field];

    }

    protected function getValueFIO() {
        $values = $this->result['VALUES'];
        $res = [$values['LAST_NAME'],$values['NAME'],$values['SECOND_NAME']];
        return implode(' ', $res);
    }
}