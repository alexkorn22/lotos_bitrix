<?
	$MESS["SEARCH_PAGE"] = "Страница поиска";
	$MESS["ART"] = "Арт.:";
	$MESS["PRICE"] = "Цена:";
	$MESS["RATING"] = "Рейтинг:";
	$MESS["MAIN"] ="Главная страница";
	$MESS["Q"] = 'По вашему запросу "'.htmlspecialcharsbx($_GET["q"]).'" ничего не найдено';
	$MESS["EMPTY"] = 'Попробуйте написать ваш поисковый запрос по-другому или воспользоваться <a href="'.SITE_DIR.'catalog/">каталогом</a> ;)';
	$MESS["RUB"] = "руб.";
	$MESS["UAH"] = "грн.";
	$MESS["FROM"] = "от ";
	$MESS["SELECT_CATEGORY"] = "Уточните категорию:";
	$MESS["SORT"] = "Сортировать по:";
	$MESS["SORT_TO"] = "Показать по:";
	$MESS["SORT_POPULAR"] = "Популярности";
	$MESS["SORT_PRICE"] = "Цене";
	$MESS["SORT_RATING"] = "Рейтингу";
	$MESS["SORT_PAGE_FIRST"] = 30;
	$MESS["SORT_PAGE_SECOND"] = 60;
	$MESS["SORT_PAGE_THIRD"] = 90;
	$MESS["SECTION_FOR_SEARCH"] = "Разделы по запросу:";
	$MESS["PRODUCT_FOR_SEARCH"] = "Товары по запросу:";
	$MESS["ERROR_IN_QUERY"] = "В запросе &laquo;".trim(htmlspecialcharsbx($_GET["q"]))."&raquo; была обнаружена ошибка, запрос исправлен на &laquo;".$arResult["QUERY"]."&raquo;";
	$MESS["CATALOG_SORT_LABEL"] = "Сортировать по:";
	$MESS["CATALOG_SORT_TO_LABEL"] = "Показать по:";	
	$MESS["CATALOG_SORT_FIELD_NAME"] = "алфавиту";
	$MESS["CATALOG_SORT_FIELD_SHOWS"] = "популярности";
	$MESS["CATALOG_SORT_FIELD_PRICE_ASC"] = "увеличению цены";
	$MESS["CATALOG_SORT_FIELD_PRICE_DESC"] = "уменьшению цены";
	$MESS["CATALOG_VIEW_LABEL"] = "Вид каталога:"
?>