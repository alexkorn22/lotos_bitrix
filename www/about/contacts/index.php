<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Задайте вопрос");
?><h1>Контактная информация</h1>
	<a name="map"></a>
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
						<img alt="cont1.png" src="<?=SITE_TEMPLATE_PATH?>/images/cont1_new.svg" title="cont1.png">
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
						<img alt="cont2.png" src="<?=SITE_TEMPLATE_PATH?>/images/cont2_new.png" title="cont2.png">
					</td>
					<td>
						<a href="mailto:info@lotos24.com.ua">info@lotos24.com.ua</a><br>
						<a href="mailto:order@lotos24.com.ua">order@lotos24.com.ua</a><br>
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
						<img alt="cont3.png" src="<?=SITE_TEMPLATE_PATH?>/images/cont3_new.png" title="cont3.png">
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
						<img alt="cont4.png" src="<?=SITE_TEMPLATE_PATH?>/images/cont4_new.png" title="cont4.png">
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
	"bitrix:map.google.view", 
	".default", 
	array(
		"API_KEY" => "AIzaSyDA3ed3To6V0fxw8vspDx6v4LnV29_sQDg",
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(
			0 => "SMALL_ZOOM_CONTROL",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:48.272279382808;s:10:\"google_lon\";d:35.522138128125;s:12:\"google_scale\";i:7;s:10:\"PLACEMARKS\";a:59:{i:0;a:3:{s:4:\"TEXT\";s:279:\"Центральный офис: ###RN###г. Запорожье, ул. Музыкальная 2 (Космический м-н) ###RN###Тел.: +380 (61) 214-99-54 ###RN###Эл. почта: ###RN###info@lotos24.com.ua ###RN###Отдел продаж: ###RN###order@lotos24.com.ua\";s:3:\"LON\";d:35.222285985947;s:3:\"LAT\";d:47.794043461095;}i:1;a:3:{s:4:\"TEXT\";s:149:\"Магазин №1 (Бородинский)###RN###г. Запорожье, ул. Ладожская, 38###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.066084861755;s:3:\"LAT\";d:47.888618346766;}i:2;a:3:{s:4:\"TEXT\";s:140:\"Магазин №2 (Бабурка-1)###RN###г. Запорожье, ул. Курузова, 7###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.018961131573;s:3:\"LAT\";d:47.829582818251;}i:3;a:3:{s:4:\"TEXT\";s:201:\"Магазин №3 (Красная)###RN###г. Запорожье, ул. Моторостроителей, 11###RN###График работы###RN###Пн-пт 09.00-20.00###RN###Сб-вс 09:00-19:00\";s:3:\"LON\";d:35.195651650429;s:3:\"LAT\";d:47.819433256287;}i:4;a:3:{s:4:\"TEXT\";s:160:\"Магазин №4 (Малый рынок)###RN###г. Запорожье, ул. Запорожская, 12###RN###График работы 08.00-20.00###RN###\";s:3:\"LON\";d:35.164312720299;s:3:\"LAT\";d:47.825201606;}i:5;a:3:{s:4:\"TEXT\";s:145:\"Магазин №5 (ТЦ Украина)###RN###г. Запорожье, пр. Соборный, 147###RN###График работы 09.00-21.00\";s:3:\"LON\";d:35.131198167801;s:3:\"LAT\";d:47.842582019073;}i:6;a:3:{s:4:\"TEXT\";s:147:\"Магазин №6 (Профсоюзов)###RN###г. Запорожье, пл. Профсоюзов 3###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.142020881176;s:3:\"LAT\";d:47.841852925742;}i:7;a:3:{s:4:\"TEXT\";s:149:\"Магазин №7 (Энергодар-3)###RN###г. Энергодар, ул. Строителей, 22###RN###График работы 08.00-20.00\";s:3:\"LON\";d:34.655250906944;s:3:\"LAT\";d:47.50004317419;}i:8;a:3:{s:4:\"TEXT\";s:146:\"Магазин №8 (Пески-1)###RN###г. Запорожье, ул. Новокузнецкая, 6###RN###График работы 08.00-20.00\";s:3:\"LON\";d:35.18399477005;s:3:\"LAT\";d:47.783229124622;}i:9;a:3:{s:4:\"TEXT\";s:147:\"Магазин №9 (Бердянск-1)###RN###г. Бердянск, ул. Центральная, 49###RN###График работы 09.00-20.00\";s:3:\"LON\";d:36.793864667416;s:3:\"LAT\";d:46.752630551185;}i:10;a:3:{s:4:\"TEXT\";s:148:\"Магазин №10 (Бердянск-2)###RN###г. Бердянск, ул. Итальянская, 48###RN###График работы 09.00-20.00\";s:3:\"LON\";d:36.785262823105;s:3:\"LAT\";d:46.756550253228;}i:11;a:3:{s:4:\"TEXT\";s:159:\"Магазин №11 (Бердянск-4)###RN###г. Бердянск, Мелитопольское шоссе, 99###RN###График работы 09.00-20.00\";s:3:\"LON\";d:36.729792058468;s:3:\"LAT\";d:46.790292363734;}i:12;a:3:{s:4:\"TEXT\";s:153:\"Магазин №12 (Энергодар-1)###RN###г. Энергодар, ул. Украинская, 41-А###RN###График работы 08.00-20.00\";s:3:\"LON\";d:34.652407765388;s:3:\"LAT\";d:47.493055357063;}i:13;a:3:{s:4:\"TEXT\";s:168:\"Магазин №13 (Днепрорудное -2)###RN###г. Днепрорудное, ул. Центральная, 17-А###RN###График работы 08.00-19.00\";s:3:\"LON\";d:35.003001987934;s:3:\"LAT\";d:47.387489099097;}i:14;a:3:{s:4:\"TEXT\";s:160:\"Магазин №14 (Мелитополь-2)###RN###г. Мелитополь, ул. 50-летия Победы, 31###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.380855500698;s:3:\"LAT\";d:46.864796101038;}i:15;a:3:{s:4:\"TEXT\";s:146:\"Магазин №15 (Космос-1)###RN###г. Запорожье, ул. Космическая, 87###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.214512944221;s:3:\"LAT\";d:47.79067379589;}i:16;a:3:{s:4:\"TEXT\";s:148:\"Магазин №16 (Анголенко-1)###RN###г. Запорожье, ул. Базарная, 9-А###RN###График работы 08.00-20.00\";s:3:\"LON\";d:35.183828473091;s:3:\"LAT\";d:47.80966720216;}i:17;a:3:{s:4:\"TEXT\";s:167:\"Магазин №17 (Новомосковск-1)###RN###г. Новомосковск, ул. Гетьманская, 44-А###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.25990664959;s:3:\"LAT\";d:48.64091665089;}i:18;a:3:{s:4:\"TEXT\";s:161:\"Магазин №19 (Мелитополь-1)###RN###г. Мелитополь, ул. Б Хмельницкого, 19###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.373356044292;s:3:\"LAT\";d:46.841339243622;}i:19;a:3:{s:4:\"TEXT\";s:164:\"Магазин №20 (Мелитополь-4)###RN###г. Мелитополь, ул.Интеркультурная  291###RN###График работы 08.00-20.00\";s:3:\"LON\";d:35.334909260273;s:3:\"LAT\";d:46.858545853574;}i:20;a:3:{s:4:\"TEXT\";s:144:\"Магазин №21 (Бердянск-6)###RN###г. Бердянск, ул. Морозова,15-б###RN###График работы 08.00-20.00\";s:3:\"LON\";d:36.781864464283;s:3:\"LAT\";d:46.779526136421;}i:21;a:3:{s:4:\"TEXT\";s:183:\"Магазин №22 (Мелитополь-3)###RN###г. Мелитополь, ул. Героев Украины, 54/2 (Кирова,54/2)###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.360253453255;s:3:\"LAT\";d:46.84331700004;}i:22;a:3:{s:4:\"TEXT\";s:170:\"Магазин №23 (Мотор-Сич)###RN###г. Запорожье, пр. Моторостроителей, 54-А###RN###График работы 07.30-19.00###RN###\";s:3:\"LON\";d:35.199326276779;s:3:\"LAT\";d:47.826968181207;}i:23;a:3:{s:4:\"TEXT\";s:147:\"Магазин №24 (Грязнова-2)###RN###г. Запорожье, ул. Крепостная -6###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.165594816208;s:3:\"LAT\";d:47.818927166925;}i:24;a:3:{s:4:\"TEXT\";s:169:\"Магазин №25 (Грязнова-1)###RN###г. Запорожье, пр. Соборный, 81/Крепостная, 49###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.170143842697;s:3:\"LAT\";d:47.821933013224;}i:25;a:3:{s:4:\"TEXT\";s:165:\"Магазин №26 (Мелитополь-5)###RN###г. Мелитополь, ул. Университетская, 4/6###RN###График работы 07.00-17.00\";s:3:\"LON\";d:35.382392406464;s:3:\"LAT\";d:46.844566361515;}i:26;a:3:{s:4:\"TEXT\";s:144:\"Магазин №27 (Чаривная-2)###RN###г. Запорожье, ул. Чapивнaя 129-Б###RN###График работы 08.00-20.00\";s:3:\"LON\";d:35.219464302063;s:3:\"LAT\";d:47.83889504201;}i:27;a:3:{s:4:\"TEXT\";s:152:\"Магазин №28 (Мариуполь-3)###RN###г. Мариуполь, пр. Металлургов 160###RN###График работы 09.00-20.00\";s:3:\"LON\";d:37.564154863358;s:3:\"LAT\";d:47.126724397726;}i:28;a:3:{s:4:\"TEXT\";s:155:\"Магазин №29 (Кичкас-1)###RN###г. Запорожье, ул. Павлокичкасская,15а###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.165466070175;s:3:\"LAT\";d:47.886636230017;}i:29;a:3:{s:4:\"TEXT\";s:140:\"Магазин №30 (Интрейд)###RN###г. Запорожье, пр. Соборный, 53###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.174569487572;s:3:\"LAT\";d:47.818071666572;}i:30;a:3:{s:4:\"TEXT\";s:166:\"Магазин №31 (Покров) (Орджоникидзе)###RN###г. Покров, ул. Центральная, 28###RN###График работы  09.00-20.00\";s:3:\"LON\";d:34.108632802963;s:3:\"LAT\";d:47.655390012009;}i:31;a:3:{s:4:\"TEXT\";s:147:\"Магазин №32 (Пески-2)###RN###г. Запорожье, ул. Новокузнецкая 41###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.182723402977;s:3:\"LAT\";d:47.774272841024;}i:32;a:3:{s:4:\"TEXT\";s:124:\"Магазин №33 (Днепр)###RN###г. Днепр, пр.Героев-23д###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.068176984787;s:3:\"LAT\";d:48.411157641096;}i:33;a:3:{s:4:\"TEXT\";s:145:\"Магазин№34 (Каменское)###RN###г. Каменское, ул. Мурахтова,1а###RN###График работы 08:00-19.00\";s:3:\"LON\";d:34.613011479378;s:3:\"LAT\";d:48.510513444107;}i:34;a:3:{s:4:\"TEXT\";s:169:\"Магазин №35 (Верхнеднепровск)###RN###г.  Верхнеднепровск, пр. Шевченко, 14###RN###График работы 09.00-20.00\";s:3:\"LON\";d:34.341330528259;s:3:\"LAT\";d:48.657832565392;}i:35;a:3:{s:4:\"TEXT\";s:168:\"Магазин №36 (Бородинский–2)###RN###г. Запорожье, ул. Маршала Чуйкова, 29 Б###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.071063041687;s:3:\"LAT\";d:47.890103985264;}i:36;a:3:{s:4:\"TEXT\";s:144:\"Магазин №37 (Чаривная-1)###RN###г. Запорожье, ул. Чаривная, 44###RN###График работы 09.00-21.00\";s:3:\"LON\";d:35.212340354919;s:3:\"LAT\";d:47.837213491837;}i:37;a:3:{s:4:\"TEXT\";s:148:\"Магазин №38 (Энергодар-2)###RN###г. Энергодар, ул. Казацкая, 16а###RN###График работы 08.00-20.00\";s:3:\"LON\";d:34.65918302536;s:3:\"LAT\";d:47.483742863084;}i:38;a:3:{s:4:\"TEXT\";s:148:\"Магазин №39 (Вольнянск)###RN###г. Вольнянск, пер. Торговый, 3В###RN###График работы 08.00- 19.00\";s:3:\"LON\";d:35.436143875122;s:3:\"LAT\";d:47.943889184016;}i:39;a:3:{s:4:\"TEXT\";s:151:\"Магазин №40 (Кичкас-2)###RN###г. Запорожье, ул. Лизы Чайкиной, 54А###RN###График работы 09:00-20:00\";s:3:\"LON\";d:35.145703554153;s:3:\"LAT\";d:47.893485182771;}i:40;a:3:{s:4:\"TEXT\";s:145:\"Магазин №41 (Павлоград-1)###RN###г. Павлоград, ул.Шевченко,118###RN###График работы 09:00-19:00\";s:3:\"LON\";d:35.870189666748;s:3:\"LAT\";d:48.529984710156;}i:41;a:3:{s:4:\"TEXT\";s:179:\"Магазин №43 (Каменка-Днепровская)###RN###г. Каменка-Днепровская,  ул. Чкалова,8###RN###График работы 07.00-19.00\";s:3:\"LON\";d:34.416947364807;s:3:\"LAT\";d:47.484308402216;}i:42;a:3:{s:4:\"TEXT\";s:139:\"Магазин №45 (Мариуполь-1)###RN###г. Мариуполь, пр. Мира, 100###RN###График работы 09:00-20:00\";s:3:\"LON\";d:37.525327205658;s:3:\"LAT\";d:47.097988765115;}i:43;a:3:{s:4:\"TEXT\";s:138:\"Магазин №46 (Токмак)###RN###г. Токмак, ул. Центральная, 61###RN###График работы 08.00-20.00\";s:3:\"LON\";d:35.708549022675;s:3:\"LAT\";d:47.253441488412;}i:44;a:3:{s:4:\"TEXT\";s:157:\"Магазин №47 (Кривой Рог-1)###RN###г. Кривой Рог, пл. Освобождения, 1к###RN###График работы 09:00-20:00\";s:3:\"LON\";d:33.341837525368;s:3:\"LAT\";d:47.90870862716;}i:45;a:3:{s:4:\"TEXT\";s:142:\"Магазин №48 (Мариуполь-2)###RN###г. Мариуполь, ул. Орлика, 83###RN###График работы 09:00-20:00\";s:3:\"LON\";d:37.514614462852;s:3:\"LAT\";d:47.122983182223;}i:46;a:3:{s:4:\"TEXT\";s:155:\"Магазин №49 (Мариуполь-4)###RN###г. Мариуполь, прсп Металлургов, 47###RN###График работы 09:00-20:00\";s:3:\"LON\";d:37.545239925385;s:3:\"LAT\";d:47.09897291861;}i:47;a:3:{s:4:\"TEXT\";s:158:\"Магазин №50 (Павлоград-2)###RN###г. Павлоград, ул. Степного Фронта 15###RN###График работы 09:00-20:00\";s:3:\"LON\";d:35.869159698486;s:3:\"LAT\";d:48.540481164561;}i:48;a:3:{s:4:\"TEXT\";s:190:\"Магазин №52 (Вольногорск)###RN###г.Вольногорск, ул. Центральная 50###RN###График работы Магазин №52 (Вольногорск)\";s:3:\"LON\";d:34.012261033058;s:3:\"LAT\";d:48.478942017861;}i:49;a:3:{s:4:\"TEXT\";s:152:\"Магазин №53 (Кривой Рог 2)###RN###г. Кривой Рог, ул. Мусоргского 17###RN###График работы 9:00-20:00\";s:3:\"LON\";d:33.476977944374;s:3:\"LAT\";d:48.033255094573;}i:50;a:3:{s:4:\"TEXT\";s:140:\"Магазин №55 (Киев)###RN###г. Киев ул. Харьковское шоссе, 19###RN###График работы 10:00-20:30\";s:3:\"LON\";d:30.634099245071;s:3:\"LAT\";d:50.431800634366;}i:51;a:3:{s:4:\"TEXT\";s:134:\"Магазин №56 (Победа)###RN###г. Запорожье, ул. Победы, 57###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.11982023716;s:3:\"LAT\";d:47.840389307456;}i:52;a:3:{s:4:\"TEXT\";s:163:\"Магазин №57 (Бердянск-5)###RN###г. Бердянск, ул. Владимира Довганюка, 91###RN###График работы 09.00-20.00\";s:3:\"LON\";d:36.791962981224;s:3:\"LAT\";d:46.768344392347;}i:53;a:3:{s:4:\"TEXT\";s:147:\"Магазин Бердянск-3 Горобец###RN###г. Бердянск, ул. Свободы, 67###RN###График работы 08.00-20.00\";s:3:\"LON\";d:36.788878440857;s:3:\"LAT\";d:46.759183441937;}i:54;a:3:{s:4:\"TEXT\";s:143:\"Мелитополь-6 Набок###RN###г. Мелитополь, ул.50-лет Победы, 18###RN###График работы 09.00-20.00\";s:3:\"LON\";d:35.379720926285;s:3:\"LAT\";d:46.855088464609;}i:55;a:3:{s:4:\"TEXT\";s:195:\"Магазин №42 (Анголенко-2)###RN###г. Запорожье, пр. Соборный, 42а###RN###График работы###RN###пн-пт 08:00-20:00###RN###сб-вс 08:00-19:00 \";s:3:\"LON\";d:35.183925032616;s:3:\"LAT\";d:47.810841675431;}i:56;a:3:{s:4:\"TEXT\";s:166:\"Магазин №44 (Покровское)###RN###пгт. Покровское, ул. Центральная, 64###RN###График работы 09:00-20:00###RN###\";s:3:\"LON\";d:36.231756806374;s:3:\"LAT\";d:47.982866447199;}i:57;a:3:{s:4:\"TEXT\";s:181:\"Магазин №18 (Дненрорудное-1)###RN###г. Днепрорудное, ул. Ленина (Центральная), 2-А###RN###График работы 08.00-19.00\";s:3:\"LON\";d:35.003347992897;s:3:\"LAT\";d:47.386118036071;}i:58;a:3:{s:4:\"TEXT\";s:176:\"Магазин №54 (Первомайский)###RN###г. Первомайский, ул. Маршала гречки, 5-Д###RN###График работы 9:00-20:30###RN###\";s:3:\"LON\";d:36.214303672314;s:3:\"LAT\";d:49.400265706182;}}}",
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