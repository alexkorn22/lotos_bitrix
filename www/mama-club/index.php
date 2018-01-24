<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мама-клуб");
?>
<?php
$ImgMClubPath = '/local/templates/dresscodeV2/artorg/images/mama_club_imgs/';
$groups = [
    [
        'code' => '001',
        'img' => 'product1.jpg',
    ],
    [
        'code' => '002',
        'img' => 'product2.jpg',
    ],
    [
        'code' => '003',
        'img' => 'product3.jpg.',
    ],
    [
        'code' => '004',
        'img' => 'product4.jpg',
    ],
    [
        'code' => '005',
        'img' => 'product5.jpg',
    ],
    [
        'code' => '006',
        'img' => 'product6.jpg',
    ],
    [
        'code' => '007',
        'img' => 'product7.jpg',
    ],
    [
        'code' => '008',
        'img' => 'product8.jpg',
    ],
    [
        'code' => '009',
        'img' => 'product9.jpg',
    ],
    [
        'code' => '010',
        'img' => 'product10.jpg',
    ],
    [
        'code' => '011',
        'img' => 'product11.jpg',
    ],
    [
        'code' => '014',
        'img' => 'product14.jpg',
    ],
    [
        'code' => '013',
        'img' => 'product13.jpg',
    ],
    [
        'code' => '015',
        'img' => 'product15.jpg',
    ],
    [
        'code' => '016',
        'img' => 'product16.jpg',
    ],
    [
        'code' => '017',
        'img' => 'product17.jpg',
    ],


];
?>

<div class="mama_club_decoration">
	<div class="partner">
		<div class="logotype_partner">
		</div>
		<div class="label_partner headerMClub">
            Программа «Мама-клуб»
        </div>


<br/>
<div class="mClubMainImg">
            <img style="width: 100%" src="<?=$ImgMClubPath?>mainPhoto1.jpg">
        <div class="mclubMainText">
            <b class="header">Вітаємо вас, дорогі мами !</b><br/>
            У вашій родині відбулася, або незабаром відбудеться радісна подія - поява малюка.<br/>
            Ми прагнемо допомогти та розділити радість материнства з вами.
            </br>Приєднуйтесь до програми «Мама-клуб» мережі магазинів Лотос, та здійснюйте покупки з відчутною економією!<br/>
            *Акційна пропозиція діє з  <b class="date">01.01.18 - 31.03.18</b>
        </div>
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
        "ACTIVE_COMPONENT" => "N"
    )
);?>
<div class="photosMClub">
        <div class="itemContainer">
            <? foreach($groups as $group): ?>
                    <div class="item">
                        <a href="/catalog/?group_mama_club=<?=$group['code']?>">
                            <img src="<?=$ImgMClubPath?><?=$group['img']?>" alt="">
                        </a>
                    </div>
            <?endforeach;?>
         </div>
</div>
<br>

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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


