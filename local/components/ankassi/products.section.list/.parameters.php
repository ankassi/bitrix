<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arCurrentValues */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if(!CModule::IncludeModule("iblock"))
    return;
$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));
$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$sectionFilter = array("SITE_ID"=>$_REQUEST["site"], "IBLOCK_ID" => ($arCurrentValues["IBLOCK_ID"]!="-"?$arCurrentValues["IBLOCK_ID"]:""));
$section_list = CIBlockSection::GetList(array("SORT"=>"ASC"), $sectionFilter, true);
while($dbSection = $section_list->Fetch())
    $arSection[$dbSection["ID"]] = "[".$dbSection["ID"]."] ".$dbSection["NAME"];


$arUGroupsEx = array();
$dbUGroups = CGroup::GetList();
while ($arUGroups = $dbUGroups->Fetch()) {
    $arUGroupsEx[$arUGroups["ID"]] = $arUGroups["NAME"];
}

$arComponentParameters = array(
    "PARAMETERS" => array(

        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("IBLOCK_DESC_LIST_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arTypesEx,
            "DEFAULT" => "news",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("IBLOCK_DESC_LIST_ID"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '={$_REQUEST["IBLOCK_ID"]}',
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ),
        "SECTION_ID" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("SECTION_DESC_LIST_ID"),
            "TYPE" => "LIST",
            "VALUES" => $arSection,
            "DEFAULT" => '={$_REQUEST["ID"]}',
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ),
        "ACTIVE" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("ACTIVE_PRODUCTS"),
            "TYPE" => "CHECKBOX",
            "VALUES" => "",
            "DEFAULT" => "",
            "REFRESH" => "N",
        ),
        "CACHE_TIME"  =>  array("DEFAULT"=>36000000),

    ),
);