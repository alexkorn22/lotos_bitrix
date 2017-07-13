<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame = $this->createFrame()->begin();
?>

<?$compareCount = count($_SESSION["COMPARE_LIST"]["ITEMS"])?>
<?$wishlistCount = count($_SESSION["WISHLIST_LIST"]["ITEMS"])?>

<div class="item">
	<a <?if(!empty($arResult["NUM_PRODUCTS"])):?>href="<?=SITE_DIR?>personal/cart/"<?endif;?> class="cart<?if(!empty($arResult["NUM_PRODUCTS"])):?> active<?endif;?>"><span class="icon"></span><?=GetMessage("CART_LABEL")?><span class="mark"><?=$arResult["NUM_PRODUCTS"]?></span></a>
</div>
<?$frame->end();?>