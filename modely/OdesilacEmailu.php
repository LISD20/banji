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
    public function odesliPoKontroleNaRobota($komu, $predmet, $zprava, $od) {
        $kontrola = new TestRobota();
        $vyhodnoceni = $kontrola->zkontrolujZdaToNeniRobot();
       // $kontrola->chytacRobotu;
        echo $vyhodnoceni;
        
        if ($vyhodnoceni == 'Neni') {
            $this->odesli($komu, $predmet, $zprava, $od);
        }
        else {
            throw new ChybaUzivatele('Skutečně nejsi robot?');
        }
    }
}
