<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$this->setFrameMode(true);
	$propertyCounter = 0;
	$morePhotoCounter = 0;
	$countPropertyElements = App::$config->countPropertyElements;
	global $USER;
?>
<?
	$this->AddEditAction($arResult["ID"], $arResult["EDIT_LINK"], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arResult["ID"], $arResult["DELETE_LINK"], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
<div id="<?=$this->GetEditAreaId($arResult["ID"]);?>">
	<div id="catalogElement" class="item<?if(!empty($arResult["SKU_PRODUCT"])):?> elementSku<?endif;?>" data-product-id="<?=!empty($arResult["~ID"]) ? $arResult["~ID"] : $arResult["ID"]?>" data-iblock-id="<?=$arResult["SKU_INFO"]["IBLOCK_ID"]?>" data-prop-id="<?=$arResult["SKU_INFO"]["SKU_PROPERTY_ID"]?>" data-hide-measure="<?=$arParams["HIDE_MEASURES"]?>">
		<div id="elementSmallNavigation">
			<?if(!empty($arResult["TABS"])):?>
				<div class="tabs">
					<?foreach ($arResult["TABS"] as $it => $arTab):?>
						<div class="tab<?if($arTab["ACTIVE"] == "Y"):?> active<?endif;?>" data-id="<?=$arTab["ID"]?>"><a href="<?if(!empty($arTab["LINK"])):?><?=$arTab["LINK"]?><?else:?>#<?endif;?>"><span><?=$arTab["NAME"]?></span></a></div>
					<?endforeach;?>
				</div>
			<?endif;?>
		</div>
		<div id="tableContainer">
			<div id="elementNavigation" class="column">
				<?if(!empty($arResult["TABS"])):?>
					<div class="tabs">
						<?foreach ($arResult["TABS"] as $it => $arTab):?>
							<div class="tab<?if($arTab["ACTIVE"] == "Y"):?> active<?endif;?>" data-id="<?=$arTab["ID"]?>"><a href="<?if(!empty($arTab["LINK"])):?><?=$arTab["LINK"]?><?else:?>#<?endif;?>"><?=$arTab["NAME"]?><img src="<?=$arTab["PICTURE"]?>" alt="<?=$arTab["NAME"]?>"></a></div>
						<?endforeach;?>
					</div>
				<?endif;?>
			</div>
			<div id="elementContainer" class="column">
				<div class="mainContainer" id="browse">
					<div class="col">
						<?if(!empty($arResult["PROPERTIES"]["OFFERS"]["VALUE"])):?>
							<div class="markerContainer">
								<?foreach ($arResult["PROPERTIES"]["OFFERS"]["VALUE"] as $ifv => $marker):?>
								    <div class="marker" style="background-color: <?=strstr($arResult["PROPERTIES"]["OFFERS"]["VALUE_XML_ID"][$ifv], "#") ? $arResult["PROPERTIES"]["OFFERS"]["VALUE_XML_ID"][$ifv] : "#424242"?>"><?=$marker?></div>
								<?endforeach;?>
							</div>
						<?endif;?>
						<?if(!empty($arResult["IMAGES"])):?>
							<div id="pictureContainer">
								<div class="pictureSlider">
									<?foreach ($arResult["IMAGES"] as $ipr => $arNextPicture):?>
										<div class="item">
											<a href="<?=$arNextPicture["LARGE_IMAGE"]["SRC"]?>" title="<?=GetMessage("CATALOG_ELEMENT_ZOOM")?>"  class="zoom" data-small-picture="<?=$arNextPicture["SMALL_IMAGE"]["SRC"]?>" data-large-picture="<?=$arNextPicture["LARGE_IMAGE"]["SRC"]?>"><img src="<?=$arNextPicture["MEDIUM_IMAGE"]["SRC"]?>" alt="<?if($ipr==0):?><?if(!empty($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"])):?><?=$arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]?><?else:?><?=$arResult["NAME"]?><?endif;?><?endif;?>" title="<?if($ipr==0):?><?if(!empty($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"])):?><?=$arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]?><?else:?><?=$arResult["NAME"]?><?endif;?><?endif;?>"></a>
										</div>
									<?endforeach;?>
								</div>
							</div>
								<div id="moreImagesCarousel"<?if(count($arResult["IMAGES"]) <= 1):?> class="hide"<?endif;?>>
									<div class="carouselWrapper">
										<div class="slideBox">
											<?if(count($arResult["IMAGES"]) > 1):?>
												<?foreach ($arResult["IMAGES"] as $ipr => $arNextPicture):?>
													<div class="item">
														<a href="<?=$arNextPicture["LARGE_IMAGE"]["SRC"]?>" data-large-picture="<?=$arNextPicture["LARGE_IMAGE"]["SRC"]?>" data-small-picture="<?=$arNextPicture["SMALL_IMAGE"]["SRC"]?>">
															<img src="<?=$arNextPicture["SMALL_IMAGE"]["SRC"]?>" alt="">
														</a>
													</div>
												<?endforeach;?>
											<?endif;?>
										</div>
									</div>
									<div class="controls">
										<a href="#" id="moreImagesLeftButton"></a>
										<a href="#" id="moreImagesRightButton"></a>
									</div>
								</div>
						<?endif;?>
					</div>
					<div class="col<?if(empty($arResult["PREVIEW_TEXT"]) && empty($arResult["SKU_PRODUCT"]) && empty($arResult["DISPLAY_PROPERTIES"])):?> hide<?endif;?>">
						<div id="smallElementTools">
							<?include($_SERVER["DOCUMENT_ROOT"]."/".$templateFolder."/include/right_section.php");?>
						</div>
						<?if(!empty($arResult["BRAND"]["PICTURE"])):?>
							<a href="<?=$arResult["BRAND"]["DETAIL_PAGE_URL"]?>" class="brandImage"><img src="<?=$arResult["BRAND"]["PICTURE"]["src"]?>" alt="<?=$arResult["BRAND"]["NAME"]?>"></a>
						<?endif;?>
						<?if(!empty($arResult["PREVIEW_TEXT"])):?>
							<div class="description">
								<div class="heading"><?=GetMessage("CATALOG_ELEMENT_PREVIEW_TEXT_LABEL")?></div>
								<div class="changeShortDescription" data-first-value='<?=$arResult["PREVIEW_TEXT"]?>'><?=$arResult["PREVIEW_TEXT"]?></div>
							</div>
						<?endif;?>
						<?if(!empty($arResult["SKU_PRODUCT"])):?>
							<?if(!empty($arResult["SKU_PROPERTIES"]) && $level = 1):?>
								<div class="elementSkuVariantLabel"><?=GetMessage("SKU_VARIANT_LABEL")?></div>
								<?foreach ($arResult["SKU_PROPERTIES"] as $propName => $arNextProp):?>
									<?if(!empty($arNextProp["VALUES"])):?>
										<div class="elementSkuProperty" data-name="<?=$propName?>" data-level="<?=$level++?>" data-highload="<?=$arNextProp["HIGHLOAD"]?>">
											<div class="elementSkuPropertyName"><?=$arNextProp["NAME"]?>:</div>
											<ul class="elementSkuPropertyList">
												<?foreach ($arNextProp["VALUES"] as $xml_id => $arNextPropValue):?>
													<li class="elementSkuPropertyValue<?if($arNextPropValue["DISABLED"] == "Y"):?> disabled<?elseif($arNextPropValue["SELECTED"] == "Y"):?> selected<?endif;?>" data-name="<?=$propName?>" data-value="<?=$arNextPropValue["VALUE"]?>">
														<a href="#" class="elementSkuPropertyLink">
															<?if(!empty($arNextPropValue["IMAGE"])):?>
																<img src="<?=$arNextPropValue["IMAGE"]["src"]?>">
															<?else:?>
																<?=$arNextPropValue["DISPLAY_VALUE"]?>
															<?endif;?>
														</a>
													</li>
												<?endforeach;?>
											</ul>
										</div>
									<?endif;?>
								<?endforeach;?>
							<?endif;?>
						<?endif;?>
						<div class="changePropertiesNoGroup">
							<?$APPLICATION->IncludeComponent(
								"dresscode:catalog.properties.list", 
								"no-group", 
								array(
									"PRODUCT_ID" => $arResult["ID"],
									"COUNT_PROPERTIES" => $countPropertyElements,
									"ELEMENT_LAST_SECTION_ID" => $arResult["LAST_SECTION"]["ID"]
								),
								false
							);?>
						</div>
					</div>
				</div>
				<?if(!empty($arResult["COMPLECT"]["ITEMS"])):?>
					<div id="complect">
						<span class="heading"><?=GetMessage("ELEMENT_COMPLECT_HEADING")?></span>
						<div class="complectList">
							<?foreach($arResult["COMPLECT"]["ITEMS"] as $inc => $arNextComplect):?>
								<div class="complectListItem">
									<div class="complectListItemWrap">
										<div class="complectListItemPicture">
											<a href="<?=$arNextComplect["DETAIL_PAGE_URL"]?>" class="complectListItemPicLink"><img src="<?=$arNextComplect["PICTURE"]["src"]?>" alt="<?=$arNextComplect["NAME"]?>"></a>
										</div>
										<div class="complectListItemName">
											<a href="<?=$arNextComplect["DETAIL_PAGE_URL"]?>" class="complectListItemLink"><span class="middle"><?=$arNextComplect["NAME"]?></span></a>
										</div>
										<a class="complectListItemPrice">
											<?=$arNextComplect["PRICE"]["PRICE_FORMATED"]?> 
											<?if($arParams["HIDE_MEASURES"] != "Y" && !empty($arResult["MEASURES"][$arNextComplect["CATALOG_MEASURE"]]["SYMBOL_RUS"])):?>
												<span class="measure"> /<?if(!empty($arNextComplect["QUANTITY"]) && $arNextComplect["QUANTITY"] != 1):?> <?=$arNextComplect["QUANTITY"]?><?endif;?> <?=$arResult["MEASURES"][$arNextComplect["CATALOG_MEASURE"]]["SYMBOL_RUS"]?></span>
											<?endif;?>
											<?if($arNextComplect["PRICE"]["PRICE_DIFF"] > 0):?>
												<s class="discount"><?=$arNextComplect["PRICE"]["BASE_PRICE_FORMATED"]?></s>
											<?endif;?>
										</a>
									</div>
								</div>
							<?endforeach;?>
						</div>
						<div class="complectResult">
							<?=GetMessage("CATALOG_ELEMENT_COMPLECT_PRICE_RESULT")?>
							<div class="complectPriceResult"><?=$arResult["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"];?></div> 
							<?if(!empty($arResult["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"]) && $arResult["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"] > 0):?>
								<s class="discount"><?=$arResult["MIN_PRICE"]["PRINT_VALUE"];?></s>
								<div class="complectResultEconomy">
									<?=GetMessage("CATALOG_ELEMENT_COMPLECT_ECONOMY")?> <span class="complectResultEconomyValue"><?=$arResult["MIN_PRICE"]["PRINT_DISCOUNT_DIFF"]?></span>
								</div>
							<?endif;?>
						</div>
					</div>
				<?endif;?>
				<?$APPLICATION->IncludeComponent(
		        	"bitrix:catalog.set.constructor", 
		        	".default", 
		        	array(
		        		"IBLOCK_TYPE_ID" => $arResult["IBLOCK_TYPE"],
		        		"IBLOCK_ID" => $arResult["IBLOCK_ID"],
		        		"ELEMENT_ID" => $arResult["ID"],
		        		"BASKET_URL" => "/personal/cart/",
		        		"CACHE_TYPE" => "N",
		        		"CACHE_TIME" => "36000000",
		        		"CACHE_GROUPS" => "Y",
		        		"PRICE_CODE" => $arParams["PRICE_CODE"],
		        		"PRICE_VAT_INCLUDE" => "N",
		        		"CONVERT_CURRENCY" => "Y",
		        		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		        		"OFFERS_CART_PROPERTIES" => array(
		        		)
		        	),
		        	false
		        );?>
				<?if(!empty($arResult["DETAIL_TEXT"])):?>
					<div id="detailText">
						<div class="heading"><?=GetMessage("CATALOG_ELEMENT_DETAIL_TEXT_HEADING")?></div>
						<div class="changeDescription" data-first-value='<?=str_replace("'", "", $arResult["~DETAIL_TEXT"])?>'><?=$arResult["~DETAIL_TEXT"]?></div>
					</div>
				<?endif;?>
				<div class="changePropertiesGroup">
					<?$APPLICATION->IncludeComponent(
						"dresscode:catalog.properties.list", 
						"group", 
						array(
							"PRODUCT_ID" => $arResult["ID"],
							"ELEMENT_LAST_SECTION_ID" => $arResult["LAST_SECTION"]["ID"]
						),
						false
					);?>
				</div>
		        <?if($arResult["SHOW_RELATED"] == "Y"):?>
		        	<div id="related">
						<div class="heading"><?=GetMessage("CATALOG_ELEMENT_ACCEESSORIES")?> (<?=$arResult["RELATED_COUNT"] <= 8 ? $arResult["RELATED_COUNT"] : 8?>)</div>
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section", 
							"squares", 
							array(
								"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
								"IBLOCK_ID" => $arParams["IBLOCK_ID"],
								"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
								"CURRENCY_ID" => $arParams["CURRENCY_ID"],
								"ADD_SECTIONS_CHAIN" => "N",
								"COMPONENT_TEMPLATE" => "squares",
								"SECTION_ID" => $_REQUEST["SECTION_ID"],
								"SECTION_CODE" => "",
								"SECTION_USER_FIELDS" => array(
									0 => "",
									1 => "",
								),
								"ELEMENT_SORT_FIELD" => "sort",
								"ELEMENT_SORT_ORDER" => "asc",
								"ELEMENT_SORT_FIELD2" => "id",
								"ELEMENT_SORT_ORDER2" => "desc",
								"FILTER_NAME" => "relatedFilter",
								"INCLUDE_SUBSECTIONS" => "Y",
								"SHOW_ALL_WO_SECTION" => "Y",
								"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE_ELEMENT"],
								"PAGE_ELEMENT_COUNT" => "8",
								"LINE_ELEMENT_COUNT" => "3",
								"PROPERTY_CODE" => array(
									0 => "",
									1 => "",
								),
								"OFFERS_LIMIT" => "5",
								"BACKGROUND_IMAGE" => "-",
								"SECTION_URL" => "",
								"DETAIL_URL" => "",
								"SECTION_ID_VARIABLE" => "SECTION_ID",
								"SEF_MODE" => "N",
								"AJAX_MODE" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"AJAX_OPTION_HISTORY" => "N",
								"AJAX_OPTION_ADDITIONAL" => "undefined",
								"CACHE_TYPE" => "Y",
								"CACHE_TIME" => "36000000",
								"CACHE_GROUPS" => "Y",
								"SET_TITLE" => "Y",
								"SET_BROWSER_TITLE" => "Y",
								"BROWSER_TITLE" => "-",
								"SET_META_KEYWORDS" => "Y",
								"META_KEYWORDS" => "-",
								"SET_META_DESCRIPTION" => "Y",
								"META_DESCRIPTION" => "-",
								"SET_LAST_MODIFIED" => "N",
								"USE_MAIN_ELEMENT_SECTION" => "N",
								"CACHE_FILTER" => "Y",
								"ACTION_VARIABLE" => "action",
								"PRODUCT_ID_VARIABLE" => "id",
								"PRICE_CODE" => $arParams["PRICE_CODE"],
								"USE_PRICE_COUNT" => "N",
								"SHOW_PRICE_COUNT" => "1",
								"PRICE_VAT_INCLUDE" => "Y",
								"BASKET_URL" => "/personal/basket.php",
								"USE_PRODUCT_QUANTITY" => "N",
								"PRODUCT_QUANTITY_VARIABLE" => "undefined",
								"ADD_PROPERTIES_TO_BASKET" => "Y",
								"PRODUCT_PROPS_VARIABLE" => "prop",
								"PARTIAL_PRODUCT_PROPERTIES" => "N",
								"PRODUCT_PROPERTIES" => array(
								),
								"PAGER_TEMPLATE" => "round",
								"DISPLAY_TOP_PAGER" => "N",
								"DISPLAY_BOTTOM_PAGER" => "N",
								"PAGER_TITLE" => GetMessage("CATALOG_ELEMENT_ACCEESSORIES"),
								"PAGER_SHOW_ALWAYS" => "N",
								"PAGER_DESC_NUMBERING" => "N",
								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
								"PAGER_SHOW_ALL" => "N",
								"PAGER_BASE_LINK_ENABLE" => "N",
								"SET_STATUS_404" => "N",
								"SHOW_404" => "N",
								"MESSAGE_404" => ""
							),
							false
						);?>
					</div>
				<?endif;?>

				<?if($arResult["SHOW_SIMILAR"] == "Y"):?>
		        	<div id="similar">
						<div class="heading"><?=GetMessage("CATALOG_ELEMENT_SIMILAR")?> (<?=$arResult["SIMILAR_COUNT"] <= 8 ? $arResult["SIMILAR_COUNT"] : 8?>)</div>
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section", 
							"squares", 
							array(
								"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
								"IBLOCK_ID" => $arParams["IBLOCK_ID"],
								"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
								"CURRENCY_ID" => $arParams["CURRENCY_ID"],
								"ADD_SECTIONS_CHAIN" => "N",
								"COMPONENT_TEMPLATE" => "squares",
								"SECTION_ID" => $_REQUEST["SECTION_ID"],
								"SECTION_CODE" => "",
								"SECTION_USER_FIELDS" => array(
									0 => "",
									1 => "",
								),
								"ELEMENT_SORT_FIELD" => "rand",
								"ELEMENT_SORT_ORDER" => "asc",
								"ELEMENT_SORT_FIELD2" => "rand",
								"ELEMENT_SORT_ORDER2" => "desc",
								"FILTER_NAME" => "similarFilter",
								"INCLUDE_SUBSECTIONS" => "Y",
								"SHOW_ALL_WO_SECTION" => "Y",
								"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE_ELEMENT"],
								"PAGE_ELEMENT_COUNT" => "8",
								"LINE_ELEMENT_COUNT" => "3",
								"PROPERTY_CODE" => array(
									0 => "",
									1 => "",
								),
								"OFFERS_LIMIT" => "5",
								"BACKGROUND_IMAGE" => "-",
								"SECTION_URL" => "",
								"DETAIL_URL" => "",
								"SECTION_ID_VARIABLE" => "SECTION_ID",
								"SEF_MODE" => "N",
								"AJAX_MODE" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"AJAX_OPTION_HISTORY" => "N",
								"AJAX_OPTION_ADDITIONAL" => "undefined",
								"CACHE_TYPE" => "Y",
								"CACHE_TIME" => "36000000",
								"CACHE_GROUPS" => "Y",
								"SET_TITLE" => "Y",
								"SET_BROWSER_TITLE" => "Y",
								"BROWSER_TITLE" => "-",
								"SET_META_KEYWORDS" => "Y",
								"META_KEYWORDS" => "-",
								"SET_META_DESCRIPTION" => "Y",
								"META_DESCRIPTION" => "-",
								"SET_LAST_MODIFIED" => "N",
								"USE_MAIN_ELEMENT_SECTION" => "N",
								"CACHE_FILTER" => "Y",
								"ACTION_VARIABLE" => "action",
								"PRODUCT_ID_VARIABLE" => "id",
								"PRICE_CODE" => $arParams["PRICE_CODE"],
								"USE_PRICE_COUNT" => "N",
								"SHOW_PRICE_COUNT" => "1",
								"PRICE_VAT_INCLUDE" => "Y",
								"BASKET_URL" => "/personal/basket.php",
								"USE_PRODUCT_QUANTITY" => "N",
								"PRODUCT_QUANTITY_VARIABLE" => "undefined",
								"ADD_PROPERTIES_TO_BASKET" => "Y",
								"PRODUCT_PROPS_VARIABLE" => "prop",
								"PARTIAL_PRODUCT_PROPERTIES" => "N",
								"PRODUCT_PROPERTIES" => array(
								),
								"PAGER_TEMPLATE" => "round",
								"DISPLAY_TOP_PAGER" => "N",
								"DISPLAY_BOTTOM_PAGER" => "N",
								"PAGER_TITLE" => GetMessage("CATALOG_ELEMENT_SIMILAR"),
								"PAGER_SHOW_ALWAYS" => "N",
								"PAGER_DESC_NUMBERING" => "N",
								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
								"PAGER_SHOW_ALL" => "N",
								"PAGER_BASE_LINK_ENABLE" => "N",
								"SET_STATUS_404" => "N",
								"SHOW_404" => "N",
								"MESSAGE_404" => ""
							),
							false
						);?>
					</div>
				<?endif;?>
				<?if($arParams["HIDE_AVAILABLE_TAB"] != "Y"):?>
					<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.store.amount", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"STORES" =>array(),
		"ELEMENT_ID" => $arResult["ID"],
		"ELEMENT_CODE" => $arResult["CODE"],
		"STORE_PATH" => "/stores/#store_id#/",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000",
		"MAIN_TITLE" => "",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FIELDS" => array(
			0 => "TITLE",
			1 => "ADDRESS",
			2 => "DESCRIPTION",
			3 => "PHONE",
			4 => "EMAIL",
			5 => "IMAGE_ID",
			6 => "COORDINATES",
			7 => "SCHEDULE",
			8 => "",
		),
		"SHOW_EMPTY_STORE" => "N",
		"USE_MIN_AMOUNT" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"MIN_AMOUNT" => "0"
	),
	false
);?>
				<?endif;?>

			</div>
			<div id="elementTools" class="column">
				<div class="fixContainer">
					<?include($_SERVER["DOCUMENT_ROOT"]."/".$templateFolder."/include/right_section.php");?>
				</div>
			</div>
		</div>
	</div>
