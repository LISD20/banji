<?php

class KontaktKontroler extends Kontroler {
    public function zpracuj($parametry) {
        $this->hlavicka = array (
            'titulek' => 'Kontaktní formulář',
            'klicova_slova' => 'kontakt, email, formulář',
            'popis' => 'Kontaktní formulář našeho webu.',
            'nadpis' => 'Kontaktní formulář'
        );
        
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $secretKey = "6LeAft0UAAAAADlxCYJExbb0A9-SMkPHTwseqdaQ";
            $responseKey = $_POST['g-recaptcha-response'];
            $userIP = $_SERVER['REMOTE_ADDR'];
            
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
            $response = file_get_contents($url);
            $response = json_decode($response);
            
            if ($response->success) {
                $odesilacEmailu = new OdesilacEmailu();
                $odesilacEmailu->odesli("plenca@gmail.com", $_POST['predmet'], $_POST['zprava'], $_POST['email']);
            }
            else 
                echo '';
        }
        $this->pohled = 'kontakt';
    }
}
