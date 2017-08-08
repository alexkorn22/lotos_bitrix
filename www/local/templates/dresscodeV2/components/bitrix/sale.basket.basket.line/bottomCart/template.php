<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame = $this->createFrame()->begin();
?>

<?$compareCount = count($_SESSION["COMPARE_LIST"]["ITEMS"])?>
<?$wishlistCount = count($_SESSION["WISHLIST_LIST"]["ITEMS"])?>

<?if ($arParams["SHOW_PRODUCTS"] == "Y" && $arResult['NUM_PRODUCTS'] > 0):?>

    <div class="delivery-container<?if($arResult["ART_TOTAL_PRICE"]<=0):?> freeDelivery<?endif;?>">
        <img src="#" align="left" class="pd-r-10">
        <?if(!empty($arResult["NUM_PRODUCTS"]) && $arResult["FREE_DELIVERY_SUM"] > 0):?><span <?if($arResult["ART_TOTAL_PRICE"]<=0):?>class="mark"<?endif;?>><?if($arResult["ART_TOTAL_PRICE"]>0):?>До бесплатной доставки осталось <span class="mark"><?=$arResult["ART_TOTAL_PRICE_STR"];?></span><?else:?>Доставка бесплатно<?;endif;?></span><?endif;?>
        <!--<span style="font-size: 14px;">Доставка вашого замовлення можлива за 1 коп.</span>-->
    </div>

    <div class="products-carousel-container">

        <div class="miniCartFooterCarouselWrapper">
            <div id="jcarousel-wrapper">
                <div class="jcarousel-container jcarousel-container-horizontal">
                    <div class="jcarousel">
                        <ul id="miniCartFooterCarousel">
                        <? $n = 1; foreach ($arResult["CATEGORIES"]["READY"] as &$arItem):?>
                            <li id="carouselProduct_<?=$arItem["ID"]?>" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-<?=$n?> jcarousel-item-<?$n?>-horizontal" jcarouselindex="<?$n?>">
                                <img id="img-preview" class="product-image"
                                     src=<?=$arItem["PICTURE_SRC"]?>
                                     alt=<?=$arItem["NAME"]?>
                                     title=<?=$arItem["NAME"]?>>
                                <a href=<?=$arItem["DETAIL_PAGE_URL"]?>
                                   class="footer-del-fade-div">
                                    <span href="javascript:void(0);" class="footerMiniCartRemoveLink" data-id="<?=$arItem["ID"]?>"></span>
                                </a>
                            </li>
                        <? $n++; endforeach?>
                        </ul>
                    </div>
                    <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                    <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                </div>
            </div>
        </div>
    </div>

<?endif?>

<div class="item footerCart">
	<a <?if(!empty($arResult["NUM_PRODUCTS"])):?>href="<?=SITE_DIR?>personal/cart/"<?endif;?> class="cart<?if(!empty($arResult["NUM_PRODUCTS"])):?> active<?endif;?>"><span class="icon"></span><?=GetMessage("CART_LABEL")?><span class="mark"><?=$arResult["NUM_PRODUCTS"]?></span></a>
</div>

<?$frame->end();?>