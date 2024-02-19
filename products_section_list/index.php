<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");?>

<?$APPLICATION->IncludeComponent(
	"ankassi:products.section.list",
	"",
	Array(
		"ACTIVE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "products",
		"SECTION_ID" => "1"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>