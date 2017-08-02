<?php


class ShowDialogMessage {

    public function setMessage($params,$template) {

        $_SESSION['show_msg'] = array(
            'template' => $template,
            'data' => $params,
        );

    }

    public function showMessage() {
        if (!isset($_SESSION['show_msg'])) {
            return;
        }
        App::$view->render($_SESSION['show_msg']['template'],
            ['data' => $_SESSION['show_msg']['data']]
        );

        unset($_SESSION['show_msg']);
    }
}