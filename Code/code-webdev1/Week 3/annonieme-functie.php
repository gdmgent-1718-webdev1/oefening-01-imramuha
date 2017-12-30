<?php 
    // annonieme functie = type closure
    $a = ["appel", 'bannen', 'druif', 'citroen'];
    $filter = ['appel', 'citroen', 'framboos'];

    $gefilterde_a = array_filter(
        $a,
        function ($element) use ($filter) {  // 
            return in_array($element, $filter); // als de return true is, wordt het gesaved in de resulterende array
        }
    );

    print_r($gefilterde_a);
    // r = recursieve 
    // gebruiken als een callback


    // twee getallen optellen aan de hand van een closure
    $toevoegenClosure = function ($x) {
        return function ($y) use ($x) {
            return $x + $y;
        };
   };

   $toevoegen10 = $toevoegenClosure(10);
   $toevoegen100 = $toevoegenClosure(100);
   $toevoegen1000 = $toevoegenClosure(1000);

   echo $toevoegen10(1), ' ', $toevoegen100(2), ' ', $toevoegen1000(3), PHP_EOL;   // drie closure<s
   echo $toevoegen10(4), ' ', $toevoegen100(6), ' ', $toevoegen1000(6);   // drie closure<s