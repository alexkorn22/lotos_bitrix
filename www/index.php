<?if (!defined('INDEX_PAGE')) define('INDEX_PAGE', 'Y');?>
<?define("MAIN_PAGE", true);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Бытовая химия, хозтовары, товары для детей и косметика в Украине. Бесплатная доставка. 50 точек самовывоза.  +380676202244");
$APPLICATION->SetTitle("Интернет-магазин ЛОТОС - lotos24");?>
<?$APPLICATION->IncludeComponent(
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
    <div class="limiter">
        <div class="infoAbouthHeader">
            <h1>Интернет-магазин ЛОТОС: бытовая химия и косметика</h1>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/products.svg" alt="Products">
            <h2 class="tapTitle">Широкий ассортимент</h2>
            <div class="descriptionTitle">
                <p >Более <span class="fontFamilyRobotoboldText sizeText16">5000</span>
                    хозяйственных товаров,
                    бытовой химии и косметики,
                    которые регулярно обновляются.</p>
            </div>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/payment.svg" alt="Payment">
            <h2 class="tapTitle">Удобная оплата</h2>
            <div class="descriptionTitle"><p>Расплачивайтесь за покупку
                    <span class="fontFamilyRobotoboldText">любым способом</span>: наличными, безналичным расчётом, наложенным платежом.</p></div>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/delivery.svg" alt="Delivery">
            <h2 class="tapTitle">Доставка за 1 день</h2>
            <div class="descriptionTitle"><p>для жителей Запорожья и 2-3 дня по всем городам Украины транспортными компаниями.</p></div>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/discount.svg" alt="Discount">
            <h2 class="tapTitle">Программа лояльности</h2>
            <div class="descriptionTitle"><p>В интернет-магазине ЛОТОС действуют <span class="fontFamilyRobotoboldText sizeText16">дисконты</span> постоянных клиентов и участников Мама-Клуба.</p></div>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/smile.svg" alt="Smile">
            <h2  class="tapTitle">Довольные покупатели</h2>
           <div class="descriptionTitle">
               <p>За последний год число наших постоянных клиентов достигло отметки <span class="fontFamilyRobotoboldText sizeText16">300 000</span>. Они доверяют нам, а мы благодарны им за это.</p>
           </div>
        </div>
        <!--<img src="--><?//=(SITE_TEMPLATE_PATH);?><!--/artorg/images/AboutUs.png" alt="промоблок">-->
    </div>
</div>




<?$APPLICATION->IncludeComponent(
    "dresscode:offers.product",
    "slide",
    array(
        "CACHE_TIME" => "3600000",
        "CACHE_TYPE" => "Y",
        "COMPONENT_TEMPLATE" => "slide",
        "ELEMENTS_COUNT" => "6",
        "HIDE_MEASURES" => "N",
        "HIDE_NOT_AVAILABLE" => "N",
        "IBLOCK_ID" => "10",
        "IBLOCK_TYPE" => "catalog",
        "PICTURE_HEIGHT" => "200",
        "PICTURE_WIDTH" => "220",
        "PRICE_CODE" => array(
            0 => 'BASE'
        ),
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "PROP_NAME" => "OFFERS",
        "TITLE_BLOCK" => "Новинки",
        "PROP_VALUE" => array(
            0 => "_9",
        ),
        "SORT_PROPERTY_NAME" => "SORT",
        "SORT_VALUE" => "ASC",
        "ITEMS_NEWS" => "Y"
    ),
    false,
    array(
        "ACTIVE_COMPONENT" => "Y"
    )
);?>
    <!--    <br/>-->
<?$APPLICATION->IncludeComponent(
    "dresscode:offers.product",
    "slide",
    array(
        "CACHE_TIME" => "3600000",
        "CACHE_TYPE" => "Y",
        "COMPONENT_TEMPLATE" => "slide",
        "ELEMENTS_COUNT" => "6",
        "HIDE_MEASURES" => "N",
        "HIDE_NOT_AVAILABLE" => "N",
        "IBLOCK_ID" => "10",
        "IBLOCK_TYPE" => "catalog",
        "PICTURE_HEIGHT" => "200",
        "PICTURE_WIDTH" => "220",
        "PRODUCT_PRICE_CODE" => array(
        ),
        "PROP_NAME" => "TOP_SALES",
        "TITLE_BLOCK" => "Хиты продаж",
        "PROP_VALUE" => array(
            0 => "_51",
        ),
        "SORT_PROPERTY_NAME" => "SORT",
        "SORT_VALUE" => "ASC",
        "ITEMS_NEWS" => "Y"
    ),
    false,
    array(
        "ACTIVE_COMPONENT" => "Y"
    )
);?>

<?
if(App::$config->usePromoBlock == 'Y'):?>
<div id="infoPromo">
    <div class="limiter">
        <div class="itemContainer">
            <div class="item">
                <a href="/promotions/">
                <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/shares.png" alt="Акции">
                </a>
            </div>

            <div class="item">
                <a href="/mama-club/">
                <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/mother-club.png" alt="Мама-клуб">
                </a>
            </div>

            <div class="item">
                <a href="/certificates/">
                <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/sertificates.png" alt="Подарочные сертификаты">
                </a>
            </div>

            <div class="item">
                <a href="/catalog/nabory_dlya_novorozhdennykh/">
                <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/komarovsky.png" alt="Наборы от Комаровского">
                </a>
            </div>
        </div>
    </div>

</div>
<?endif;?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>