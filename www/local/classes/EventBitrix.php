
<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
class EventBitrix {

    public function onBeforeUserAdd(&$arParams) {
        UserTools::updateMClub($arParams);
    }


    public function onBeforeUserUpdate(&$arParams){
       UserTools::updateMClub($arParams);
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

