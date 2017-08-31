<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//при добавлении настроек нужно добавить описание в класс Config
//глобальные настройки сайта
$config = [
    'debug' => true, // признак что сайт не является рабочим
    'typeMotherClub' => ['id' => 2, 'code' => 'mClub'],
    'telegram' => [
        'tokenBot' => '383773109:AAGi6MZ4OfFWs5HxaWYr6yF2DqUtS7E8Eq8',
        'chatCallBack' => '-247989205',
    ],
];

//настройки для сайта разработки
$configForTestSite = [
    'setTempDataRegister' => true, //заполняются автоматически данные для регистрации
    'telegram' => [
        'tokenBot' => '383773109:AAGi6MZ4OfFWs5HxaWYr6yF2DqUtS7E8Eq8',
        'chatCallBack' => '-247989205',
    ],
];

if ($config['debug']) {
    $res = array_merge($config, $configForTestSite);
} else {
    $res = $config;
}
return $res;