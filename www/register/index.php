<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Регистрация");
$APPLICATION->SetTitle("Регистрация");
global $USER;
if ($USER->IsAuthorized()) {
	LocalRedirect("/auth/index.php");
}
?>
<div id="register">
<?$APPLICATION->IncludeComponent(
	"artorg:main.register",
	"",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array("EMAIL"),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array(
		    "EMAIL",
            "PERSONAL_MOBILE",
            "PERSONAL_CITY",
            "PERSONAL_ZIP",
            "PERSONAL_STREET",
            ),
		"SUCCESS_PAGE" => "",
		"USER_PROPERTY" => "",
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>