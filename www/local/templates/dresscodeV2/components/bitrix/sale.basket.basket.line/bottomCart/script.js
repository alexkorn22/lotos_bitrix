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



    function initBottomCart ($NUM_PRODUCTS) {
        var $footerLine = $("#footerLine");
        var $footer = $("#footer");
        var $button = $('#hide-cart');

        if($NUM_PRODUCTS == 0){
            $button.addClass("hidden");
            $footerLine.addClass("hidden").slideUp();
            $footer.addClass("footerLineHidden");
        }else{
            $button.removeClass("hidden");
            $footerLine.slideDown().removeClass("hidden");
            $footer.removeClass("footerLineHidden");
        };

        $(".products-carousel-container").slick({
            prevArrow: '<button type="button" data-role="none" class="button-arrow slick-prev-arrow">Previous</button>',//$(".slick-prev-arrow"),
            nextArrow: '<button type="button" data-role="none" class="button-arrow slick-next-arrow">Next</button>',//$(".slick-next-arrow"),
            infinite: false,
            slidesToShow: 10,
            centerMode: false,
            responsive: [
                {
                    breakpoint: 1256,
                    settings: {
                        slidesToShow: 7
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5
                    }
                }
            ]
        });
    }