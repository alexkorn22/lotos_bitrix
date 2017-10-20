<?if (!defined('INDEX_PAGE')) define('INDEX_PAGE', 'Y');?>
<?define("MAIN_PAGE", true);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("description", "Бытовая химия, хозтовары, товары для детей и косметика в Украине. Бесплатная доставка. 50 точек самовывоза.  +380676202244");
$APPLICATION->SetTitle("Интернет-магазин ЛОТОС - lotos.zp.ua");?>
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
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/new.png" alt="промоблок 1">
            <h2 class="tapTitle">Широкий ассортимент</h2>
            <div class="descriptionTitle">
                <p >Более <span class="fontFamilyRobotoboldText sizeText16">5000</span>
                    хозяйственных товаров,
                    бытовой химии и косметики,
                    которые регулярно обновляются.</p>
            </div>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/payment.png" alt="промоблок 2">
            <h2 class="tapTitle">Удобная оплата</h2>
            <div class="descriptionTitle"><p>Расплачивайтесь за покупку
                    <span class="fontFamilyRobotoboldText">любым способом</span>: наличными, безналичным расчётом, наложенным платежом.</p></div>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/delivery.png" alt="промоблок 3">
            <h2 class="tapTitle">Доставка за 1 день</h2>
            <div class="descriptionTitle"><p>для жителей Запорожья и 2-3 дня по всем городам Украины транспортными компаниями.</p></div>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/discont.png" alt="промоблок 4">
            <h2 class="tapTitle">Программа лояльности</h2>
            <div class="descriptionTitle"><p>В интернет-магазине ЛОТОС действуют <span class="fontFamilyRobotoboldText sizeText16">дисконты</span> постоянных клиентов и участников Мама-Клуба.</p></div>
        </div>
        <div class="item">
            <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/smile.png" alt="промоблок 5">
            <h2  class="tapTitle">Довольные покупатели</h2>
           <div class="descriptionTitle">
               <p>За последний год число наших постоянных клиентов достигло отметки <span class="fontFamilyRobotoboldText sizeText16">300 000</span>. Они доверяют нам, а мы благодарны им за это.</p>
           </div>
        </div>
        <!--<img src="--><?//=(SITE_TEMPLATE_PATH);?><!--/artorg/images/AboutUs.png" alt="промоблок">-->
    </div>
</div>


    <div id="infoPromo">
        <div class="limiter">
            <div class="itemContainer">
                <div class="item">
                    <a href="/promotions/">
                        <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/promo1.png" alt="Акции">
                    </a>
                </div>

                <div class="item">
                    <a href="/mama-club/">
                        <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/promo2.png" alt="Мама-клуб">
                    </a>
                </div>

                <div class="item">
                    <a href="/sertificate/">
                        <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/promo3.png" alt="Подарочные сертификаты">
                    </a>
                </div>

                <div class="item">
                    <a href="/catalog/detskie_tovary/gigiena/nabory_dlya_novorozhdennykh/">
                        <img src="<?=(SITE_TEMPLATE_PATH);?>/artorg/images/promo4.png" alt="Наборы от Комаровского">
                    </a>
                </div>
            </div>
        </div>

    </div>


<?$APPLICATION->IncludeComponent(
	"dresscode:offers.product", 
	".default", 
	array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENTS_COUNT" => "6",
		"HIDE_MEASURES" => "N",
		"HIDE_NOT_AVAILABLE" => "Y",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "catalog",
		"PICTURE_HEIGHT" => "200",
		"PICTURE_WIDTH" => "220",
		"PRODUCT_PRICE_CODE" => array(
		),
		"PROP_NAME" => "OFFERS",
		"PROP_VALUE" => array(
			0 => "_9",
		),
		"SORT_PROPERTY_NAME" => "SORT",
		"SORT_VALUE" => "ASC",
		"ITEMS_NEWS" => "Y",
		"TITLE_BLOCK" => "Новинки"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"dresscode:offers.product", 
	".default", 
	array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENTS_COUNT" => "6",
		"HIDE_MEASURES" => "N",
		"HIDE_NOT_AVAILABLE" => "Y",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "catalog",
		"PICTURE_HEIGHT" => "200",
		"PICTURE_WIDTH" => "220",
		"PRODUCT_PRICE_CODE" => array(
		),
		"PROP_NAME" => "TOP_SALES",
		"PROP_VALUE" => array(
			0 => "_51",
		),
		"SORT_PROPERTY_NAME" => "SORT",
		"SORT_VALUE" => "ASC",
		"ITEMS_NEWS" => "Y",
		"TITLE_BLOCK" => "Хиты продаж"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>