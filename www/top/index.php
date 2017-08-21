<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Хиты продаж");?><h1>Хиты продаж</h1>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"personal",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"COMPONENT_TEMPLATE" => "personal",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "left2",
		"USE_EXT" => "N"
	)
);?>
<?$APPLICATION->IncludeComponent(
	"dresscode:simple.offers",
	"",
	Array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "N",
		"HIDE_MEASURES" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "catalog",
		"PRICE_CODE" => array("BASE"),
		"PROPERTY_CODE" => array("",""),
		"PROP_NAME" => "TOP_SALES",
		"PROP_VALUE" => "51"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>