<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мама-клуб");
?><div class="mama_club_decoration">
	<div class="partner">
		<div class="logotype_partner">
		</div>
		<div class="label_partner">
 <span style="font-size: 36pt;"><span style="color: #00a650;">Программа «Мама-клуб»</span><span style="color: #00a650;"></span></span><br>
 <img width="371" src="/local/templates/dresscodeV2/artorg/images/mama_club_banner.png" height="226"><br>
		</div>
	</div>

    <br/>
	<p>Программа "Мама-клуб"</p>
    <p>Приветствуем Вас, дорогие мамы!</p>

    <p>В вашей семье произошло или скоро произойдет радостное событие - появление малыша.</p>

    <p>Мы стремимся помочь и разделить с Вами радость материнства.</p>

    <p>Присоединяйтесь к программе "Мама-Клуб" сети магазинов "Лотос" и совершайте покупки с ощутимой экономией!</p>

    <p>Приобретите карту мама-клуба и активируйте ее на сайте lotos24.com.ua</p>

    <p>Каждый месяц мы делаем действительно большие скидки в рамках программы «Лотос мама-клуб»</p>

    <p>Стоимость карты «Мама-клуб» - всего 25 грн!</p>

    <p>Внимание! Активировать карту или узнать подробности вы можете на нашем сайте lotos24.com.ua, в call-центр 0800300244, а также – у продавцов-консультантов сети магазинов «Лотос»</p>

    <br><br>

    <p>*в сети магазинов «Лотос» карта «Мама-клуб» дополнительно предоставляет скидку 5% на остальные группы товаров</p>

    <p>*скидки не суммируются</p>

    <p>*карта является собственностью сети магазинов Лотос</p>

    <p>*правила участия в программе указаны на развороте карты «Мама-клуб»</p>

    <p>*сеть оставляет за собой право изменять условия и сроки акционной программы в одностороннем порядке</p>

    <p>*в акционной программе имеют право принимать участие только частные лица</p>

    <p>*количество акционных товаров одного вида не должно превышать 5 единиц в одном чеке</p>

    <p>*акции действуют до окончания товара</p>
</div>
<?$APPLICATION->IncludeComponent(
    "dresscode:offers.product",
    "slideMamaClub",
    array(
        "CACHE_TIME" => "3600000",
        "CACHE_TYPE" => "Y",
        "COMPONENT_TEMPLATE" => "slideMamaClub",
        "ELEMENTS_COUNT" => "6",
        "HIDE_MEASURES" => "N",
        "HIDE_NOT_AVAILABLE" => "N",
        "IBLOCK_ID" => "10",
        "IBLOCK_TYPE" => "catalog",
        "PICTURE_HEIGHT" => "200",
        "PICTURE_WIDTH" => "220",
        "PRODUCT_PRICE_CODE" => array(

        ),
        "PROP_NAME" => "UCHASTVUET_V_MAMA_KLUB",
        "TITLE_BLOCK" => "Товары  «Мама-клуба» ",
        "PROP_VALUE" => array(
            0 => "_560",
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
<div style="background: lightblue; border-radius: 20px;">
    <br/>
    <a href="/catalog/?group_mama_club=003">
        <img src="/local/templates/dresscodeV2/artorg/images/mama_club_imgs/product1.png" alt="" height="300" width="301">
    </a>
    <a href="/catalog/?group_mama_club=004">
        <img src="/local/templates/dresscodeV2/artorg/images/mama_club_imgs/product2.jpg" alt="" height="300" width="301">
    </a>
    <a href="/catalog/?group_mama_club=005">
        <img src="/local/templates/dresscodeV2/artorg/images/mama_club_imgs/product3.jpg" alt="" height="300" width="301">
    </a>
    <a href="/catalog/?group_mama_club=006">
        <img src="/local/templates/dresscodeV2/artorg/images/mama_club_imgs/product2.jpg" alt="" height="300" width="301">
    </a>
    <br/><br/>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


