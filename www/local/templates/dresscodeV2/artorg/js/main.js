/**
 * Created by korns on 12.07.2017.
 */

$(document).ready(function(){
    $('.tapTitle').on("click",function(){
        if($('.limiter').width() <=980){
            $(this).siblings(".descriptionTitle").toggle(700);
        }
    });
    modalForm();

// fixed menu
    var nav = $('#mainMenuContainer');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 135) {
            nav.addClass("fix-menu");
        } else {
            nav.removeClass("fix-menu");
        }
    });

// end fixed menu

});

modalForm = function() {
    var $win = $(".modalForm");
    var windowClose = function(event){
        $win.data("reload") ? document.location.reload() : $win.hide();
        var elem = $(this);
        if (elem.attr('href') == '#') {
            event.preventDefault();
        }
    };
    $(document).on("click", ".modalForm, .modalForm .close", windowClose);

};

