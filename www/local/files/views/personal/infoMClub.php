<?php

/**
 * @var $dataUser
 */
$inputType = 'hidden';
$number = '';
?>
<span class="heading">Мама клуб</span>
<? if ($dataUser['UF_IS_MCLUB']):?>
    <p>Вы состоите в Мама-клубе</p>
<?elseif ($dataUser['UF_CHECK_M_CLUB'] == 1):?>
    <p>Ваш номер карты участника Мама-клуба проверяется</p>
<?else:?>
    <label>Введите номер карты участника Мама-клуба</label>
    <?$inputType = 'text';?>
<?endif;?>
<input type="<?=$inputType?>" name="UF_NUMBER_MCLUB" value="<?=$number?>" class="inputTel">