<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


class UserGroupList extends CBitrixComponent
{

    public function onPrepareComponentParams($arParams)
    {
        $arParams["CACHE_TIME"] = 36000000;
        $arParams["SELECT_GROUP"] = $arParams["SELECT_GROUP"] ? $arParams["SELECT_GROUP"] : 2;

        return $arParams;
    }


    public function executeComponent()
    {

        $this->prepareResult();

        $this->IncludeComponentTemplate();

    }


    protected function prepareResult()
    {
        global $USER;

        $groupId = $this->arParams['SELECT_GROUP'];
        $cacheId = serialize(array($groupId, $USER->GetGroups()));

        if ($this->startResultCache($this->arParams["CACHE_TIME"], $cacheId, 'scache/component/' . $this->getName())) {
            $userList = [];

            $select = [];
            $filter = Array(
                "GROUP_ID" => $groupId,
            );
            $selectList = array(
                'ID',
                'NAME',
                'LAST_NAME',
                'EMAIL',
                'LOGIN'
            );

            foreach ($selectList as $val){
                $select[$val] = 'USER.'.$val;
            }

            $raUser = \Bitrix\Main\UserGroupTable::getList(array(
                'filter' => $filter,
                'select' => $select,
            ));

            while ($arUser = $raUser->fetch()) {
                $userList[] = $arUser;
            }

            if(!empty($userList)){
                $this->arResult['USER_LIST'] = $userList;
            }

            $this->endResultCache();
        }
    }
}