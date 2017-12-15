<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 14.12.2017
 * Time: 15:43
 */

class AdminButton
{
    public function createButtonMakeTestSite (){
        global $APPLICATION;
        $APPLICATION->AddPanelButton(
            Array(
                "ID" => 'MakeBtnTest', //определяет уникальность кнопки
                "TEXT" => 'преобразовать в тестовый сайт',
                "TYPE" => "BIG", //BIG - большая кнопка, иначе маленькая
                "MAIN_SORT" => 10, //индекс сортировки для групп кнопок
                "SORT" => 10, //сортировка внутри группы
                "HREF" => "javascript:createButton({action:'EventBitrix',method:'turnOnTestSite',params:{makeTestSite:'true'}})",
                // - first parameter which class !
                // - second is which method !
                // - third is parameters to send to the method
                "ICON" => "bx-panel-button-icon bx-panel-install-solution-icon\"", //название CSS-класса с иконкой кнопки
                "SRC" => "",
                "ALT" => "преобразовать в тестовый сайт",
                "HINT" => array( //тултип кнопки
                    "TITLE" => "преобразовать в тестовый сайт",
                    "TEXT" => "" //HTML допускается
                ),
                "HINT_MENU" => array(),
                "MENU" => Array()
            ),
            $bReplace = false //заменить существующую кнопку?
        );

    }

}