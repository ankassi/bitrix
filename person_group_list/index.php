<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вывод списка пользователей");
?>

<?$APPLICATION->IncludeComponent(
	"ankassi:users.group.list",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"SELECT_GROUP" => array("1")
	)
);?>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>