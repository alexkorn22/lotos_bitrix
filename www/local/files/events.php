<?php
AddEventHandler("main", "OnAfterUserAdd",'cOnAfterUserAdd');
function cOnAfterUserAdd(&$arFields) {
    $event = new EventBitrix();
    $event->onAfterUserAdd($arFields);
}