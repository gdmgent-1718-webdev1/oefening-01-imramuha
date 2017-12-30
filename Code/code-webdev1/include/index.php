<?php

$name = "Wereld";

$title = 'Include voorbeeld';

// variabelen interpolation met ""
$greeting = "Hallo, wereld!";

// in JS var = greeting2 = "Hallo, ${name}";
#$greeting = "Hallo, ${name}";

require_once 'view.html.php'; // best toepassing net op website
include_once 'view.html.php';  // een keer

// commentaar

# commentaar

/*   php trekt zich niet aan
*/

/** 
*    hou het in het geheugen
*/

