
<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
class EventBitrix {

    public function onAfterUserAdd(&$arFields) {
        $checkMClub = 0;
        $arFields['UF_NUMBER_MCLUB'] = trim($arFields['UF_NUMBER_MCLUB']);
        if (!empty($arFields['UF_NUMBER_MCLUB'])) {
            $checkMClub = 1;
        }
        $fields = [
            'UF_CHECK_M_CLUB' => $checkMClub,
        ];
        $user = new CUser;
        return $user->Update($arFields['ID'], $fields);
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

    public function createButtonTest (){
        global $APPLICATION;
        $APPLICATION->AddPanelButton(
            Array(
                "ID" => 'MakeBtnTest', //определяет уникальность кнопки
                "TEXT" => 'Test Site',
                "TYPE" => "BIG", //BIG - большая кнопка, иначе маленькая
                "MAIN_SORT" => 10, //индекс сортировки для групп кнопок
                "SORT" => 10, //сортировка внутри группы
                "HREF" => "javascript:createButton({action:'AdminButtons',method:'makeTestSite',params:{makeTestSite:'true'}})",
                // - first parameter which class !
                // - second is which method !
                // - third is parameters to send to the method
                "ICON" => "bx-panel-button-icon bx-panel-install-solution-icon\"", //название CSS-класса с иконкой кнопки
                "SRC" => "",
                "ALT" => "Turn on Test site mode", //старый вариант
                "HINT" => array( //тултип кнопки
                    "TITLE" => "Подключить Тест Сайт",
                    "TEXT" => "" //HTML допускается
                ),
                "HINT_MENU" => array( //тултип кнопки контекстного меню
                    "TITLE" => "Подключить Тест Сайт",
                    "TEXT" => "" //HTML допускается
                ),
                "MENU" => Array(
                    Array( //массив пунктов контекстного меню
                        "TEXT" => "menu for test button",
                        "TITLE" => " ",
                        "SORT" => 1, //индекс сортировки пункта
                        "ICON" => "bx-panel-small-button-text", //иконка пункта
                        "ACTION" => "",
                        "SEPARATOR" => true, //определяет пункт-разделитель
                        "DEFAULT" => true, //пункт по умолчанию?
                        "MENU" => Array() //массив подменю
                    )
                )
            ),
            $bReplace = false //заменить существующую кнопку?
        );

    }
}

?>

