<?
/**
 * @var MainRegister $component
 * @var array $arResult
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$component = $this->__component;

if (isset($_POST['CHECKED_IS_MCLUB'])) {
	$arResult['CHECKED_IS_MCLUB'] = $_POST['CHECKED_IS_MCLUB'];
}
if (isset($_POST['FIO'])) {
    $arResult['FIO'] = $_POST['FIO'];
}
foreach ($arResult["VALUES"] as $key=>$value) {
    $arResult[$key] = $value;
}
$component->setDebugRegisterData();
$isSetAddValues = $component->isSetAddValues();
$arResult['showAddInfoBlock'] = '';
if ($isSetAddValues || (isset($arResult['CHECKED_IS_MCLUB']) && !empty($arResult['CHECKED_IS_MCLUB']))) {
    $arResult['showAddInfoBlock'] = 'Y';
}
