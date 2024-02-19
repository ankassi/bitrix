<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$this->setFrameMode(true);

?>
<?if($arResult['ITEMS']):?>
    <table class="user_list">
        <thead>
        <td><?=Loc::getMessage('ID')?></td>
        <td><?=Loc::getMessage('NAME')?></td>
        <td><?=Loc::getMessage('CREATED_DATE')?></td>
        <td><?=Loc::getMessage('PREVIEW_TEXT')?></td>
        <td><?=Loc::getMessage('ACTIVE')?></td>
        </thead>
        <?foreach ($arResult['ITEMS'] as $item):?>
            <tr>
                <td><?=$item['ID']?></td>
                <td><?=$item['NAME']?></td>
                <td><?=$item['CREATED_DATE']?></td>
                <td><?=$item['PREVIEW_TEXT']?></td>
                <td><?=$item['ACTIVE']?></td>
            </tr>
        <?endforeach;?>
    </table>
<?else:?>
    <??>
<?endif;?>
