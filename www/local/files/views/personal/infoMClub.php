<?php

/**
 * @var $dataUser
 */
$inputType = 'hidden';
$number = '';
$user = new UserTools;
?>
<span class="heading">Мама клуб</span>
<? if ($user->isMamaClub()):?>
    <p>Вы состоите в Мама-клубе</p>
<?else:?>
    <label>Введите номер карты участника Мама-клуба</label>
    <?$inputType = 'text';?>
<?endif;?>
<input type="<?=$inputType?>" name="UF_NUMBER_MCLUB" value="<?=$number?>" class="inputTel">