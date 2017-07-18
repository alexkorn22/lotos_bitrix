/**
 * Created by korns on 12.07.2017.
 */

function show_hide(id){
    var item = document.getElementById(id);
    if (item.style.display == 'none') {item.style.display = 'block';}
    else item.style.display = 'none';
}

$(document).ready(function(){

    $('.tapTitle').on("click",function(){
        if($('.limiter').width() <=980){
            $(this).siblings(".descriptionTitle").toggle(700);
        }
    });

});