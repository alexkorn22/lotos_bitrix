<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Задайте вопрос");
?><h1>Контактная информация</h1>
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
		"ROOT_MENU_TYPE" => "about",
		"USE_EXT" => "N"
	)
);?>

	<ul class="contactList">
		<li>
		<table>
		<tbody>
		<tr>
			<td>
 <img alt="cont1.png" src="<?=SITE_TEMPLATE_PATH?>/images/cont1.png" title="cont1.png">
			</td>
			<td>
                +38 (061) 214-99-54<br>
                +38 (067) 620-22-44<br>
			</td>
		</tr>
		</tbody>
		</table>
 </li>
		<li>
		<table>
		<tbody>
		<tr>
			<td>
 <img alt="cont2.png" src="<?=SITE_TEMPLATE_PATH?>/images/cont2.png" title="cont2.png">
			</td>
			<td>
 <a href="mailto:info@lotos-trade.ua">info@lotos-trade.ua</a><br>
 <a href="mailto:order@lotos-trade.ua">order@lotos-trade.ua</a><br>
			</td>
		</tr>
		</tbody>
		</table>
 </li>
		<li>
		<table>
		<tbody>
		<tr>
			<td>
 <img alt="cont3.png" src="<?=SITE_TEMPLATE_PATH?>/images/cont3.png" title="cont3.png">
			</td>
			<td>
                г. Запорожье<br>
                ул. Музыкальная 2 (Космический м-н)    
			</td>
		</tr>
		</tbody>
		</table>
 </li>
		<li>
		<table>
		<tbody>
		<tr>
			<td>
 <img alt="cont4.png" src="<?=SITE_TEMPLATE_PATH?>/images/cont4.png" title="cont4.png">
			</td>
			<td>
				 Пн-Пт : с 08:00 до 17:00<br>
				 Сб, Вс : выходной<br>
			</td>
		</tr>
		</tbody>
		</table>
 </li>
	</ul>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(
			0 => "TYPECONTROL",
			1 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:47.794124000011436;s:10:\"yandex_lon\";d:35.22232199999999;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:35.22236491534423;s:3:\"LAT\";d:47.79413122952874;s:4:\"TEXT\";s:273:\"Центральный офис: ###RN###г. Запорожье, ул. Музыкальная 2 (Космический м-н) ###RN###Тел.: +380 (61) 214-99-54 ###RN###Эл. почта: ###RN###info@lotos-trade.ua ###RN###Отдел продаж: ###RN###order@lotos-trade.ua\";}}}",
		"MAP_HEIGHT" => "500",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		)
	),
	false
);?><br>
<br><br>
		<?$APPLICATION->IncludeComponent(
			"bitrix:form.result.new", 
			".default", 
			array(
				"CACHE_TIME" => "360000",
				"CACHE_TYPE" => "Y",
				"CHAIN_ITEM_LINK" => "",
				"CHAIN_ITEM_TEXT" => "",
				"EDIT_URL" => "",
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				"LIST_URL" => "",
				"SEF_MODE" => "N",
				"SUCCESS_URL" => "",
				"USE_EXTENDED_ERRORS" => "Y",
				"WEB_FORM_ID" => "2",
				"COMPONENT_TEMPLATE" => ".default",
				"VARIABLE_ALIASES" => array(
					"WEB_FORM_ID" => "WEB_FORM_ID",
					"RESULT_ID" => "RESULT_ID",
				)
			),
			false
		);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>