<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

abstract class AbsExchange{

    protected $token;
    protected $session = array();
    protected $pathTemp = '/upload/custom_exchange';
    public $timeLimitSec = 30;
    protected $startTime;
    protected $fileTemp;

    public function __construct(){
        $this->startTime = time();
    }

    public function verification($get) {
        if (empty($this->token)){
            $res = array(
                'result' => 'error',
                'message' => 'Wrong token',
            );
            $this->answer($res, false);
            return false;
        }
        if (!isset($get['access_token']) && !isset($get['mode'])) {
            $res = array(
                'result' => 'error',
                'message' => 'Wrong token',
            );
            $this->answer($res, false);
            return false;
        }
        if ($_GET['access_token'] <> $this->token) {
            $res = array(
                'result' => 'error',
                'message' => 'Wrong token',
            );
            $this->answer($res, false);
            return false;
        }
        return true;
    }

    public function run($get, $jsonData = array()) {

        if ($get['mode'] == 'json_params'){
            $nameAction = $jsonData['action'] . 'Action';
            if (method_exists($this, $nameAction)) {
                @set_time_limit($this->timeLimitSec + 120);
                $this->fileTemp = $this->pathTemp . '/' . $this->token . '/' . $nameAction . $jsonData['guid'] . '.json';
                if ($get['clear_cache'] == 'y') {
                    $this->delTempData();
                }
                $this->getTempData();
                $this->$nameAction($jsonData['data']);
            }
        }

    }

    protected function answer($data, $die = true) {
        ob_clean();
        echo json_encode($data);
        if ($die) {
            die;
        }
    }

    protected function getTempData() {
        if (file_exists($this->fileTemp)) {
            $this->session = json_decode(file_get_contents($this->fileTemp),true);
        }
    }

    protected function delTempData() {
        if (file_exists($this->fileTemp)) {
            unlink($this->fileTemp);
        }
    }

    protected function setTempData() {
        mkdir($this->pathTemp . '/' . $this->token);
        file_put_contents($this->fileTemp,json_encode($this->session));
    }

    protected function timeIsUp() {
        return (time() - $this->startTime) > $this->timeLimitSec;
    }

}