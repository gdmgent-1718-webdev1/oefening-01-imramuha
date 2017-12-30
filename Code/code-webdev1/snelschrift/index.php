<?php

$name = "Wereld";

// variabelen interpolation met ""
$greeting = "Hallo, wereld!";

// in JS var = greeting2 = "Hallo, ${name}";
$greeting2 = "Hallo, ${name}";

// commentaar

# commentaar

/*   php trekt zich niet aan
*/

/** 
*    hou het in het geheugen
*/

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
   
   
    <title>Snelschrift</title>
</head>
<body>
        <p>Hello, wereld</p>
        <?php echo 'Hallo, Wereld' ?>  
        <?= $greeting ?>  
        <?= $greeting2 ?>
</body>
</html>