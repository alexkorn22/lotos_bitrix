<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О магазине");
?><h1>О магазине</h1>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"personal", 
	array(
		"COMPONENT_TEMPLATE" => "personal",
		"ROOT_MENU_TYPE" => "about",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
<div class="global-block-container">
	<div class="global-content-block">
		<div class="bx_page">
			Мы рады приветствовать вас на сайте нашей компании.
            <p>
                Интернет-магазин ЛОТОС – это всегда широкий выбор товаров бытовой химии, декоративной косметики, косметики по уходу за телом, волосами, товаров для детей, для дома, подарков и сувениров.
            </p>
            <p>
                Преимущества покупок в интернет-магазине ЛОТОС:
            </p>
            <ul>
                <li>привлекательная ценовая политика;</li>
                <li>круглосуточный прием заказов на сайте lotos24.com.ua;</li>
                <li>отсутствие очередей и тяжелых сумок;</li>
                <li>доставка заказа бесплатно*.</li>
            </ul>
            <p class="title">
                Наша цель
            </p>
            <p>
                Дать возможность ощутить себя особенным, предоставляя выгодные условия заказа и получения товара. Предоставить своим покупателям наилучшие условия в сфере обслуживания.&nbsp;
            </p>
            <p>
                *по г. Запорожье для заказов &nbsp;от 500,00 грн.
            </p>

			<p><b>НА НАШЕМ САЙТЕ К ВАШИМ УСЛУГАМ:</b></p>

			<ul>
			  <li>реальные и конкурентоспособные цены;</li>

			  <li>широчайший ассортимент товаров;</li>

			  <li>качественные описания и изображения товаров;</li>

			  <li>поиск товаров в магазине;</li>

			  <li>система обратной связи;</li>

			  <li>продажа только сертифицированных и имеющих легальное происхождение товаров;</li>

			  <li>гарантийное обслуживание купленных у нас товаров;</li>

			  <li>покупка товара, не выходя из дома или офиса;</li>

			  <li>быстрое согласование товара с клиентом для подтверждения заказа;</li>

			  <li>обмен товаров ненадлежащего качества и многое другое.</li>
			</ul>

			<p>Мы всегда рады общению с нашими клиентами. Если у вас есть какие-либо пожелания, предложения, замечания, касающиеся работы нашего Интернет-магазина - пишите нам, и мы с благодарностью примем ваше мнение во внимание:</p>

			<p><b>ЭЛЕКТРОННАЯ ПОЧТА</b>: <a href="mailto:info@lotos24.com.ua">info@lotos24.com.ua</a></p>
		</div>
	</div>
	<div class="global-information-block">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include", 
			".default", 
			array(
				"COMPONENT_TEMPLATE" => ".default",
				"AREA_FILE_SHOW" => "sect",
				"AREA_FILE_SUFFIX" => "information_block",
				"AREA_FILE_RECURSIVE" => "Y",
				"EDIT_TEMPLATE" => ""
			),
			false
		);?>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>