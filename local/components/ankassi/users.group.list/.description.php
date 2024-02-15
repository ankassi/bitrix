<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
    "NAME" => Loc::getMessage("USERS_GROUP_LIST_NAME"),
    "DESCRIPTION" => Loc::getMessage("USERS_GROUP_LIST_DESC"),
    "COMPLEX" => "N",
    "SORT" => 10,
    "PATH" => array(
        "ID" => "ankassi",
        "NAME" => Loc::getMessage("COMPONENTS_NAME"),
    )
);
?>