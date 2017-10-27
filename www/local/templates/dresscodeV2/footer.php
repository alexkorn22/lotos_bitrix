<?require_once($_SERVER["DOCUMENT_ROOT"]."/settings.php");?>
<?IncludeTemplateLangFile(__FILE__);
?>


			<?if (INDEX_PAGE != "Y"):?></div><?endif;?>
		</div>
        <?if (INDEX_PAGE != "Y" && App::$ds->useFooterTabs):?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "AREA_FILE_SHOW" => "sect",
                    "AREA_FILE_SUFFIX" => "footerTabs",
                    "AREA_FILE_RECURSIVE" => "Y",
                    "EDIT_TEMPLATE" => ""
                ),
                false
            );?>
        <?endif;?>
<?
$cartPage = $APPLICATION->GetCurPage() == '/personal/cart/';
?>
		<div id="footer"
            class="<?if(!empty($TEMPLATE_FOOTER_VARIANT) && $TEMPLATE_FOOTER_VARIANT != "default"):?>variant_<?=$TEMPLATE_FOOTER_VARIANT?><?endif;?>">
			<div class="fc ">
				<div class="limiter">
					<div id="rowFooter">
						<div id="leftFooter">
							<div class="footerRow">
								<div class="column">
									<span class="heading"><?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_menu_heading.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_MENU_HEADING"), "TEMPLATE" => "sect_footer_menu_heading.php"));?></span>
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu", 
										"footerCatalog", 
										array(
											"ROOT_MENU_TYPE" => "left",
											"MENU_CACHE_TYPE" => "A",
											"MENU_CACHE_TIME" => "36000000",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"MENU_CACHE_GET_VARS" => array(
											),
											"MAX_LEVEL" => "1",
											"CHILD_MENU_TYPE" => "top",
											"USE_EXT" => "Y",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N",
											"COMPONENT_TEMPLATE" => "footerCatalog",
											"CACHE_SELECTED_ITEMS" => "N"
										),
										false
									);?>
								</div>
								<div class="column">
									<span class="heading"><?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_menu_heading2.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_MENU_HEADING2"), "TEMPLATE" => "sect_footer_menu_heading2.php"));?></span>
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu", 
										"footerOffers", 
										array(
											"ROOT_MENU_TYPE" => "footerMain",
											"MENU_CACHE_TYPE" => "N",
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"MENU_CACHE_GET_VARS" => array(
											),
											"MAX_LEVEL" => "1",
											"CHILD_MENU_TYPE" => "top",
											"USE_EXT" => "N",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N",
											"COMPONENT_TEMPLATE" => "footerOffers",
											"CACHE_SELECTED_ITEMS" => "N"
										),
										false
									);?>						
								</div>

                                <?
                                global $USER;
                                if ($USER->IsAuthorized()){
                                    $typeMenu = 'footerAuthorized';
                                }else{
                                    $typeMenu = 'footerNotAuthorized';
                                }
                                ?>

                                <div class="column">
                                    <span class="heading"><?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_menu_heading3.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_MENU_HEADING3"), "TEMPLATE" => "sect_footer_menu_heading3.php"));?></span>
                                    <?$APPLICATION->IncludeComponent("bitrix:menu", "footerHelp", Array(
                                        "ROOT_MENU_TYPE" => $typeMenu,
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "MENU_CACHE_GET_VARS" => "",
                                        "MAX_LEVEL" => "1",
                                        "CHILD_MENU_TYPE" => "top",
                                        "USE_EXT" => "N",
                                        "DELAY" => "N",
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CACHE_SELECTED_ITEMS" => "N"
                                    ),
                                        false
                                    );?>
                                </div>
                                <div class="column">
                                    <span class="heading"><?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_menu_heading4.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_MENU_HEADING"), "TEMPLATE" => "sect_footer_menu_heading.php"));?></span>
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:menu",
                                        "footerCatalog",
                                        array(
                                            "ROOT_MENU_TYPE" => "left2",
                                            "MENU_CACHE_TYPE" => "A",
                                            "MENU_CACHE_TIME" => "36000000",
                                            "MENU_CACHE_USE_GROUPS" => "Y",
                                            "MENU_CACHE_GET_VARS" => array(
                                            ),
                                            "MAX_LEVEL" => "1",
                                            "CHILD_MENU_TYPE" => "top",
                                            "USE_EXT" => "Y",
                                            "DELAY" => "N",
                                            "ALLOW_MULTI_SELECT" => "N",
                                            "COMPONENT_TEMPLATE" => "footerCatalog",
                                            "CACHE_SELECTED_ITEMS" => "N"
                                        ),
                                        false
                                    );?>
                                </div>
							</div>
                            <hr class="separator">
                            <div class="subscription">
                                <div class="wrap">
                                    <div class="subscr-left">
                                        <div class="subscr-form">
                                            <form action="" method="post" class="webflow-style-input">
                                                <label for="field"><span>Подписаться на рассылку</span>
                                                    <input class="" type="email" name="field" placeholder="Email" />
                                                </label>
                                                <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="subscr-right">
                                        <div class="social">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? if(!$cartPage):?>
                            <div id="hide-cart" class="hide-cart green"></div>
                            <?endif;?>
                            <div class="copyrighted">
                               <span class="first-line">© Copyright 2017  Интернет-магазин косметики и бытовой химии ЛОТОС. <a href="#">Все права защищены</a></span>
                                <span>Email: <a href="mailto:info@lotostrade.ua">info@lotostrade.ua</a> Тел.: +380(61)214-99-54, +380(61)620-22-44</span>
                                <span><a href="#">Сайт разработан и поддерживается компанией WeDo</a></span>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="substrate <?if($cartPage):?>hidden<?endif?>"></div>
		<div id="footerLine" class="hidden miniCart <?if(!empty($TEMPLATE_FOOTER_LINE_COLOR) && $TEMPLATE_FOOTER_LINE_COLOR != "default"):?> color_<?=$TEMPLATE_FOOTER_LINE_COLOR?>"<?endif;?>>
			<div class="limiter">
			    <div class="colFooterCart">
				    <div id="flushFooterCart" class="flushFooterCartMedia">
					    <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	"bottomCart", 
	array(
		"HIDE_ON_BASKET_PAGES" => "Y",
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "N",
		"SHOW_EMPTY_VALUES" => "Y",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_PRODUCTS" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"COMPONENT_TEMPLATE" => "bottomCart",
		"PATH_TO_AUTHORIZE" => "",
		"SHOW_DELAY" => "N",
		"SHOW_NOTAVAIL" => "N",
		"SHOW_SUBSCRIBE" => "N",
		"SHOW_IMAGE" => "Y",
		"SHOW_PRICE" => "Y",
		"SHOW_SUMMARY" => "Y"
	),
	false
);?>
					</div>
				</div>
			</div>
		</div>
	</div>    
    <div id="overlap"></div>
    
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		".default",
		array(
			"AREA_FILE_SHOW" => "sect",
			"AREA_FILE_SUFFIX" => "cart",
			"AREA_FILE_RECURSIVE" => "Y",
			"EDIT_TEMPLATE" => ""
		),
		false
	);?>

	<?
	if (App::$ds->pageCart) {
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			".default",
			array(
				"AREA_FILE_SHOW" => "sect",
				"AREA_FILE_SUFFIX" => "fastbuycart",
				"AREA_FILE_RECURSIVE" => "Y",
				"EDIT_TEMPLATE" => ""
			),
			false
		);
	}else {
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			".default",
			array(
				"AREA_FILE_SHOW" => "sect",
				"AREA_FILE_SUFFIX" => "fastbuy",
				"AREA_FILE_RECURSIVE" => "Y",
				"EDIT_TEMPLATE" => ""
			),
			false
		);
	}
	?>

	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		".default",
		array(
			"AREA_FILE_SHOW" => "sect",
			"AREA_FILE_SUFFIX" => "requestPrice",
			"AREA_FILE_RECURSIVE" => "Y",
			"EDIT_TEMPLATE" => ""
		),
		false
	);?>

	<div id="upButton" class="arrow-top">
        <a href="#"></a>
	</div>

    <script type="text/javascript">
      var ajaxPath = "<?=SITE_DIR?>ajax.php";
      var SITE_DIR = "<?=SITE_DIR?>";
      var SITE_ID  = "<?=SITE_ID?>";
      var TEMPLATE_PATH = "<?=SITE_TEMPLATE_PATH?>";
    </script>
    
    <script type="text/javascript">
		var LANG = {
			BASKET_ADDED: "<?=GetMessage("BASKET_ADDED")?>",
			WISHLIST_ADDED: "<?=GetMessage("WISHLIST_ADDED")?>",
			ADD_COMPARE_ADDED: "<?=GetMessage("ADD_COMPARE_ADDED")?>",
			ADD_CART_LOADING: "<?=GetMessage("ADD_CART_LOADING")?>",
			ADD_BASKET_DEFAULT_LABEL: "<?=GetMessage("ADD_BASKET_DEFAULT_LABEL")?>",
			ADDED_CART_SMALL: "<?=GetMessage("ADDED_CART_SMALL")?>",
			CATALOG_AVAILABLE: "<?=GetMessage("CATALOG_AVAILABLE")?>",
			CATALOG_ON_ORDER: "<?=GetMessage("CATALOG_ON_ORDER")?>",
			CATALOG_NO_AVAILABLE: "<?=GetMessage("CATALOG_NO_AVAILABLE")?>",
			FAST_VIEW_PRODUCT_LABEL: "<?=GetMessage("FAST_VIEW_PRODUCT_LABEL")?>",
			REQUEST_PRICE_LABEL: "<?=GetMessage("REQUEST_PRICE_LABEL")?>",
			REQUEST_PRICE_BUTTON_LABEL: "<?=GetMessage("REQUEST_PRICE_BUTTON_LABEL")?>"
		};
	</script>
<?

	App::$msgBox->showMessage();
?>
</body>
</html>