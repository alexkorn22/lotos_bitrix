<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class Alert {
    protected $data;
    protected $text;
    public function __construct($data = []) {
        $this->data = $data;
    }

    public function parseText($pattern) {
        $this->text = $pattern;
        foreach ($this->data as $key => $value) {
            $this->text = str_replace('%' . $key . '%',$value, $this->text);
        }
    }

    public function sendTelegram($idChat) {

        $bot = new Telegram($idChat);
        App::$debug->inF($bot);
        App::$debug->inF($this->text);
        App::$debug->inF( $bot->sendMessage($this->text));

    }
}