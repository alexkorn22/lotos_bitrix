<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame = $this->createFrame()->begin();

?>

<?$compareCount = count($_SESSION["COMPARE_LIST"]["ITEMS"])?>
<?$wishlistCount = count($_SESSION["WISHLIST_LIST"]["ITEMS"])?>

<?if ($arParams["SHOW_PRODUCTS"] == "Y" && $arResult['NUM_PRODUCTS'] > 0):?>

    <div class="delivery-container<?if($arResult["ART_TOTAL_PRICE"]<=0):?> freeDelivery<?endif;?>">
        <?if(!empty($arResult["NUM_PRODUCTS"]) && $arResult["FREE_DELIVERY_SUM"] > 0):?><span <?if($arResult["ART_TOTAL_PRICE"]<=0):?>class="mark"<?endif;?>><?if($arResult["ART_TOTAL_PRICE"]>0):?>До бесплатной доставки осталось <?else:?>Доставка бесплатно<?;endif;?></span><span class="mark"><?if($arResult["ART_TOTAL_PRICE"]>0):?><?=$arResult["ART_TOTAL_PRICE_STR"];?><?endif;?></span><?endif;?>
        <!--<span style="font-size: 14px;">Доставка вашого замовлення можлива за 1 коп.</span>-->
    </div>

    <div class="slider-mini-cart">
    <div class="products-carousel-container">
        <? $n = 1; foreach ($arResult["CATEGORIES"]["READY"] as &$arItem):?>
            <div id="carouselProduct_<?=$arItem["PRODUCT_ID"]?>" class="carousel-item" data-slick-index="<?=$n?>">
                <img id="img-preview" class="product-image"
                     src="<?=$arItem["PICTURE_SRC"]?>"
                     alt="<?=ltrim($arItem["NAME"])?>"
                     title="<?=ltrim($arItem["NAME"])?>">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"
                   class="footer-del-fade-div">
                    <span class="footerMiniCartRemoveLink" data-id="<?=$arItem["ID"]?>" data-prod-id="<?=$arItem["PRODUCT_ID"]?>"></span>
                </a>
            </div>
        <? $n++; endforeach;?>
    </div>
    </div>
<?endif?>

<div class="item footerCart">
    <a <?if(!empty($arResult["NUM_PRODUCTS"])):?>href="<?=SITE_DIR?>personal/cart/"<?endif;?> class="cart<?if(!empty($arResult["NUM_PRODUCTS"])):?> active<?endif;?>"><span class="icon"></span><span class="cartLabel"><?=GetMessage("CART_LABEL")?></span><span class="mark numProducts"><?=$arResult["NUM_PRODUCTS"]?></span></a>
</div>

<script>
    var $NUM_PRODUCTS = parseInt(<?=$arResult["NUM_PRODUCTS"]?>);
    $(document).ready(function(){
        initBottomCart($NUM_PRODUCTS);
    });
</script>

<?$frame->end();?>
