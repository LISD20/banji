<?php

class RegistraceShrnutiKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Registrace shrnutí',
            'klicova_slova' => 'uživatel, pridat, dite, kod',
            'popis' => 'Stránka sloužící k overeni udajů.',
            'nadpis' => 'Registrace'
        );
        $this->pohled = 'registrace-shrnuti';
    }
}

