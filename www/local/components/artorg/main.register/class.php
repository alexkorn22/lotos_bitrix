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
        $userTools = new UserTools();
        return $userTools->getDataForResultRegister($this->result);
    }

    public function isSetAddValues() {
        $addFields = [
            'FIO',
            'PERSONAL_MOBILE',
            'PERSONAL_CITY',
            'PERSONAL_STREET',
        ];
        foreach ($addFields as $addField) {
            if (isset($this->result[$addField]) && !empty($this->result[$addField])) {
                return true;
            }
        }
        return false;
    }

    public function setDebugRegisterData() {
        if (!App::$config->setTempDataRegister) {
            return;
        }
        if (empty($_POST)) {
            $this->result['EMAIL'] = uniqid() . '@test.com';
            $this->result['FIO'] = 'Корниенко Александр';
            $this->result['PASSWORD'] = '111111';
            $this->result['CONFIRM_PASSWORD'] = '111111';
            $this->result['CHECKED_IS_MCLUB'] = 'Y';
            $this->result['UF_NUMBER_MCLUB'] = '16541654651';
            $this->result['PERSONAL_MOBILE'] = '09884444444';
            $this->result['PERSONAL_CITY'] = 'Запорожье';
            $this->result['PERSONAL_STREET'] = 'Независимой Украины, 63';
        }

    }

    public function setAuthServices() {
        global $USER,$APPLICATION;
        $this->result["AUTH_SERVICES"] = false;
        $this->result["CURRENT_SERVICE"] = false;
        $this->result["FOR_INTRANET"] = false;
        if(IsModuleInstalled("intranet")||IsModuleInstalled("rest"))
            $this->result["FOR_INTRANET"] = true;
        if(!$USER->IsAuthorized() && CModule::IncludeModule("socialservices"))
        {
            $oAuthManager = new CSocServAuthManager();
            $arServices = $oAuthManager->GetActiveAuthServices(array(
                'BACKURL' => $this->result['~BACKURL'],
                'FOR_INTRANET' => $this->result['FOR_INTRANET'],
            ));

            if(!empty($arServices))
            {
                $this->result["AUTH_SERVICES"] = $arServices;
                if(isset($_REQUEST["auth_service_id"]) && $_REQUEST["auth_service_id"] <> '' && isset($this->result["AUTH_SERVICES"][$_REQUEST["auth_service_id"]]))
                {
                    $this->result["CURRENT_SERVICE"] = $_REQUEST["auth_service_id"];
                    if(isset($_REQUEST["auth_service_error"]) && $_REQUEST["auth_service_error"] <> '')
                    {
                        $this->result['ERRORS'] = $oAuthManager->GetError($this->result["CURRENT_SERVICE"], $_REQUEST["auth_service_error"]);
                    }
                    elseif(!$oAuthManager->Authorize($_REQUEST["auth_service_id"]))
                    {
                        $ex = $APPLICATION->GetException();
                        if ($ex)
                            $this->result['ERRORS'] = $ex->GetString();
                    }
                }
            }
        }

    }
    public function setDataMClub($value){
        global $USER;
        $user     = new CUser;
        $user->Update($USER->GetID(), ['UF_IS_MCLUB'=>$value]);
    }

}