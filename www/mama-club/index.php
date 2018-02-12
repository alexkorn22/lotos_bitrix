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
        'name' => 'УШАСТЫЙ НЯНЬ Влажные салфетки очищающие',
        'sale' => '-35%',
    ],
    [
        'code' => '002',
        'img' => 'product2.jpg',
        'name' => 'BURTI Baby Liquid Средство для стирки детского белья',
        'sale' => '-60%',
    ],
    [
        'code' => '003',
        'img' => 'product3.jpg',
        'name' => 'ORAL-B Stages Fruity Детская зубная паста',
        'sale' => '-60%',
    ],
    [
        'code' => '004',
        'img' => 'product4.jpg',
        'name' => 'GALINKA Стиральный порошок для детского белья',
        'sale' => '-30%',
    ],
    [
        'code' => '005',
        'img' => 'product5.jpg',
        'name' => 'BURTI Baby Compact Стиральный порошок для детского белья',
        'sale' => '-30%',
    ],
    [
        'code' => '006',
        'img' => 'product6.jpg',
        'name' => 'LIBERO Swimpants Medium подгузники (10-16 кг) 6шт',
        'sale' => '-25%',
    ],
    [
        'code' => '007',
        'img' => 'product7.jpg',
        'name' => 'LENOR Кондиционер детский (суперконцентрат)',
        'sale' => '-30%',
    ],
    [
        'code' => '008',
        'img' => 'product8.jpg',
        'name' => 'HUGGIES Elite Soft подгузники 2 (4-7кг)',
        'sale' => '-30%',
    ],
    [
        'code' => '009',
        'img' => 'product9.jpg',
        'name' => 'BURTI Baby Кондиционер для детского белья',
        'sale' => '-30%',
    ],
    [
        'code' => '010',
        'img' => 'product10.jpg',
        'name' => 'JOHNSON & JOHNSON Baby Ніжна турбота вологі серветки дитячі',
        'sale' => '-25%',
    ],
    [
        'code' => '011',
        'img' => 'product11.jpg',
        'name' => 'МАЛЕНЬКАЯ ФЕЯ Зубная паста гелевая Жемчужная улыбка',
        'sale' => '-20%',
    ],
    [
        'code' => '012',
        'img' => 'product12.jpg',
        'name' => 'NATURELLA Light multi-panty camomile прокладки ежедневные',
        'sale' => '-25%',
    ],
    [
        'code' => '013',
        'img' => 'product13.jpg',
        'name' => 'JOHNSON & JOHNSON Baby присыпка детская',
        'sale' => '-25%',
    ],
    [
        'code' => '014',
        'img' => 'product14.jpg',
        'name' => 'PAMPERS Pants Jumbo Maxi 4 (9-14 кг) подгузники-трусики',
        'sale' => '-15%',
    ],
    [
        'code' => '015',
        'img' => 'product15.jpg',
        'name' => 'JOHNSON & JOHNSON Baby прокладки для груди',
        'sale' => '-25%',
    ],
    [
        'code' => '016',
        'img' => 'product16.jpg',
        'name' => 'KOTEX Normal прокладки ежедневные',
        'sale' => '-30%',
    ],


];
?>


		<div class="headerMClub">
            Программа «Мама-клуб»
        </div>



<div class="mClubMainImgs">
    <div class="heading">
        <img src="<?=$ImgMClubPath?>logomclub.jpg">
        <a href="/personal/" class="buyCertificate">Активировать карту мама клуба</a>
    </div>

<!--        <img src="--><?//=$ImgMClubPath?><!--mainmclub1.png">-->
<!---->
<!--        <img src="--><?//=$ImgMClubPath?><!--mainmclub2.png">-->
<!---->
<!--        <div class="textFirstPhoto">-->
<!--            Приветствуем вас, дорогие мамы!<br>-->
<!--            Присоединяйтесь к программе <br>-->
<!--            "Мама-клуб" сети магазинов "Лотос",<br>-->
<!--            и совершайте покупки с ощутимой<br>-->
<!--            экономией!-->
<!--        </div>-->
<!---->
<!--        <div class="textSecondPhoto">-->
<!--                <p>В сети магазинов "Лотос" карта "Мама-клуб" предоставляет скидку 5% на другие группы товаров</p>-->
<!--                <p>Карта является собственностью сети магазинов "Лотос" и может быть изъята по решению организаторов программы</p>-->
<!--                <p>Срок действия карты неограниченный Карта действует во всех магазинах сети "Лотос" и на сайте lotos24.com.ua</p>-->
<!--        </div>-->


        <div class="header-banner2">
            <div class="left-content">

            </div>
            <div class="right-content">
                <span>
                    <p>В сети магазинов "Лотос" карта "Мама-клуб" предоставляет скидку 5% на другие группы товаров</p>
                    <p>Карта является собственностью сети магазинов "Лотос" и может быть изъята по решению организаторов программы</p>
                    <p>Срок действия карты неограниченный Карта действует во всех магазинах сети "Лотос" и на сайте lotos24.com.ua</p>
                </span>
            </div>
        </div>
</div>

<div class="photosMClub">
        <div class="itemContainer">
                <? foreach($groups as $group): ?>
                    <div class="item">
                        <div class="tabloid">
                        <a href="/catalog/?group_mama_club=<?=$group['code']?>" class="picture">
                            <img src="<?=$ImgMClubPath?><?=$group['img']?>" alt="">
                        </a>
                            <div class="title">
                                <a href="/catalog/?group_mama_club=<?=$group['code']?>" class="name">
                                    <span><?=$group['name']?></span>
                                </a>
                            </div>
                        <div class="sale">
                            <span><?=$group['sale']?></span>
                        </div>
                            <div class="details-item">
                                <a href="/catalog/?group_mama_club=<?=$group['code']?>" class="details-lnk">
                                    Узнать подробности
                                </a>
                            </div>

                        </div>

                    </div>
                <?endforeach;?>


         </div>
</div>

<p>Программа "Мама-клуб"</p>
<p>Приветствуем Вас, дорогие мамы!</p>

<p>В вашей семье произошло или скоро произойдет радостное событие - появление малыша.</p>

<p>Мы стремимся помочь и разделить с Вами радость материнства.</p>

<p>Присоединяйтесь к программе "Мама-Клуб" сети магазинов "Лотос" и совершайте покупки с ощутимой экономией!</p>

<p>Приобретите карту мама-клуба и активируйте ее на сайте lotos24.com.ua</p>

<p>Каждый месяц мы делаем действительно большие скидки в рамках программы «Лотос мама-клуб»</p>

<p>Стоимость карты «Мама-клуб» - всего 25 грн!</p>

<p>Внимание! Активировать карту или узнать подробности вы можете на нашем сайте lotos24.com.ua, в call-центр 0800300244, а также – у продавцов-консультантов сети магазинов «Лотос»<br><br></p>



<p>*в сети магазинов «Лотос» карта «Мама-клуб» дополнительно предоставляет скидку 5% на остальные группы товаров</p>

 <p>*скидки не суммируются</p>

<p>*карта является собственностью сети магазинов Лотос</p>

 <p>*правила участия в программе указаны на развороте карты «Мама-клуб»</p>

 <p>*сеть оставляет за собой право изменять условия и сроки акционной программы в одностороннем порядке</p>

 <p>*в акционной программе имеют право принимать участие только частные лица</p>

 <p>*количество акционных товаров одного вида не должно превышать 5 единиц в одном чеке</p>

<p>*акции действуют до окончания товара</p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


