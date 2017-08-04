<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame = $this->createFrame()->begin();
?>

<?$compareCount = count($_SESSION["COMPARE_LIST"]["ITEMS"])?>
<?$wishlistCount = count($_SESSION["WISHLIST_LIST"]["ITEMS"])?>

<?if ($arParams["SHOW_PRODUCTS"] == "Y" && $arResult['NUM_PRODUCTS'] > 0):?>

    <div class="delivery-container">
        <img src="#" align="left" class="pd-r-10">
        <?if(!empty($arResult["NUM_PRODUCTS"]) && $arResult["FREE_DELIVERY_SUM"] > 0):?><span class="freeDelivery<?if($arResult["ART_TOTAL_PRICE"]<=0):?> mark<?endif;?>"><?if($arResult["ART_TOTAL_PRICE"]>0):?>До бесплатной доставки осталось <span class="mark"><?=$arResult["ART_TOTAL_PRICE_STR"];?></span><?else:?>Доставка бесплатно<?;endif;?></span><?endif;?>
        <!--<span style="font-size: 14px;">Доставка вашого замовлення можлива за 1 коп.</span>-->
    </div>

    <div class="products-carousel-container">
        <a href="javascript:void(0)" id="miniCartFooterCarouselPrev" style="display: none;" class="carousel-ctrl-disable"></a>
        <div id="miniCartFooterCarouselContainer" class="carousel-product-holder clearfix no-padding-bottom" style="left: 15px;">
            <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
                <div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
                    <ul id="miniCartFooterCarousel" data-visible="10" class="jcarousel-list jcarousel-list-horizontal" style="/*overflow: hidden;*/ position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 150px;">
                    <? $n = 1; foreach ($arResult["CATEGORIES"]["READY"] as &$arItem):?>
                        <li id="carouselProduct_<?=$arItem["PRODUCT_ID"]?>" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-<?=$n?> jcarousel-item-<?$n?>-horizontal" jcarouselindex="<?$n?>" style="float: left; list-style: none;">
                            <img id="img-preview" class="product-image"
                                 src=<?=$arItem["PICTURE_SRC"]?>
                                 alt=<?=$arItem["NAME"]?>
                                 title=<?=$arItem["NAME"]?>>
                            <form action="/cart/removeEntry" method="POST" class="noreset">
                                <input type="hidden" name="entryNumber" value="0">
                                <input type="hidden" name="productCode" value="<?=$arItem["PRODUCT_ID"]?>">
                                <input type="hidden" name="initialQuantity" value="<?=$arItem["QUANTITY"]?>">
                                <input type="hidden" name="quantity" value="<?=$arItem["QUANTITY"]?>">
                            </form>
                            <a href=<?=$arItem["DETAIL_PAGE_URL"]?>
                               class="footer-del-fade-div">
                                <span href="javascript:void(0);" class="footerMiniCartRemoveLink"></span>
                            </a>
                        </li>
                    <? $n++; endforeach?>
                    </ul>
                </div>
            </div>
        </div>
        <a href="javascript:void(0)" id="miniCartFooterCarouselNext" style="display: none;" class="carousel-ctrl-disable"></a>
    </div>

<?endif?>

<div class="item">
	<a <?if(!empty($arResult["NUM_PRODUCTS"])):?>href="<?=SITE_DIR?>personal/cart/"<?endif;?> class="cart<?if(!empty($arResult["NUM_PRODUCTS"])):?> active<?endif;?>"><span class="icon"></span><?=GetMessage("CART_LABEL")?><span class="mark"><?=$arResult["NUM_PRODUCTS"]?></span></a>
</div>

<?$frame->end();?>