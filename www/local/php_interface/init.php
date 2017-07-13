<?
//***** AUTOLOAD CLASSES *****
$pathArtorgClasses = '/local/classes/';
$arClasses = getArClasses($pathArtorgClasses);
$pathArtorgClasses = '/local/files/libs/';
$arClasses = getArClasses($pathArtorgClasses,$arClasses);
CModule::AddAutoloadClasses(
	'', // не указываем имя модуля
	// массив: ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
    $arClasses
);

/**
 * Функция возвращает массив для добавления классов в Автолоад
 * @param $path - путь к папке с классами
 * @return array - ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
 */
function getArClasses($path,$arResult = array()){
	$scandir = scandir($_SERVER["DOCUMENT_ROOT"].$path);
	if (empty($scandir))
		return $arResult;
	foreach (scandir($_SERVER["DOCUMENT_ROOT"].$path) as $nameFile ) {
		if (substr($nameFile,-4) <> '.php') {
			continue;
		}
		$nameClass = substr($nameFile, 0, -4);
		$arResult[$nameClass] = $path . $nameFile;
	}
	return $arResult;
}

function debug($value, $die = false) {
    $bt = debug_backtrace();
    $bt = $bt[0];
    $dRoot = $_SERVER["DOCUMENT_ROOT"];
    $dRoot = str_replace("/","\\",$dRoot);
    $bt["file"] = str_replace($dRoot,"",$bt["file"]);
    $dRoot = str_replace("\\","/",$dRoot);
    $bt["file"] = str_replace($dRoot,"",$bt["file"]);
    $res = "<div style=\"font-size: 9pt; color: #000; background: #fff; border: 1px dashed #000;\">";
    $res .= "<div style=\"padding: 3px 5px; background: #99CCFF; font-weight: bold;\">File: " . $bt["file"] . " [" . $bt["line"] . "]</div>";
    $res .= " <pre style=\"padding: 10px;\">" . print_r($value,true) . "</pre>";
    $res .= "</div>";
    echo $res;
    if ($die) {
        die();
    }
}
function debDie($value) {
    debug($value, true);
}

?>