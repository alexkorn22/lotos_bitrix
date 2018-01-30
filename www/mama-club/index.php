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


		<div class="headerMClub">
            Программа «Мама-клуб»
        </div>



<div class="mClubMainImgs">
    <div class="heading">
        <img src="<?=$ImgMClubPath?>logomclub.jpg">
        <a href="/personal/" class="buyCertificate">Активировать карту мама клуба</a>
    </div>

        <img src="<?=$ImgMClubPath?>mainmclub1.png">

        <img src="<?=$ImgMClubPath?>mainmclub2.png">

        <div class="textFirstPhoto">
            <div>
                <p class="header">Вітаємо вас, дорогі мами!</p>
                 Приєднуйтесь до програми "Мама-клуб"<br/>
                 мережі магазинів «Лотос», та здійснюйте<br/>
                 покупки для ваших малюків з відчутною економією
            </div>
        </div>

        <div class="textSecondPhoto">
            <div>
                <p>В роздрібних магазинах картка "Мама-клубу" надає знижку 5% на інші товари.</p>
                <p>Картка є власністю мережі магазинів "Лотос" та може бути вилучена за рішенням організаторів програми.</p>
                <p>Термін дії картки необмежений.</p>
                <p>Картка дійсна в усіх магазинах мережі "Лотос" та на сайті lotos24.com.ua.</p>
            </div>
        </div>

</div>

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


