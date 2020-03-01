<?php

class OdesilacEmailu {
/* 
 * Odešle email jako HTML, lze tedy používat základní HTML tagy a nové
 * řádky je třeba psát jako <br /> nebo používat odstavce. Kódování je
 * odladěno pro UTF-8.
 */
    public function odesli($komu, $predmet, $zprava, $od) {
        $hlavicka = "From: " . $od;
        $hlavicka .= "\nMIME-Version: 1.0\n";
        $hlavicka .= "Content-Type: text/html; charset=\"utf-8\"\n";
        if (!mb_send_mail($komu, $predmet, $zprava, $hlavicka))
            throw new ChybaUzivatele('Bohužel se email nepodařilo odeslat.'); 
    }
// Vložená reChapta => Měla by mít samostatný model, ale zatím to neumím, nedjde mi to. Pučmeloud
    public function odesliPoKontroleRobota($komu, $predmet, $zprava, $od) {
        // Test na straně google
        if ($od) {
        #$username = $od;
        $secretKey = "6LeAft0UAAAAADlxCYJExbb0A9-SMkPHTwseqdaQ";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];

        $urlTest = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($urlTest);
        $response = json_decode($response);
        
        // Podmínky
        if ($response->success) {
            $this->odesli($komu, $predmet, $zprava, $od);
        }
        else {
            throw new ChybaUzivatele('Skutečně nejsi robot?');
        }
        }   
    }
}
