<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
	$this->setFrameMode(true);
?>
<div class="photosMClub">
    <div class="itemContainer">
            <?foreach ($arResult["ITEMS"] as $arElement):
                    $groupMamaClub = $arResult[$arElement['ID']]['groupMamaClub'];
                    $sale          = $arResult[$arElement['ID']]['sale'] ;
                    $imageSrc      = $arResult[$arElement['ID']]['imageSrc'] ;
                ?>
                <div class="item">
                    <div class="tabloid">
                        <a href="/catalog/?group_mama_club=<?=$groupMamaClub?>" class="picture">
                            <img src="<?=$imageSrc?>" alt="">
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
    </div>
</div>
