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