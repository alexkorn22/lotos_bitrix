<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame = $this->createFrame()->begin();
?>

<?$compareCount = count($_SESSION["COMPARE_LIST"]["ITEMS"])?>
<?$wishlistCount = count($_SESSION["WISHLIST_LIST"]["ITEMS"])?>

<?if ($arParams["SHOW_PRODUCTS"] == "Y" && $arResult['NUM_PRODUCTS'] > 0):?>

    <div class="delivery-container<?if($arResult["ART_TOTAL_PRICE"]<=0):?> freeDelivery<?endif;?>">
        <?if(!empty($arResult["NUM_PRODUCTS"]) && $arResult["FREE_DELIVERY_SUM"] > 0):?><span <?if($arResult["ART_TOTAL_PRICE"]<=0):?>class="mark"<?endif;?>><?if($arResult["ART_TOTAL_PRICE"]>0):?>До бесплатной доставки осталось <span class="mark"><?=$arResult["ART_TOTAL_PRICE_STR"];?></span><?else:?>Доставка бесплатно<?;endif;?></span><?endif;?>
        <!--<span style="font-size: 14px;">Доставка вашого замовлення можлива за 1 коп.</span>-->
    </div>

    <div class="products-carousel-container">
        <div class="miniCartFooterCarouselWrapper">
            <div class="carousel">
                <button type="button" data-role="none" class="button-arrow slick-prev-arrow">Previous</button>
                <div id="miniCartFooterCarousel">
                    <? $n = 1; foreach ($arResult["CATEGORIES"]["READY"] as &$arItem):?>
                        <div id="carouselProduct_<?=$arItem["ID"]?>" class="carousel-item">
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
                <button type="button" data-role="none" class="button-arrow slick-next-arrow">Next</button>
            </div>
        </div>
    </div>
<?endif?>

<div class="item footerCart">
    <a <?if(!empty($arResult["NUM_PRODUCTS"])):?>href="<?=SITE_DIR?>personal/cart/"<?endif;?> class="cart<?if(!empty($arResult["NUM_PRODUCTS"])):?> active<?endif;?>"><span class="icon"></span><span class="cartLabel"><?=GetMessage("CART_LABEL")?></span><span class="mark numProducts"><?=$arResult["NUM_PRODUCTS"]?></span></a>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#miniCartFooterCarousel').slick({
            appendArrows: $(".button-arrow"),
            prevArrow: $(".slick-prev-arrow"),
            nextArrow: $(".slick-next-arrow"),
            accessibility:true,

            infinite: false,
            speed: 300,
            slidesToShow: 9,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1290,
                    settings: {
                        slidesToShow: 8,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 920,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 710,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>

<?$frame->end();?>
