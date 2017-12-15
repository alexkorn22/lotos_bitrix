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
                "TEXT" => 'Test Site',
                "TYPE" => "BIG", //BIG - большая кнопка, иначе маленькая
                "MAIN_SORT" => 10, //индекс сортировки для групп кнопок
                "SORT" => 10, //сортировка внутри группы
                "HREF" => "javascript:createButton({action:'EventBitrix',method:'turnOnTestSite',params:{makeTestSite:'true'}})",
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