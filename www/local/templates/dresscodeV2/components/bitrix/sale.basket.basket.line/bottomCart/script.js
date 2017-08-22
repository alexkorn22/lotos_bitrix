$(document).on("click", ".footerMiniCartRemoveLink", function(e){

	if(ajaxDir == "" || ajaxDir == undefined) {
        var ajaxDir = "/local/components/dresscode/sale.basket.basket";
    };
    var $this = $(this);
    if($this.data("id") !=""){
        $this.addClass("loading");
        $.get(ajaxDir + "/ajax.php?act=del&id=" + $this.data("id"), function(data){
			if($("#flushFooterCart").find(".footerMiniCartRemoveLink").length > 0) {
                $(".addCart[data-id='"+ $this.data("prod-id")+ "']").removeClass("added").html(LANG["ADD_BASKET_DEFAULT_LABEL"])
                    .prepend($("<img />").attr({src: TEMPLATE_PATH + "/images/incart.png", class: "icon"}))
                    .attr("href", "#");
                cartReload();
            }
        });
    }else{
        alert("error; [data-id] not found!")
    }
    e.preventDefault();
});
