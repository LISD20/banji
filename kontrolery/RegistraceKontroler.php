<?php

class RegistraceKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Registrace',
            'klicova_slova' => 'uživatel, registrace, email, heslo, jméno',
            'popis' => 'Stránka sloužící k registraci nových uživatelů.',
            'nadpis' => 'Registrace do portálu'
        );
        $this->pohled = 'registrace';
    }
}

