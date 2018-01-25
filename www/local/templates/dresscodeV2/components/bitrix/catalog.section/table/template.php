<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?
$useAvailable = false;
?>
<?if (!empty($arResult["ITEMS"])):?>
<?
	if ($arParams["DISPLAY_TOP_PAGER"]){
		?><? echo $arResult["NAV_STRING"]; ?><?
	}

    $user = new UserTools;
    $hrefMClubBuyBtn = $user->getHrefMClubBuyBtn();
?>

	<div id="catalogTableList">
		<?foreach($arResult["ITEMS"] as $arElement):?>
			<?
				$this->AddEditAction($arElement["ID"], $arElement["EDIT_LINK"], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arElement["ID"], $arElement["DELETE_LINK"], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array());
				$arElement["IMAGE"] = CFile::ResizeImageGet($arElement["DETAIL_PICTURE"], array("width" => 290, "height" => 340), BX_RESIZE_IMAGE_PROPORTIONAL, false);
				if(empty($arElement["IMAGE"])){
					$arElement["IMAGE"]["src"] = SITE_TEMPLATE_PATH."/images/empty.png";
				}
			?>
			<div class="itemRow item" id="<?=$this->GetEditAreaId($arElement["ID"]);?>" data-hide-measure="<?=$arParams["HIDE_MEASURES"]?>" data-price-code="<?=implode("||", $arParams["PRICE_CODE"])?>">
				<div class="column">
					<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="picture">
						<img src="<?=$arElement["IMAGE"]["src"]?>" alt="<?if(!empty($arElement["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_ALT"])):?><?=$arElement["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_ALT"]?><?else:?><?=$arElement["NAME"]?><?endif;?>" title="<?if(!empty($arElement["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"])):?><?=$arElement["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]?><?else:?><?=$arElement["NAME"]?><?endif;?>">
					</a>
				</div>
				<div class="column">
					<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="name"><?=$arElement["NAME"]?></a>
				</div>
				<div class="column">
					<?if(isset($arElement["PROPERTIES"]["RATING"]["VALUE"])):?>
					    <div class="rating">
					      <i class="m" style="width:<?=($arElement["PROPERTIES"]["RATING"]["VALUE"] * 100 / 5)?>%"></i>
					      <i class="h"></i>
					    </div>
				    <?endif;?>
				</div>
				<?if(isset($arElement["PROPERTIES"]["CML2_ARTICLE"])):?>
					<div class="column">
						<?if(!empty($arElement["PROPERTIES"]["CML2_ARTICLE"]["VALUE"])):?>
							<div class="article">
								<?=GetMessage("CATALOG_ART_LABEL")?><?=$arElement["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?>
							</div>
						<?endif;?>
					</div>
				<?endif;?>
				<div class="column">
					<?if(!empty($arElement["MIN_PRICE"])):?>
						<?if($user->isSetGroupMClub() || $arElement["COUNT_PRICES"] > 1 ):?>
							<a href="#" class="price getPricesWindow" data-id="<?=$arElement["ID"]?>">
								<span class="priceIcon"></span><?=$arElement["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"]?>
								<?if($arParams["HIDE_MEASURES"] != "Y" && !empty($arResult["MEASURES"][$arElement["CATALOG_MEASURE"]]["SYMBOL_RUS"])):?>
									<span class="measure"> / <?=$arResult["MEASURES"][$arElement["CATALOG_MEASURE"]]["SYMBOL_RUS"]?></span>
								<?endif;?>
								<?if(!empty($arElement["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"]) && $arElement["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"] > 0):?>
									<s class="discount"><?=$arElement["MIN_PRICE"]["PRINT_VALUE"]?></s>
								<?endif;?>
							</a>
						<?else:?>
							<a class="price"><?=$arElement["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"]?>
								<?if($arParams["HIDE_MEASURES"] != "Y" && !empty($arResult["MEASURES"][$arElement["CATALOG_MEASURE"]]["SYMBOL_RUS"])):?>
									<span class="measure"> / <?=$arResult["MEASURES"][$arElement["CATALOG_MEASURE"]]["SYMBOL_RUS"]?></span>
								<?endif;?>
								<?if(!empty($arElement["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"]) && $arElement["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"] > 0):?>
									<s class="discount"><?=$arElement["MIN_PRICE"]["PRINT_VALUE"]?></s>
								<?endif;?>
							</a>
						<?endif;?>
					<?else:?>
						<a class="price"><?=GetMessage("TABLE_REQUEST_PRICE_LABEL")?></a>
					<?endif;?>
				</div>
				<div class="column">
					<?if(!empty($arElement["MIN_PRICE"])):?>
                        <?if($user->showCustomBuyBtn()):?>
                            <a href="<?=$hrefMClubBuyBtn?>" class="addCart">В мама клуб</a>
                        <?else:?>
                            <a href="#" class="addCart<?if($arElement["CAN_BUY"] === false || $arElement["CAN_BUY"] === "N"):?> disabled<?endif;?>" data-id="<?=$arElement["ID"]?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/incart.png" alt="" class="icon"><?=GetMessage("ADDCART_LABEL")?></a>
                        <?endif;?>					<?else:?>
						<a href="#" class="addCart disabled requestPrice" data-id="<?=$arElement["ID"]?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/request.png" alt="" class="icon"><?=GetMessage("TABLE_REQUEST_PRICE_BUTTON_LABEL")?></a>
					<?endif;?>
				</div>
        <?if(!$user->showCustomBuyBtn()):?>
                    <div class="column">
                        <div class="optional">
                            <div class="row">
                                <a href="#" class="fastBack label<?if(empty($arElement["MIN_PRICE"]) || $arElement["CAN_BUY"] === "N" || $arElement["CAN_BUY"] === false):?> disabled<?endif;?>" data-id="<?=$arElement["ID"]?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/fastBack.png" alt="" class="icon"><?=GetMessage("FASTBACK_LABEL")?></a>
    <!--							<a href="#" class="addCompare label" data-id="--><?//=$arElement["ID"]?><!--">-->
    <!--								<img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/compare.png" alt="" class="icon">-->
    <!--								--><?//=GetMessage("COMPARE_LABEL")?>
    <!--							</a>-->
                            </div>
                        </div>
                    </div>
        <?endif;?>
				<div class="column">
					<div class="optional">
						<div class="row">
<!--							<a href="#" class="addWishlist label" data-id="--><?//=$arElement["~ID"]?><!--">-->
<!--								<img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/wishlist.png" alt="" class="icon">-->
<!--								--><?//=GetMessage("WISHLIST_LABEL")?>
<!--							</a>-->
							<?if ($useAvailable):?>
								<?if($arElement["CATALOG_QUANTITY"] > 0):?>
									<?if(!empty($arElement["STORES"])):?>
										<a href="#" data-id="<?=$arElement["ID"]?>" class="inStock label changeAvailable getStoresWindow"><img src="<?=SITE_TEMPLATE_PATH?>/images/inStock.png" alt="<?=GetMessage("AVAILABLE")?>" class="icon"><span><?=GetMessage("AVAILABLE")?></span></a>
									<?else:?>
										<span class="inStock label changeAvailable"><img src="<?=SITE_TEMPLATE_PATH?>/images/inStock.png" alt="<?=GetMessage("AVAILABLE")?>" class="icon"><span><?=GetMessage("AVAILABLE")?></span></span>
									<?endif;?>
								<?else:?>
									<?if($arElement["CAN_BUY"] === true || $arElement["CAN_BUY"] === "Y"):?>
										<a class="onOrder label changeAvailable"><img src="<?=SITE_TEMPLATE_PATH?>/images/onOrder.png" alt="<?=GetMessage("ON_ORDER")?>" class="icon"><?=GetMessage("ON_ORDER")?></a>
									<?else:?>
										<a class="outOfStock label changeAvailable"><img src="<?=SITE_TEMPLATE_PATH?>/images/outOfStock.png" alt="<?=GetMessage("NOAVAILABLE")?>" class="icon"><?=GetMessage("NOAVAILABLE")?></a>
									<?endif;?>
								<?endif;?>
							<?endif;?>

						</div>
					</div>
				</div>
				<div class="column out">
					<a href="#" class="removeFromWishlist" data-id="<?=$arElement["~ID"]?>"></a>
				</div>
			</div>
		<?endforeach;?>
	</div>
<?
	if ($arParams["DISPLAY_BOTTOM_PAGER"]){
		?><? echo $arResult["NAV_STRING"]; ?><?
	}
?>

	<?if(empty($_GET["PAGEN_1"])):?>
		<div><?=$arResult["~DESCRIPTION"]?></div>
	<?endif;?>
	
<?else:?>
	<div id="empty">
		<div class="emptyWrapper">
			<div class="pictureContainer">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/emptyFolder.png" alt="<?=GetMessage("EMPTY_HEADING")?>" class="emptyImg">
			</div>
			<div class="info">
				<h3><?=GetMessage("EMPTY_HEADING")?></h3>
				<p><?=GetMessage("EMPTY_TEXT")?></p>
				<a href="<?=SITE_DIR?>" class="back"><?=GetMessage("MAIN_PAGE")?></a>
			</div>
		</div>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "emptyMenu", Array(
			"ROOT_MENU_TYPE" => "left",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => "",
				"MAX_LEVEL" => "1",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "Y",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N",
			),
			false
		);?>
	</div>
<?endif;?>