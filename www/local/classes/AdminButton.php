<?php

class AdminButton
{
    protected $buttons;

    public function createHtmlButtons(){
        $html = '';
        foreach ($this->buttons as $button){
            $html .= $button;
        }
        return $html;
    }

    public function setButtons (){
        $this->buttons[] ='<button class="btn btn-primary" id="turnToTestSite" onclick="createButton({action:\'EventBitrix\',method:\'makeTestSite\',params:{makeTestSite:\'true\'}})">Преобразовать в тестовый сайт</button>';
    }

    public function addTabButtons($form){
        if($this->isPage('gcustomsettings.php')){
            global $APPLICATION;
            define('SITE_TEMPLATE_PATH','/local/templates/dresscodeV2');
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery-1.11.0.min.js");
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/artorg/js/admin.js");
            $this->setButtons();
            $form->tabs[] = array("DIV" => "обработки", "TAB" => "Дополнительные обработки", "TITLE"=>"Дополнительные обработки",
                "CONTENT"=> $this->createHtmlButtons()
            );
        }
    }

    public function isPage($pageName){
        if($GLOBALS["APPLICATION"]->GetCurPage() == "/bitrix/admin/".$pageName){
            return true;
        }
        return false;
    }

}
?>

