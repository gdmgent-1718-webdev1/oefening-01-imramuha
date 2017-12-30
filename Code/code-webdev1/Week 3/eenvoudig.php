<?php


declare (strict_types=1);

/**     deze wordt in de geheugen bewaard
*  @param string $naam Naam van de persoon. --> om je code beter te maken
*  @return string Dit returneerd een string
*/
                    //? ik accept een string of null                            // dit werkt alleen als het de laatste waarde is
function halloWereld(?string $naam, ?string $middelstenaam, ?string $achternaam/*="hi"*/) /*: string*/
{                                                                       
        // return null;
        // $namen = func_get_args;              // argumenten opvragen die meegegeven worden als argument
        // $namen = implode(' ', $naam);        // implode = alle items/array items aan elkaar plakken met een string - kan er ook strings tussenzetten.
        return "Hallo, ${naam} ${middelstenaam} ${achternaam}!";
}

$mijnFunctie = 'HalloWereld';                   // functie doorgeven aan een varibele die uitgevoerd kan worden door de variebele op te roepen.

echo $mijnfunctie("Imran", null,"Muhammad")/*, PHP_EOL*/;

