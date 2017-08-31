<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//при добавлении настроек нужно добавить описание в класс Config
//глобальные настройки сайта
$config = [
    'debug' => true, // признак что сайт не является рабочим
    'typeMotherClub' => ['id' => 2, 'code' => 'mClub'],
    'telegram' => [
        'tokenBot' => '421533964:AAEPLpbkuqGERhgBDDSHKYTcpVp8OrNGYys',
        'chatCallBack' => '-247750923',
    ],
];

//настройки для сайта разработки
$configForTestSite = [
    'setTempDataRegister' => true, //заполняются автоматически данные для регистрации
    'telegram' => [
        'tokenBot' => '421533964:AAEPLpbkuqGERhgBDDSHKYTcpVp8OrNGYys',
        'chatCallBack' => '-247750923',
    ],
];

if ($config['debug']) {
    $res = array_merge($config, $configForTestSite);
} else {
    $res = $config;
}
return $res;