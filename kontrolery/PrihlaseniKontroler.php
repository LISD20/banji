<?php

class PrihlaseniKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Přihlášení',
            'klicova_slova' => 'uživatel, přihlášení, email, heslo',
            'popis' => 'Stránka sloužící k přihlášení registrovaných uživatelů.',
            'nadpis' => 'Přihlášení do portálu'
        );
        $this->pohled = 'prihlaseni';
    }
}

