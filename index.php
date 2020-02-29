<?php
/* 
 * Kód vznikl s pomocí tutoriálu na http://www.itnetwork.cz
 * 
 * Začíná zde vešekerá komunikace.
 * Sem se budou přesměrovávat veškeré URL adresy
 */
mb_internal_encoding("UTF-8");

//Automatické načítáhní tříd kontrolerů, ve chvíli, kdy jsou třeba. (netřeba require/incxlude)
function autoloadFunkce($trida) {
    //Končí název třídy řetězcem "Kontroler"? Pokud ne, jedná se o model.
    if (preg_match('/Kontroler$/', $trida))
        require "kontrolery" . $trida . ".php";
    else
        require "modely/" . $trida . ".php";
}
// !Pod PHP 5.2 nutné nahradit za starší funkci __autoload()
spl_autoload_register("autoloadFunkce"); // Říká PHP, aby naši funkci vykonávalo jako autoloader




