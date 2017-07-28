<?php


class View {

    protected $pathView;

    public function __construct(){
        $this->pathView = $_SERVER['DOCUMENT_ROOT'] . '/local/files/views';
    }

    public function render($view, $vars) {
        if (is_array($vars)) {
            extract($vars);
        }
        $fileView =  $this->pathView . "/{$view}.php";
        if (is_file($fileView)){
            require $fileView;
        } else {
            echo "<p>Не найден вид <b>$fileView</b></p>";
        }

    }

}