<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-list my-style">
    <?php foreach($arResult["ITEMS"] as $arItem) {
        echo "<div class=\"container\" id=\"{$this->GetEditAreaId($arItem['ID'])}\">";
    }?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <?php foreach($arResult["ITEMS"] as $arSectItem) {

            echo "<h2>" . $arSectItem['NAME'] . "</h2>";

            if($arSectItem['ELEMENTS']) {
                foreach($arSectItem['ELEMENTS'] as $arItem) {
                    $arProps = $arItem['DISPLAY_PROPERTIES'];

                    echo "<h4>" . $arItem["NAME"] . "</h4>";
                    echo "<p>" . $arItem["PREVIEW_TEXT"] . "</p>";
                    echo "<p>" . $arItem["DETAIL_TEXT"] . " ". $arProps["WEIGHT"]["VALUE"] . $arProps["UNIT"]["VALUE"] . "</p>";
                }
            }
        }?>

        <?php
            if($arParams["DISPLAY_BOTTOM_PAGER"]) {
                echo "<br />" .$arResult["NAV_STRING"];
        }?>
    </div>
</div>
