<?php

$doelgroep = 'Wereld';

function boodschap($naam)                  
{
    
    return $naam = "Hallo, ${naam}!"; // de variabele naam wordt veranderd
}

echo $doelgroep;
echo boodschap($doelgroep), PHP_EOL; // de doelgroep gaat niet verandert zijn want de locale viabele scoop in de functie. Omdat doelgroep in een globale scoop zit.
echo $doelgroep;