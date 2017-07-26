<?php
//НЕОБХОДИМО ПЕРЕНЕСТИ В ПАПКУ БИТРИКС
//при добавлении настроек нужно добавить описание в класс Config
//глобальные настройки сайта
$config = [
    'debug' => true, // признак что сайт не является рабочим
];

//настройки для сайта разработки
$configForTestSite = [

];

if ($config['debug']) {
    $res = array_merge($config, $configForTestSite);
} else {
    $res = $config;
}
return $res;