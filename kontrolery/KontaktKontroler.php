<?php

class KontaktKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Kontaktní formulář',
            'klicova_slova' => 'kontakt, email, formulář',
            'popis' => 'Kontaktní formulář našeho webu.',
            'nadpis' => 'Kontaktní formulář'
        );
        
        if (isset($_POST["email"])) {
            if ($_POST['rok'] == date("Y")) {
                $odesilacEmailu = new OdesilacEmailu();
                $odesilacEmailu->odesli("plenca@gmail.com", $_POST['predmet'], $_POST['zprava'], $_POST['email']);
            }
        }
        $this->pohled = 'kontakt';
    }
}