</div>	
<div id="elementError">
  <div id="elementErrorContainer">
    <span class="heading"><?=GetMessage("ERROR")?></span>
    <a href="#" id="elementErrorClose"></a>
    <p class="message"></p>
    <a href="#" class="close"><?=GetMessage("CLOSE")?></a>
  </div>
</div>

<script type="text/javascript">

	var CATALOG_LANG = {
		REVIEWS_HIDE: "<?=GetMessage("REVIEWS_HIDE")?>",
		REVIEWS_SHOW: "<?=GetMessage("REVIEWS_SHOW")?>",
		OLD_PRICE_LABEL: "<?=GetMessage("OLD_PRICE_LABEL")?>",
	};

	var elementAjaxPath = "<?=$templateFolder."/ajax.php"?>";

</script>

<div itemscope itemtype="http://schema.org/Product" class="microdata">
	<meta itemprop="name" content="<?=$arResult["NAME"]?>" />
	<link itemprop="url" href="<?=$arResult["DETAIL_PAGE_URL"]?>" />
	<link itemprop="image" href="<?=$arResult["IMAGES"][0]["LARGE_IMAGE"]["SRC"]?>" />
	<meta itemprop="brand" content="<?=$arResult["BRAND"]["NAME"]?>" />
	<meta itemprop="model" content="<?=$arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?>" />
	<meta itemprop="productID" content="<?=$arResult["ID"]?>" />
	<meta itemprop="category" content="<?=$arResult["SECTION"]["NAME"]?>" />
	<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
		<meta itemprop="ratingValue" content="<?=$arResult["PROPERTIES"]["RATING"]["VALUE"]?>">
		<meta itemprop="reviewCount" content="<?=count($arResult["REVIEWS"])?>">
	</div>
	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<meta itemprop="priceCurrency" content="<?if(!empty($arResult["MIN_PRICE"]["CURRENCY"])):?><?=$arResult["MIN_PRICE"]["CURRENCY"]?><?else:?><?=CCurrency::GetBaseCurrency();?><?endif;?>" />
		<meta itemprop="price" content="<?=$arResult["MIN_PRICE"]["VALUE"]?>" />
		<?if($arResult["CATALOG_QUANTITY"] > 0):?>
            <link itemprop="availability" href="http://schema.org/InStock">
        <?else:?>
       		<link itemprop="availability" href="http://schema.org/OutOfStock">
        <?endif;?>
	</div>
	<?if(!empty($arResult["PREVIEW_TEXT"])):?>
		<meta itemprop="description" content='<?=$arResult["PREVIEW_TEXT"]?>' />
	<?endif;?>
	<?if(empty($arResult["PREVIEW_TEXT"]) && !empty($arResult["DETAIL_TEXT"])):?>
		<meta itemprop="description" content='<?=$arResult["DETAIL_TEXT"]?>' />
	<?endif;?>
</div>

<meta property="og:title" content="<?=$arResult["NAME"]?>" />
<meta property="og:description" content="<?=htmlspecialcharsbx($arResult["PREVIEW_TEXT"])?>" />
<meta property="og:url" content="<?=$arResult["DETAIL_PAGE_URL"]?>" />
<meta property="og:type" content="website" />
<?if(!empty($arResult["IMAGES"][0]["LARGE_IMAGE"]["SRC"])):?>
	<meta property="og:image" content="<?=$arResult["IMAGES"][0]["LARGE_IMAGE"]["SRC"]?>" />
<?endif;?>

<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>