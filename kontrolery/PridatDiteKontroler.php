<?php

class PridatDiteKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Přidat dítě',
            'klicova_slova' => 'uživatel, pridat, dite, kod',
            'popis' => 'Stránka sloužící k zadani kodu dítěte.',
            'nadpis' => 'Registrace'
        );
        $this->pohled = 'pridat-dite';
    }
}

