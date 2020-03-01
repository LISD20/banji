<?php

class ObnovaHeslaKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Obnova zapomenutého hesla',
            'klicova_slova' => 'uživatel, obnova, email, heslo',
            'popis' => 'Stránka sloužící k obnovení zapomenutého hesla.',
            'nadpis' => 'Obnova hesla'
        );
        $this->pohled = 'obnova-hesla';
    }
}


