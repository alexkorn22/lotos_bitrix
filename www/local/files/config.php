<?php
//при добавлении настроек нужно добавить описание в класс Config
//глобальные настройки сайта
$config = [
    'debug' => true, // признак что сайт не является рабочим
    'typeMotherClub' => ['id' => 2, 'code' => 'mClub'],
    'telegram' => [
        'tokenBot' => '',
        'chatCallBack' => '',
    ],
];

//настройки для сайта разработки
$configForTestSite = [
    'setTempDataRegister' => true, //заполняются автоматически данные для регистрации
    'telegram' => [
        'tokenBot' => '277180941:AAEFGARnTdQGA-GILcyErqm5NImIFQcqRVs',
        'chatCallBack' => '',
    ],
];

if ($config['debug']) {
    $res = array_merge($config, $configForTestSite);
} else {
    $res = $config;
}
return $res;