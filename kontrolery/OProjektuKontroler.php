<?php

class OProjektuKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'O Projektu',
            'klicova_slova' => 'projekt, tým, vývoj',
            'popis' => 'Stránka popisující projekt Banji.',
            'nadpis' => 'O Projektu'
        );
        $this->pohled = 'o-projektu';
    }
}