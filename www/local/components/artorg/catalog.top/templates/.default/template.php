<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?if (!empty($arResult["ITEMS"])):?>
    <div id="topSalesCaption">
        <div class="wrapper">
            <div class="items">
                <p>ХИТЫ ПРОДАЖ</p>
            </div>
        </div>
    </div>
    <?$this->SetViewTarget("catalog_top_view_content_tab");?><div class="item"><a href="#"><?=GetMessage("TOP_PRODUCT_HEADER")?></a></div><?$this->EndViewTarget();?>
	<div class="tab item">
		<div id="topProduct">
			<div class="wrap">
				<ul class="slideBox productList mainServiceContainer">
					<?foreach ($arResult["ITEMS"] as $index => $arElement):?>
						<?
							$this->AddEditAction($arElement["ID"], $arElement["EDIT_LINK"], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arElement["ID"], $arElement["DELETE_LINK"], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							$arElement["IMAGE"] = CFile::ResizeImageGet($arElement["DETAIL_PICTURE"], array("width" => 240, "height" => 200), BX_RESIZE_IMAGE_PROPORTIONAL, false);
							if(empty($arElement["IMAGE"])){
								$arElement["IMAGE"]["src"] = SITE_TEMPLATE_PATH."/images/empty.png";
							}
						?>
						<li>
							<div class="item product" data-price-code="<?=implode("||", $arParams["PRICE_CODE"])?>">
						
								<div class="tooltip">
									<?if(!empty($arElement["PROPERTIES"]["OFFERS"]["VALUE"])):?>
										<div class="markerContainer">
											<?foreach ($arElement["PROPERTIES"]["OFFERS"]["VALUE"] as $ifv => $marker):?>
											    <div class="marker" style="background-color: <?=strstr($arElement["PROPERTIES"]["OFFERS"]["VALUE_XML_ID"][$ifv], "#") ? $arElement["PROPERTIES"]["OFFERS"]["VALUE_XML_ID"][$ifv] : "#424242"?>"><?=$marker?></div>
											<?endforeach;?>
										</div>
									<?endif;?>
									<?if(isset($arElement["PROPERTIES"]["RATING"]["VALUE"])):?>
									    <div class="rating">
									      <i class="m" style="width:<?=($arElement["PROPERTIES"]["RATING"]["VALUE"] * 100 / 5)?>%"></i>
									      <i class="h"></i>
									    </div>
								    <?endif;?>
									<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="picture">
										<img src="<?=(!empty($arElement["IMAGE"]["src"]) ? $arElement["IMAGE"]["src"] : SITE_TEMPLATE_PATH.'/images/empty.png')?>" alt="<?=$arElement["NAME"]?>">
										<span class="getFastView" data-id="<?=$arElement["ID"]?>"><?=GetMessage("FAST_VIEW_PRODUCT_LABEL")?></span>
									</a>
									<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="name"><span class="middle"><?=$arElement["NAME"]?></span></a>
<!--                                    --><?//=print_r($arElement)?>
									<?if(!empty($arElement["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"])):?>
										<a class="price"><?=$arElement["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"]?>
											<?if(!empty($arElement["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"]) && $arElement["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"] > 0):?>
												<s class="discount"><?=$arElement["MIN_PRICE"]["PRINT_VALUE"]?></s>
											<?endif;?>
										</a>
                                        <a href="#" class="addCart<?if($arElement["CAN_BUY"] === "N" || $arElement["CAN_BUY"] === false):?> disabled<?endif;?>" data-id="<?=$arElement["ID"]?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/incart.png" alt="" class="icon"><?=GetMessage("ADDCART_LABEL")?></a>
                                        <a href="#" class="fastBack label<?if($arElement["CAN_BUY"] === "N" || $arElement["CAN_BUY"] === false):?> disabled<?endif;?>" data-id="<?=$arElement["ID"]?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/fastBack.png" alt="" class="icon"><?=GetMessage("FASTBACK_LABEL")?></a>
									<?else:?>
										<a class="price"><?=GetMessage("REQUEST_PRICE_LABEL")?></a>
                                        <a href="#" class="addCart disabled requestPrice" data-id="<?=$arElement["ID"]?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/request.png" alt="" class="icon"><?=GetMessage("REQUEST_PRICE_BUTTON_LABEL")?></a>
                                        <a href="#" class="fastBack label<?if(empty($arElement["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"]) || $arElement["CAN_BUY"] === "N" || $arElement["CAN_BUY"] === false):?> disabled<?endif;?>" data-id="<?=$arElement["ID"]?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/fastBack.png" alt="" class="icon"><?=GetMessage("FASTBACK_LABEL")?></a>
									<?endif;?>
								</div>
							</div>
						</li>
					<?endforeach;?>
				    </ul>
				<a href="#" class="topBtnLeft"></a>
				<a href="#" class="topBtnRight"></a>
			</div>
		</div>
		<script>
			$("#topProduct").dwCarousel({
				leftButton: ".topBtnLeft",
				rightButton: ".topBtnRight",
				countElement: 4,
				resizeElement: true,
				resizeAutoParams: {
                    1920: 4,
                    1200: 3,
                    850: 2,
                    480: 1
				}
			});
		</script>
	</div>
<?endif;?>
