<?
/**
 * @var array $data
 */
?>
<div id="modalSuccessRegister" class="modalForm" style="display: block;">
    <div class="elementContainer">
        <span class="heading">Вы успешно зарегистрированы</span>
        <a href="#" id="elementModalClose"></a>
        <div class="container-fluid modal_content">

                <?foreach ($data as $key=>$value) {
                    if ($key == 'UF_NUMBER_MCLUB') {
                        continue;
                    }
                    ?>
                    <div class="row center-xs">
                        <div class="col-md-3 col-xs-9 text-center">
                            <span class="title"><?=$value['title']?></span>
                        </div>
                        <div class="col-md-9 col-xs-9 text-left">
                            <span class="value"><?=$value['value']?></span>
                        </div>
                    </div>
                    <?
                }?>

            <div class="row">
                <div class="col-md-12 col-xs-12 text-center">
                    <p>
                        <?=$data['UF_NUMBER_MCLUB']['value'];?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xs-12 text-center">
                    <a href="#" class="close">Продолжить</a>
                </div>
                <div class="col-md-6 col-xs-12 text-center">
                    <a href="/personal/" class="close">Изменить данные</a>
                </div>
            </div>
        </div>
    </div>
</div>
