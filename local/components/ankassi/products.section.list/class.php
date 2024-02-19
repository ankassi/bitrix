<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class ProductsSectionList extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if(!isset($arParams["CACHE_TIME"])) $arParams["CACHE_TIME"] = 36000000;
        $arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"] ?? '');
        if (!isset($arParams["IBLOCK_TYPE"])) $arParams["IBLOCK_TYPE"] = "news";
        $arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"] ?? '');
        $arParams["SECTION_ID"] = (int)($arParams["SECTION_ID"] ?? 0);

        return $arParams;
    }

    public function executeComponent()
    {

        global $USER;
        $cacheId = serialize(array($this->arParams, $USER->GetGroups()));
        if ($this->startResultCache($this->arParams["CACHE_TIME"], $cacheId, 'scache/component/' . $this->getName())) {

            $this->arResult = array(
                "IBLOCK_TYPE" => $this->arParams['IBLOCK_TYPE'],
                "IBLOCK_ID" => $this->arParams['IBLOCK_ID'],
                "SECTION_ID" => $this->arParams['SECTION_ID'],
            );

            $items = $this->productGetList($this->arParams);
            $this->arResult["ITEMS"] = $items;
            $this->IncludeComponentTemplate();
        }

    }
    public function productGetList($arParams):array
    {
        $items = array();
        $filter = Array(
            "IBLOCK_ID"=>IntVal($arParams["IBLOCK_ID"]),
            "SECTION_ID" => IntVal($arParams["SECTION_ID"]),
        );

        if($arParams["ACTIVE"] == "Y"){
            $filter["ACTIVE"] = "Y";
        }

        $res = CIBlockElement::GetList(Array(), $filter);
        while($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $items[] = $arFields;
        }
        return $items;
    }
}