<div id="topHeader"<?if($TEMPLATE_HEADER_COLOR != ""):?> class="color_<?=$TEMPLATE_HEADER_COLOR?>"<?endif;?>>
	<div class="limiter">
		<?$APPLICATION->IncludeComponent("bitrix:menu", "topMenu", Array(
			"ROOT_MENU_TYPE" => "top",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_TIME" => "3600000",
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
		<ul id="topService"<?if($TEMPLATE_SUBHEADER_COLOR != "default"):?> class="color_<?=$TEMPLATE_SUBHEADER_COLOR?>"<?endif;?>>
			<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "top", Array(
				"REGISTER_URL" => "",
					"FORGOT_PASSWORD_URL" => "",
					"PROFILE_URL" => "",
					"SHOW_ERRORS" => "N",
				),
				false
			);?>
		</ul>
	</div>
</div>
<div id="subHeader"<?if($TEMPLATE_SUBHEADER_COLOR != "default"):?> class="color_<?=$TEMPLATE_SUBHEADER_COLOR?>"<?endif;?>>
	<div class="limiter">
		<div id="logo">
			<?$APPLICATION->IncludeFile(SITE_DIR."sect_top_logo.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_TOP_LOGO"), "TEMPLATE" => "sect_top_logo.php"));?>
		</div>
		<div id="headerTools">
			<ul class="tools">
				<li class="search">
                    <?$APPLICATION->IncludeComponent(
                        "dresscode:search.line",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "IBLOCK_TYPE" => "catalog",
                            "IBLOCK_ID" => "10",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600000",
                            "PRICE_CODE" => array(
                                0 => "BASE",
                            ),
                            "CONVERT_CURRENCY" => "Y",
                            "CURRENCY_ID" => "RUB",
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "OFFERS",
                                2 => "ATT_BRAND",
                                3 => "COLOR",
                                4 => "ZOOM2",
                                5 => "BATTERY_LIFE",
                                6 => "SWITCH",
                                7 => "GRAF_PROC",
                                8 => "LENGTH_OF_CORD",
                                9 => "DISPLAY",
                                10 => "LOADING_LAUNDRY",
                                11 => "FULL_HD_VIDEO_RECORD",
                                12 => "INTERFACE",
                                13 => "COMPRESSORS",
                                14 => "Number_of_Outlets",
                                15 => "MAX_RESOLUTION_VIDEO",
                                16 => "MAX_BUS_FREQUENCY",
                                17 => "MAX_RESOLUTION",
                                18 => "FREEZER",
                                19 => "POWER_SUB",
                                20 => "POWER",
                                21 => "HARD_DRIVE_SPACE",
                                22 => "MEMORY",
                                23 => "OS",
                                24 => "ZOOM",
                                25 => "PAPER_FEED",
                                26 => "SUPPORTED_STANDARTS",
                                27 => "VIDEO_FORMAT",
                                28 => "SUPPORT_2SIM",
                                29 => "MP3",
                                30 => "ETHERNET_PORTS",
                                31 => "MATRIX",
                                32 => "CAMERA",
                                33 => "PHOTOSENSITIVITY",
                                34 => "DEFROST",
                                35 => "SPEED_WIFI",
                                36 => "SPIN_SPEED",
                                37 => "PRINT_SPEED",
                                38 => "SOCKET",
                                39 => "IMAGE_STABILIZER",
                                40 => "GSM",
                                41 => "SIM",
                                42 => "TYPE",
                                43 => "MEMORY_CARD",
                                44 => "TYPE_BODY",
                                45 => "TYPE_MOUSE",
                                46 => "TYPE_PRINT",
                                47 => "CONNECTION",
                                48 => "TYPE_OF_CONTROL",
                                49 => "TYPE_DISPLAY",
                                50 => "TYPE2",
                                51 => "REFRESH_RATE",
                                52 => "RANGE",
                                53 => "AMOUNT_MEMORY",
                                54 => "MEMORY_CAPACITY",
                                55 => "VIDEO_BRAND",
                                56 => "DIAGONAL",
                                57 => "RESOLUTION",
                                58 => "TOUCH",
                                59 => "CORES",
                                60 => "LINE_PROC",
                                61 => "PROCESSOR",
                                62 => "CLOCK_SPEED",
                                63 => "TYPE_PROCESSOR",
                                64 => "PROCESSOR_SPEED",
                                65 => "HARD_DRIVE",
                                66 => "HARD_DRIVE_TYPE",
                                67 => "Number_of_memory_slots",
                                68 => "MAXIMUM_MEMORY_FREQUENCY",
                                69 => "TYPE_MEMORY",
                                70 => "BLUETOOTH",
                                71 => "FM",
                                72 => "GPS",
                                73 => "HDMI",
                                74 => "SMART_TV",
                                75 => "USB",
                                76 => "WIFI",
                                77 => "FLASH",
                                78 => "ROTARY_DISPLAY",
                                79 => "SUPPORT_3D",
                                80 => "SUPPORT_3G",
                                81 => "WITH_COOLER",
                                82 => "FINGERPRINT",
                                83 => "COLLECTION",
                                84 => "TOTAL_OUTPUT_POWER",
                                85 => "VID_ZASTECHKI",
                                86 => "VID_SUMKI",
                                87 => "VIDEO",
                                88 => "PROFILE",
                                89 => "VYSOTA_RUCHEK",
                                90 => "GAS_CONTROL",
                                91 => "WARRANTY",
                                92 => "GRILL",
                                93 => "MORE_PROPERTIES",
                                94 => "GENRE",
                                95 => "OTSEKOV",
                                96 => "CONVECTION",
                                97 => "INTAKE_POWER",
                                98 => "NAZNAZHENIE",
                                99 => "BULK",
                                100 => "PODKLADKA",
                                101 => "SURFACE_COATING",
                                102 => "brand_tyres",
                                103 => "SEASON",
                                104 => "SEASONOST",
                                105 => "DUST_COLLECTION",
                                106 => "REF",
                                107 => "COUNTRY_BRAND",
                                108 => "DRYING",
                                109 => "REMOVABLE_TOP_COVER",
                                110 => "CONTROL",
                                111 => "FINE_FILTER",
                                112 => "FORM_FAKTOR",
                                113 => "SKU_COLOR",
                                114 => "CML2_ARTICLE",
                                115 => "DELIVERY",
                                116 => "PICKUP",
                                117 => "USER_ID",
                                118 => "BLOG_POST_ID",
                                119 => "BLOG_COMMENTS_CNT",
                                120 => "VOTE_COUNT",
                                121 => "SHOW_MENU",
                                122 => "SIMILAR_PRODUCT",
                                123 => "RATING",
                                124 => "RELATED_PRODUCT",
                                125 => "VOTE_SUM",
                                126 => "",
                            )
                        ),
                        false
                    );?>
				</li>
				<li class="telephone">
					<div class="wrap">
						<a href="#" class="icon openWebFormModal callBack" data-id="1"></a>
						<div class="nf">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								".default",
								array(
									"AREA_FILE_SHOW" => "sect",
									"AREA_FILE_SUFFIX" => "phone",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => ""
								),
								false
							);?>
						</div>
					</div>
				</li>
         	 	<li class="cart">
         	 		<div id="flushTopCart"><?$APPLICATION->IncludeComponent(
				"bitrix:sale.basket.basket.line", 
				"topCart", 
				array(
					"HIDE_ON_BASKET_PAGES" => "N",
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
					"COMPONENT_TEMPLATE" => "topCart",
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
                </li>
			</ul>
		</div>
	</div>
</div>
<div class="menuContainerColor<?if(!empty($TEMPLATE_CATALOG_MENU_COLOR) && $TEMPLATE_CATALOG_MENU_COLOR != "default"):?> color_<?=$TEMPLATE_CATALOG_MENU_COLOR?><?endif;?>">
	<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"catalogMenu2", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"CACHE_SELECTED_ITEMS" => "N",
		"COMPONENT_TEMPLATE" => "catalogMenu2"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
</div>