<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arUGroupsEx = array();
$dbUGroups = CGroup::GetList();
while ($arUGroups = $dbUGroups->Fetch()) {
    $arUGroupsEx[$arUGroups["ID"]] = $arUGroups["NAME"];
}

$arComponentParameters = array(
    "PARAMETERS" => array(

        "SELECT_GROUP" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("SELECT_GROUP_USERS"),
            "TYPE" => "LIST",
            "VALUES" => $arUGroupsEx,
            "DEFAULT" => array(1),
            "MULTIPLE" => "Y",
        ),
        "CACHE_TIME"  =>  array("DEFAULT"=>36000000),

    ),
);