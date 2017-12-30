<?php

$dbConfig = require 'db_config.php';

//var_dump($dbConfig); // dumpen data

error_reporting(E_ALL);

// code uitvoeren
// checken of er een fout is of niet
try {
    $db = new PDO(
        $dbConfig['dsn'],
        $dbConfig['user'],
        $dbConfig['password'],
        $dbConfig['options']
    );
} catch (PDOException $error) { // als error vangt het error op
    die("Tijdelijke fout!");    // en toon deze bericht
}

// data in een array steken
$a = [
    'Vincent' => 'Vega',
    'Honey' => 'Bunny',
];


$sql = 'CREATE TABLE IF NOT EXISTS users ('       //table maken - script wordt niet uitgevoerd als de table al bestaat IF NOT EXISTS
. 'user_id INTEGER PRIMARY KEY AUTO_INCREMENT, '             // spatie op het einde is belangrijk
. 'user_givenname VARCHAR(255), '
. 'user_familyname VARCHAR(255), '
. 'user_password CHAR(60) '
. ')';
$db->exec($sql);

// insert doen
$sql = 'INSERT INTO users '
. '(user_givenname, user_familyname, user_password) '
. ' VALUES '
//. "('Olivier', 'Parent', 'test')"                             // values tussen "" want '' wordt erna gebruikt.
. '(:givenname, :familyname, encrypt(:password))'               // prepared statements -> database weet dat je iets gaat insert (veiliger)
. ')';

$stmt = $db->prepare($sql);

if ($stmt) {
    foreach ($a as $givenname => $familyname) {      
        $stmt->bindValue(':givenname', $givenname);           // nu onmiddelijk
        $stmt->bindValue(':familyname', $familyname); 
        $stmt->bindValue(':password', "${givenname} ${familyname}");
        $stmt->execute();                                       // statement executen op statement niveau.
        echo $db ->lastInsertId(), PHP_EOL;
    }
}
$db = null;