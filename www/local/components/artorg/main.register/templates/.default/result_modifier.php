<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (isset($_POST['CHECKED_IS_MCLUB'])) {
	$arResult['CHECKED_IS_MCLUB'] = $_POST['CHECKED_IS_MCLUB'];
}
if (isset($_POST['FIO'])) {
    $arResult['FIO'] = $_POST['FIO'];
}
foreach ($arResult["VALUES"] as $key=>$value) {
    $arResult[$key] = $value;
}
if (empty($_POST)) {
    $arResult['EMAIL'] = uniqid() . '@test.com';
    $arResult['FIO'] = 'Корниенко Александр';
    $arResult['PASSWORD'] = '111111';
    $arResult['CONFIRM_PASSWORD'] = '111111';
    $arResult['CHECKED_IS_MCLUB'] = 'Y';
    $arResult['UF_NUMBER_MCLUB'] = '16541654651';
    $arResult['PERSONAL_MOBILE'] = '09884444444';
    $arResult['PERSONAL_CITY'] = 'Запорожье';
    $arResult['PERSONAL_STREET'] = 'Независимой Украины, 63';

}