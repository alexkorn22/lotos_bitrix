<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
	$this->setFrameMode(true);
?>

<?foreach($arResult["ITEMS"] as $ixd => $arElement):?>
    <?$arColumns[$ixd]["ITEMS"][] = $arElement;?>
<?endforeach;?>
<div class="photosMClub">
    <div class="itemContainer">
        <?foreach ($arColumns as $key => $arColumn):?>
            <?foreach ($arColumn["ITEMS"] as $ix => $arElement):?>
                <?$image =  CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], array("width" => 430, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                <?php
                $db_props = CIBlockElement::GetProperty($arParams['IBLOCK_ID'], $arElement["ID"], "sort", "asc", array());
                while($ar_props = $db_props->Fetch()){
                    if($ar_props['CODE']=='group_mama_club'){
                        $groupMamaClub = $ar_props['VALUE'];
                    }
                    if($ar_props['CODE']=='sale'){
                        $sale = $ar_props['VALUE'];
                    }
                }
                ?>
                <div class="item">
                    <div class="tabloid">
                        <a href="/catalog/?group_mama_club=<?=$groupMamaClub?>" class="picture">
                            <img src="<?=$image["src"]?>" alt="">
                        </a>
                        <div class="title">
                            <a href="/catalog/?group_mama_club=<?=$groupMamaClub?>" class="name">
                                <span><?=$arElement["NAME"]?></span>
                            </a>
                        </div>
                        <div class="sale">
                            <span><?=$sale?></span>
                        </div>
                        <div class="details-item">
                            <a href="/catalog/?group_mama_club=<?=$groupMamaClub?>" class="details-lnk">
                                Узнать подробности
                            </a>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        <?endforeach;?>
    </div>
</div>
