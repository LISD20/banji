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
                $odesilacEmailu->odesliPoKontroleNaRobota("plenca@gmail.com", $_POST['predmet'], $_POST['zprava'],$_POST['email']); 
                $this->presmeruj('kontakt');
                $this->pridejZpravu('Email byl úspěšně odeslán.');
            } 
            catch (ChybaUzivatele $chyba) {
                $this->pridejZpravu($chyba->getMessage());
            }
        }
        $this->pohled = 'kontakt';
    }
}