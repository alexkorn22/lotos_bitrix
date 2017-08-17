<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame = $this->createFrame()->begin();
?>

<?$compareCount = count($_SESSION["COMPARE_LIST"]["ITEMS"])?>
<?$wishlistCount = count($_SESSION["WISHLIST_LIST"]["ITEMS"])?>

<?if ($arParams["SHOW_PRODUCTS"] == "Y" && $arResult['NUM_PRODUCTS'] > 0):?>

    <div class="delivery-container<?if($arResult["ART_TOTAL_PRICE"]<=0):?> freeDelivery<?endif;?>">
        <?if(!empty($arResult["NUM_PRODUCTS"]) && $arResult["FREE_DELIVERY_SUM"] > 0):?><span <?if($arResult["ART_TOTAL_PRICE"]<=0):?>class="mark"<?endif;?>><?if($arResult["ART_TOTAL_PRICE"]>0):?>До бесплатной доставки <span class="freeDeliveryLeftStr">осталось </span><?else:?>Доставка бесплатно<?;endif;?></span><span class="mark"><?if($arResult["ART_TOTAL_PRICE"]>0):?><?=$arResult["ART_TOTAL_PRICE_STR"];?><?endif;?></span><?endif;?>
        <!--<span style="font-size: 14px;">Доставка вашого замовлення можлива за 1 коп.</span>-->
    </div>

    <div class="products-carousel-container">
        <? $n = 1; foreach ($arResult["CATEGORIES"]["READY"] as &$arItem):?>
            <div id="carouselProduct_<?=$arItem["ID"]?>" class="carousel-item" data-slick-index="<?=$n?>">
                <img id="img-preview" class="product-image"
                     src="<?=$arItem["PICTURE_SRC"]?>"
                     alt="<?=ltrim($arItem["NAME"])?>"
                     title="<?=ltrim($arItem["NAME"])?>">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"
                   class="footer-del-fade-div">
                    <span class="footerMiniCartRemoveLink" data-id="<?=$arItem["ID"]?>"></span>
                </a>
            </div>
        <? $n++; endforeach;?>
    </div>
<?endif?>

<div class="item footerCart">
    <a <?if(!empty($arResult["NUM_PRODUCTS"])):?>href="<?=SITE_DIR?>personal/cart/"<?endif;?> class="cart<?if(!empty($arResult["NUM_PRODUCTS"])):?> active<?endif;?>"><span class="icon"></span><span class="cartLabel"><?=GetMessage("CART_LABEL")?></span><span class="mark numProducts"><?=$arResult["NUM_PRODUCTS"]?></span></a>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var productsCarouselContainer = document.getElementsByClassName("products-carousel-container");
        if(productsCarouselContainer.length == 0)return;
        var containerWidth = productsCarouselContainer[0].clientWidth || productsCarouselContainer[0].offsetWidth;
        var count, _centerMode, _slidesToShow;

        count = 0;
        _centerMode = false;
        _slidesToShow = 1;

        if(containerWidth > parseInt(<?=$arResult["NUM_PRODUCTS"]?>*71)){
            _slidesToShow = parseInt(<?=$arResult["NUM_PRODUCTS"]?>);
            if(containerWidth > parseInt(<?=$arResult["NUM_PRODUCTS"]?>*71+50)){
                count = parseInt(<?=$arResult["NUM_PRODUCTS"]?>/2);
                _centerMode = true;
            };
        };

        $(".products-carousel-container").slick({
            prevArrow: '<button type="button" data-role="none" class="button-arrow slick-prev-arrow">Previous</button>',//$(".slick-prev-arrow"),
            nextArrow: '<button type="button" data-role="none" class="button-arrow slick-next-arrow">Next</button>',//$(".slick-next-arrow"),
            infinite: false,
            variableWidth: true,
            slidesToShow: _slidesToShow,
            centerMode: _centerMode,
            initialSlide: count
        });
    });
</script>

<?$frame->end();?>
