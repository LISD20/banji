<?php
/* 
 * Kontroler pro chybovou stránku
 */
class ChybaKontroler extends Kontroler {
    public function zpracuj($prametry) {
        //Hlavička požadavku
        header("HTTP/1.0 404 Not Found");
        //Hlavička stránky
        $this->hlavicka['titulek'] = 'Chyba 404';
        //Nadpis stránky
        $this->hlavicka['nadpis'] = 'Chyba';
        //Nastavení šablony
        $this->pohled = 'chyba';
    }
}

