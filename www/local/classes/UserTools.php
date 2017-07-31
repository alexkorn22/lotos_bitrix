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

    public function getPhone() {
        $arRes = $this->getDataUser('PERSONAL_MOBILE');
        return $arRes['PERSONAL_MOBILE'];
    }

    public function getDataMClub() {
        $list = 'UF_NUMBER_MCLUB,UF_CHECK_M_CLUB,UF_IS_MCLUB';
        return $this->getDataUser($list);
    }

    public function setPhone($idUser,$phone) {
        $fields = ['PERSONAL_MOBILE' => $phone];
        $user = new CUser;
        return $user->Update($idUser, $fields);
    }

}