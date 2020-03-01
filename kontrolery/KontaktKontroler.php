<?php

class KontaktKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Kontaktní formulář',
            'klicova_slova' => 'kontakt, email, formulář',
            'popis' => 'Kontaktní formulář našeho webu.',
            'nadpis' => 'Kontaktní formulář'
        );
        
        if ($_POST) {
            try {
                $odesilacEmailu = new OdesilacEmailu();
                $odesilacEmailu->odesliPoKontroleRobota("plenca@gmail.com", $_POST['predmet'], $_POST['zprava'],$_POST['email']);
                #$this-> //Dopsat zaslání zprávy o úspěšném odeslání.
                $this->presmeruj('kontakt');
            } 
            catch (Exception $ex) {
                //Zde zpráva o chybě
            }
        }
        $this->pohled = 'kontakt';
    }
}