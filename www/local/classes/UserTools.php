<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * Class UserTools
 * @property $user
 */
class UserTools
{
    public $user;
    protected $data;
    public function __construct($user = false){
        if (!$user) {
            global $USER;
            $this->user = $USER;
        } else {
            $this->user = $user;
        }
    }

    public function getUserId(){
        return $this->user->GetID();
    }

    public function isAuth(){
        if($this->getUserId()){
            return true;
        }
        return false;
    }
    protected function getDataUser($field) {

        $arFields = explode(',',$field);
        $value = array();
        $filter = Array(
            "ID" => $this->user->GetID(),
        );

        $rsUsers = CUser::GetList(
            ($by="name"),
            ($order="asc"),
            $filter,
            array(
                "FIELDS"=>$arFields,
                'SELECT' => $arFields,
            )
        );
        while ($arr = $rsUsers->GetNext()) {
            foreach ($arFields as $val) {
                $value[$val] = $arr[$val];
            }
        }
        if (empty($value)) {
            foreach ($arFields as $val) {
                $value[$val] = '';
            }
        }
        return $value;

    }

    protected function getOneData($nameData) {
        $arRes = $this->getDataUser($nameData);
        return $arRes[$nameData];
    }

    public function getPhone() {
        return $this->getOneData('PERSONAL_MOBILE');
    }

    public function getName() {
        return $this->getOneData('NAME');
    }

    public function getDataMClub() {
        $list = 'UF_NUMBER_MCLUB,UF_CHECK_M_CLUB,UF_IS_MCLUB';
        return $this->getDataUser($list);
    }

    public function getDataForResultRegister($result) {
        $data = [
            'FIO' => [
                'title' => 'ФИО',
                'value' => $this->getValueFIO($result),
            ],
        ];
        foreach ($result['VALUES'] as $key=>$value) {
            if ($key == 'UF_NUMBER_MCLUB') {
                $val = 'Вы не являетесь участником Мама-клуба';
                if (!empty($value)){
                    $val = 'Выполняется премодерация Вашей карты Мама-клуб';
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

    protected function getValueFIO($result) {
        $values = $result['VALUES'];
        $res = [$values['LAST_NAME'],$values['NAME'],$values['SECOND_NAME']];
        return implode(' ', $res);
    }
    public function isMemberMamaClub(){
        $userGroupsId               = CUser::GetUserGroup($this->getUserId());
        $mClubGroupOfUsersId        = App::$config->mClubGroupOfUsersId;
        if(in_array($mClubGroupOfUsersId,$userGroupsId)){
            return true;
        }
        return false;
    }


}