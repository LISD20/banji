<?php
/* 
 * Obecný kontroler, ze kterého budou všechny ostatní kontrolery dědit.
 * Jedná se oabstraktní třídu => nesmí tvořit instance přímo. Mohou být děděny.
 */
abstract class Kontroler {
    protected $data = array(); // Pole s daty od modelů. To se předá pohledu a ten vykreslí uživateli.
    protected $pohled = ""; // Název pohledu, který se má vypsat.
    protected $hlavicka = array('titulek' => '', 'klicova_slova' => '', 'popis' => '', 'nadpis' =>'');
    
    //Vyrenderuje pohled uživateli
    public function vypisPohled(){
        if ($this->pohled){
            extract($this->data); //Rozbalí proměné z pole data. Jako názvy proměných jsou použity klíče v poli.
            require "pohledy/" . $this->pohled . ".phtml";
        }
    }
    
    //Přesměruje na dané URL
    public function presmeruj($url) {
        header("Location: /$url");
        header("Connection: close");
        exit();
    }
    
    //Přidá zprávu pro uživatele
    public function pridejZpravu($zprava) {
        if (isset($_SESSION['zpravy']))
            $_SESSION['zpravy'][] = $zprava;
        else
            $_SESSION['zpravy'] = array($zprava);
    }
    //Pošle zprávy uživateli
    public function posliZpravy() {
        if (isset($_SESSION['zpravy'])) {
            $zpravy = $_SESSION['zpravy'];
            unset($_SESSION['zpravy']);
            return $zpravy;
        }
        else
            return array();
    }

    //Hlavní metoda kontroleru => každý konroler si ji zpracovává sám, proto je abstraktní 
    abstract function zpracuj($parametry);
}


