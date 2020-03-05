<?php

class TestRobota {
    
    public $chytacRobotu;
    
    public function zkontrolujZdaToNeniRobot() {
        $secretKey = "6LccCSMUAAAAAKkTzemiArEQkQ5hKcgKJG8NQO0-";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success) {
            $this->chytacRobotu = 'Není';
            return $this->chytacRobotu;
        }
        else {
            $this->chytacRobotu = 'Je';
            return $this->chytacRobotu;
        }
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

