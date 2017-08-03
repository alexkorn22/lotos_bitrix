<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame = $this->createFrame()->begin();
?>

<?$compareCount = count($_SESSION["COMPARE_LIST"]["ITEMS"])?>
<?$wishlistCount = count($_SESSION["WISHLIST_LIST"]["ITEMS"])?>

<div class="item">
	<a <?if(!empty($arResult["NUM_PRODUCTS"])):?>href="<?=SITE_DIR?>personal/cart/"<?endif;?> class="cart<?if(!empty($arResult["NUM_PRODUCTS"])):?> active<?endif;?>"><span class="icon"></span><?=GetMessage("CART_LABEL")?><span class="mark"><?=$arResult["NUM_PRODUCTS"]?></span></a>
    <?if(!empty($arResult["NUM_PRODUCTS"]) && $arResult["FREE_DELIVERY_SUM"] > 0):?><div class="freeDelivery<?if($arResult["ART_TOTAL_PRICE"]<=0):?> mark<?endif;?>"><?if($arResult["ART_TOTAL_PRICE"]>0):?>До бесплатной доставки осталось <span class="mark"><?=$arResult["ART_TOTAL_PRICE_STR"];?></span><?else:?>Доставка бесплатно<?;endif;?></div><?endif;?>
</div>

<?$frame->end();?>