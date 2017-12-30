<?php

$dsnProperties = [
    'dbname' => 'webdebv1-db',
    'host' => 'localhost',
    'port' => 3306,
    'charset' => "utf8",
];

// rr
$dsn = 'mysql:';

foreach ($dsnProperties as $property => $value) {
    $dsn .= "${property}=${value};";
}

return [
    'dsn' => $dsn,           //data source name
    'user' => 'webdev1-user',
    'password' => 'webdev1-pass',
    'options' => null,
];