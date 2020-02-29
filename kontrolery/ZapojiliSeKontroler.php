<?php

class ZapojiliSeKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Zapojili se',
            'klicova_slova' => 'školka, projekt, výchova',
            'popis' => 'Do našeho projektu se zapojily tyto školky.',
            'nadpis' => 'Zapojili se'
        );
        $this->pohled = 'zapojili-se';
    }
}