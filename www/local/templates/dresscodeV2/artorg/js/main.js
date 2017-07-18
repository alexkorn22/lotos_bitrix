/**
 * Created by korns on 12.07.2017.
 */

$(document).ready(function(){
    $('.tapTitle').on("click",function(){
        if($('.limiter').width() <=980){
            $(this).siblings(".descriptionTitle").toggle(700);
        }
    });
});