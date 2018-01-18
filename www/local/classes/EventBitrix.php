
<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
class EventBitrix {

    public function onAfterUserAdd(&$arFields) {
        $arFields['UF_NUMBER_MCLUB'] = trim($arFields['UF_NUMBER_MCLUB']);
        if (!empty($arFields['UF_NUMBER_MCLUB'])) {
           $this->addUserToMClub($arFields['ID']);
        }
    }


    public function onAfterUserUpdate(&$arFields){
        $arFields['UF_NUMBER_MCLUB'] = trim($arFields['UF_NUMBER_MCLUB']);
        if (!empty($arFields['UF_NUMBER_MCLUB'])) {
            $this->addUserToMClub($arFields['ID']);
        }
    }


    protected function addUserToMClub($userId){
        $userGroupsId = CUser::GetUserGroup($userId);
        array_push($userGroupsId,9) ;
        $fields = [
            'GROUP_ID'    => $userGroupsId
        ];
        $user = new CUser;
        return $user->Update($userId, $fields);
    }


    public function onUserLoginSocserv($socservUserFields) {
        if (!$_SESSION['register_from_socserv']) {
            return;
        }
        unset($_SESSION['register_from_socserv']);
        $rsUser = CUser::GetByLogin($socservUserFields['LOGIN']);
        $arUser = $rsUser->Fetch();
        $dataUser['VALUES'] = [
            'NAME' => '',
            'LAST_NAME' => '',
            'SECOND_NAME' => '',
            'EMAIL' => '',
            'PERSONAL_MOBILE' => '',
            'PERSONAL_CITY' => '',
            'UF_NUMBER_MCLUB' => '',
        ];

        foreach ($dataUser['VALUES'] as $key=>$value){
            $dataUser['VALUES'][$key] = $arUser[$key];
        }

        $userTools = new UserTools();
        $dataUser = $userTools->getDataForResultRegister($dataUser);
        App::$msgBox->setMessage($dataUser,'messages/register');
    }

    public function makeTestSite($params)
    {
        global $USER;
        if ($USER->IsAdmin() && $params['makeTestSite'] == 'true'){
            App::$config->setDebug(true);
            $file = $_SERVER["DOCUMENT_ROOT"] . "/robots.txt";
            $content = "User-Agent: \n*Disallow:/";
            file_put_contents($file, $content);

        }
    }

}

?>

