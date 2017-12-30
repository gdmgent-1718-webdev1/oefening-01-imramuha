<?php

//print_r(SQLite3::version());                    // recursief herhalen
echo SQLite3::version()['versionString'], PHP_EOL; //

// data in een array steken
$a = [
    'Vincent' => 'Vega',
    'Honey' => 'Bunny',
];

// stap 1: database maken
$db = new SQLite3('database.sqlite');             // best zetten niet in een publieke map
$db = new SQLite3(':memory:');                    // database bestaat uit geheugen. script gedaan? alles weg

$sql = 'CREATE TABLE IF NOT EXISTS users ('       //table maken - script wordt niet uitgevoerd als de table al bestaat IF NOT EXISTS
    . 'user_id INTEGER PRIMARY KEY, '             // spatie op het einde is belangrijk
    . 'user_givenname VARCHAR(255), '
    . 'user_familyname VARCHAR(255), '
    . 'user_password CHARACTER(60) '
    . ')';
// query echoe'n
echo $sql;

// een executer op database niveau - query zonder resultaat
$db->exec($sql);  

$db->createFunction('encrypt', function ($wachtwoord){                  // wordt uitgevoerd op encrypt password in INSERT INTO
    return md5($wachtwoord);
});

// insert doen
$sql = 'INSERT INTO users '
    . '(user_givenname, user_familyname, user_password) '
    . ' VALUES '
    //. "('Olivier', 'Parent', 'test')"                         // values tussen "" want '' wordt erna gebruikt.
    . '(:givenname, :familyname, encrypt(:password))'        // prepared statements -> database weet dat je iets gaat insert (veiliger)
    . ')';

    // query voorbereiden maken een prepare statement
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':givenname', $givenname);              // deze met query en deze met php code
    $stmt->bindParam(':familyname', $familyname);            // 2 dingen aan elkaar koppel om het moment wanneer je de query gaat uitvoeren

    foreach ($a as $givenname => $familyname) {      
        //$stmt->bindValue(':givenname', $givenname);        // nu onmiddelijk
        //$stmt->bindValue(':familyname', $familyname); 
        $stmt->bindValue(':password', "${givenname} ${familyname}");
        $stmt->execute();                                       // statement executen op statement niveau.
        echo $db ->lastInsertRowID(), PHP_EOL;
    }
    $stmt->close(); 
$db->close();                                       // sluiten (best zo snel mogelijk voor performance)

// nieuwe query maken
$sql = 'SELECT * '
    . 'FROM users';

$res = $db->query($sql);                             // hier verwacht je wel iets terug in vegelijking met exec
while ($row = $res -> fetchArray()) {
    print_r($row);
    echo PHP_EOL;
}

//$db->exec($sql);                                  // uitvoeren/execute query

// niet veilig
//md5('test');


//sleep(60);                                        // niemand meer kan aan de database gedurende 60 seconden