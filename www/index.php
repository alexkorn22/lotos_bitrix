<?if (!defined('INDEX_PAGE')) define('INDEX_PAGE', 'Y');?>
<?define("MAIN_PAGE", true);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("keywords", "DELUXE");
$APPLICATION->SetPageProperty("description", "DELUXE");
$APPLICATION->SetTitle("DELUXE");?> <?$APPLICATION->IncludeComponent(
	"dresscode:slider",
	"promoSlider",
	Array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "slider",
		"PICTURE_HEIGHT" => "1080",
		"PICTURE_WIDTH" => "1920"
	)
);?>

    <div id="infoAbout">
        <div class="wrapper">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/AboutUs.png" alt="промоблок">
        </div>
    </div>


<?$APPLICATION->IncludeComponent(
	"artorg:offers.product",
	".default",
	Array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENTS_COUNT" => "10",
		"HIDE_MEASURES" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "catalog",
		"PICTURE_HEIGHT" => "200",
		"PICTURE_WIDTH" => "220",
		"PRODUCT_PRICE_CODE" => array(),
		"PROP_NAME" => "OFFERS",
		"PROP_VALUE" => array(0=>"_9",),
		"SORT_PROPERTY_NAME" => "SORT",
		"SORT_VALUE" => "ASC"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?>
<div id="footerTabsCaption">
    <div class="wrapper">
        <div class="items">
            <p>ХИТЫ ПРОДАЖ</p>
        </div>
    </div>
</div>
<div id="footerTabs">
    <div class="wrapper">
        <div class="items">
            <?$APPLICATION->IncludeComponent(
                "artorg:catalog.top",
                ".default",
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID" => "10",
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_ORDER" => "asc",
                    "ELEMENT_SORT_FIELD2" => "id",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "FILTER_NAME" => "",
                    "HIDE_NOT_AVAILABLE" => "Y",
                    "ELEMENT_COUNT" => "12",
                    "LINE_ELEMENT_COUNT" => "1",
                    "PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "OFFERS_FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "OFFERS_PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "OFFERS_SORT_FIELD" => "sort",
                    "OFFERS_SORT_ORDER" => "asc",
                    "OFFERS_SORT_FIELD2" => "id",
                    "OFFERS_SORT_ORDER2" => "desc",
                    "OFFERS_LIMIT" => "5",
                    "VIEW_MODE" => "SECTION",
                    "TEMPLATE_THEME" => "blue",
                    "PRODUCT_DISPLAY_MODE" => "N",
                    "ADD_PICT_PROP" => "-",
                    "LABEL_PROP" => "-",
                    "SHOW_DISCOUNT_PERCENT" => "N",
                    "SHOW_OLD_PRICE" => "N",
                    "SHOW_CLOSE_POPUP" => "N",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_COMPARE" => "Сравнить",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "SECTION_URL" => "",
                    "DETAIL_URL" => "",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "PRODUCT_QUANTITY_VARIABLE" => "",
                    "SEF_MODE" => "N",
                    "SEF_RULE" => "",
                    "CACHE_TYPE" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_FILTER" => "N",
                    "ACTION_VARIABLE" => "action",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "USE_PRICE_COUNT" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "PRICE_VAT_INCLUDE" => "Y",
                    "CONVERT_CURRENCY" => "N",
                    "BASKET_URL" => "/personal/basket.php",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "ADD_PROPERTIES_TO_BASKET" => "Y",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRODUCT_PROPERTIES" => array(
                    ),
                    "OFFERS_CART_PROPERTIES" => array(
                    ),
                    "ADD_TO_BASKET_ACTION" => "ADD",
                    "DISPLAY_COMPARE" => "N",
                    "ROTATE_TIMER" => "30"
                ),
                false
            );?>



        </div>
    </div>
</div>

<div id="infoPromo1" >
    <div class="wrapper">
    <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/promo.png" alt="промоблок">
        </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>