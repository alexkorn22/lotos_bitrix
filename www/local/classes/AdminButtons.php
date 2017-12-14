<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 14.12.2017
 * Time: 15:43
 */

class AdminButtons
{

    public function makeTestSite($params)
    {
        global $USER;
        if ($USER->IsAdmin() && $params['makeTestSite'] == 'true'){
            App::$config->setDebug();
            $file = $_SERVER["DOCUMENT_ROOT"] . "/robots.txt";
            $content = "User-Agent: \n*Disallow: /";
            file_put_contents($file, $content);

        }
    }

}