<?php
/* 
 * Obecný kontroler, ze kterého budou všechny ostatní kontrolery dědit.
 * Jedná se oabstraktní třídu => nesmí tvořit instance přímo. Mohou být děděny.
 */
abstract class Kontroler {
    protected $data = array(); // Pole s daty od modelů. To se předá pohledu a ten vykreslí uživateli.
    protected $pohled = ""; // Název pohledu, který se má vypsat.
    protected $hlavicka = array('titulek' => '', 'klicova_slova' => '', 'popis' => '');
    
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

    //Hlavní metoda kontroleru => každý konroler si ji zpracovává sám, proto je abstraktní 
    abstract function zpracuj($parametry);
}


