<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class ShowDialogMessage {

    public function setMessage($params,$template) {

        $_SESSION['show_msg'] = array(
            'template' => $template,
            'data' => serialize($params),
        );

    }

    public function showMessage() {
        if (!isset($_SESSION['show_msg'])) {
            return;
        }
        App::$view->render($_SESSION['show_msg']['template'],
            ['data' => unserialize($_SESSION['show_msg']['data'])]
        );

        unset($_SESSION['show_msg']);
    }
    public function del() {
        unset($_SESSION['show_msg']);
    }
}