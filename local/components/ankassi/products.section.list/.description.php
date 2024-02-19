<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
    "NAME" => Loc::getMessage("PRODUCTS_SECTION_LIST_NAME"),
    "DESCRIPTION" => Loc::getMessage("PRODUCTS_SECTION_LIST_DESC"),
    "COMPLEX" => "N",
    "SORT" => 20,
    "PATH" => array(
        "ID" => "ankassi",
        "NAME" => Loc::getMessage("COMPONENTS_NAME"),
    )
);
?>