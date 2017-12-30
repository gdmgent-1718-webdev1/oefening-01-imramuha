<?php
    // enumeratieve array
    $a = [];

    $a[] = 'Lorem';
    $a[] = 'Ipsem';
    $a[] = 1;


    var_dump($a);


    // om het getal te tonen
    echo count($a), PHP_EOL;

    // een for loop in php. 
    $count = count($a);
    for ($i = 0; $i < $count; ++$i) {
            // bij echo's lieft een comma (PHP_EOL = end of line)
            echo $a[$i], PHP_EOL;

    }

    // forEach loop is compacter dus ook meest gebruikt
    $count = count($a);
    forEach ($a as $arrayItem) {
        echo $arrayItem, PHP_EOL;
    }

//-------------- associatieve array 

    $a2 = [];
    $a2['one'] = [ // key
        'NL' => "een", // comma toont geen fout  // item1
        "FR" => "un",   // item2
        "DE" => "ein"   // itemm3
    ];

    $a2['two'] = [
        'NL' => "twee", // comma toont geen fout
        "FR" => "deux",
        "DE" => "zwei"
    ];

    // tweede manier
    $a3 = [
        'one' => [ // key
        'NL' => "een", // comma toont geen fout  // item1
        "FR" => "un",   // item2
        "DE" => "ein"   // itemm3
        ],

        'two'=> [
        'NL' => "twee", // comma toont geen fout
        "FR" => "deux",
        "DE" => "zwei"
        ],
    ];

    // als je code terug wilt schrijven
    var_dump($a2);
    
    echo $a2['two']['FR']; // so spreek je een multi-dimensionele array
    // echo $a2['two']['fr']; // , HET IS LETTERGEVOELIG!

    forEach ($a2 as $word => $translations){
        forEach($translations as $iso => $translations){
            echo "Woord '$(word)' is '$(translations)',", PFP_EOL;
        }
        
    }