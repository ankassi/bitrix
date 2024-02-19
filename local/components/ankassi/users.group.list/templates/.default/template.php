<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$this->setFrameMode(true);
?>
<?if($arResult['USER_LIST']):?>
    <table class="user_list">
        <thead>
        <td><?=Loc::getMessage('USER_ID')?></td>
        <td><?=Loc::getMessage('USER_NAME')?></td>
        <td><?=Loc::getMessage('USER_LASTNAME')?></td>
        <td><?=Loc::getMessage('USER_LOGIN')?></td>
        <td><?=Loc::getMessage('USER_EMAIL')?></td>
        </thead>
        <?foreach ($arResult['USER_LIST'] as $user):?>
            <tr>
                <td><?=$user['ID']?></td>
                <td><?=$user['NAME']?></td>
                <td><?=$user['LAST_NAME']?></td>
                <td><?=$user['LOGIN']?></td>
                <td><?=$user['EMAIL']?></td>
            </tr>
        <?endforeach;?>
    </table>
<?else:?>
    <?=Loc::getMessage('NO_USERS')?>
<?endif;?>
