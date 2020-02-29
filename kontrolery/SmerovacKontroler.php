<?php
/* 
 *Směrovač (router)
 * 
 * speciální kontroler, který bude pomocí URL adresy volat správný kontroler
 * a jím vytvořený pohled vloží do šablony stránky
 */
class SmerovacKontroler extends Kontroler {
    
    //instance Kontroleru
    protected $kontroler;
    
    //Metoda převede polmčkovouvariantu kontroleru na velbloudí => název třídy
    private function pomlckyDoVelbloudiNotace($text) {
        $veta = str_replace('-', ' ', $text); // Z parametru věty. - nhardíme mezerou
        $veta = ucwords($veta); // Zmení první písmeno na velké
        $veta = str_replace(' ', '', $veta); // Odstraní mezery
        return $veta;
    }


    //Naparsuje URL podle lomítek a vrátí pole parametrů
    private function parsujURL($url) {
        /*
         * parse_url() 
         * oddělí část s protokelem a doménou a vrátí nám asociativní pole,
         *které má tvar "/kontroler/parametr2/parametr3" pod indexem path.
         * ltrim()
         * modifikace funkce trim. Odstranuje zleva bílé znaky a znaky v parametru " "
         * my chceme dát pryč / z leva a ostatní bílé znaky zprava
         * explode()
         * rodělí řetězec podle vybraného oddělovače na několik podřetězců
         * a ty vrátí v poli.
         */
        $naparsovanaURL = parse_url($url);
        $naparsovanaURL["path"] = ltrim($naparsovanaURL["path"], "/");
        $naparsovanaURL["path"] = trim($naparsovanaURL["path"]);
        $rozdelenaCesta = explode("/", $naparsovanaURL["path"]);
        return $rozdelenaCesta;
    }

    // Implementace abstraktní metody zpracuj
    public function zpracuj($parametry) {
       $naparsovanaURL = $this->parsujURL($parametry[0]);
       
       // Pokud není zadán žádný kontroler (první parametr url je prázdný/chybí) přesměruje na domů
       if (empty($naparsovanaURL[0]))   
           $this->presmeruj ('domu.html'); //!!! zkusit vymyslte elegantněnjší řešení
       /*
        * Kontroler je 1. parametr URL
        * 
        * array_shift
        * 
        * odebere první prvek z pole a posune ostatní dpředu 
        * systém jakési fronty 
        */
       $tridaKontroleru = $this->pomlckyDoVelbloudiNotace(array_shift($naparsovanaURL)) . 'Kontroler';
       
       /*
        * Kontrola, zda existuje třída (Kontroler) daného jména. Pokud ano,
        * tak tvoříme jeho instanci. Pokud ne, přesměrujeme na chybovou stránku.
        */
       if (file_exists('kontrolery/' . $tridaKontroleru . '.php'))
           $this->kontroler = new $tridaKontroleru;
       else
           $this->presmeruj ('chyba');
       // Na vnořeném kontroleru zavoláme metodu zpracuj a necháme ho provést jeho logiku
       $this->kontroler->zpracuj($naparsovanaURL);
       
       //Nastavení proměný pro šablonu
       $this->data['titulek'] = $this->kontroler->hlavicka['titulek'];
       $this->data['popis'] = $this->kontroler->hlavicka['popis'];
       $this->data['klicova_slova'] = $this->kontroler->hlavicka['klicova_slova'];
       
       //Nastavení hlavní šablony
       $this->pohled = 'rozlozeni';
    }
}

