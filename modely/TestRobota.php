<?php

/* 
 * Třída testuje google rechaptu a vrací zda uživatel je/není robot 
 */

class TestRobota {
    
    public $chytacRobotu;
    
    public function zkontrolujZdaToNeniRobot() {
        $secretKey = "6Lfcpd0UAAAAACRmNlKjmQjtPc80ioWQOOjsOsvC";
        $responseKey = $_POST['g-recaptcha-response'];
        //$userIP = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey"; // &remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success) {
            $this->chytacRobotu = 'Neni';
            return $this->chytacRobotu;
        }
        else {
            $this->chytacRobotu = 'Je';
            return $this->chytacRobotu;
        }
    }
}

