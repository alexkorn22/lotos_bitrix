<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (isset($_POST['UF_NUMBER_MCLUB'])) {
	$arResult['UF_NUMBER_MCLUB'] = $_POST['UF_NUMBER_MCLUB'];
}

if (isset($_POST['UF_TMP_PHONE'])) {
	$arResult['UF_TMP_PHONE'] = $_POST['UF_TMP_PHONE'];
}