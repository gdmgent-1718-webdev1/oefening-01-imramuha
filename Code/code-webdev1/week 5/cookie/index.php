<?php
    // om mensen ingelogd te laten -> cookie is in de browser.
// iedereen gaat hetzelfde zien
// afhankelijk van welke cookie in mijn browser, wordt er een andere sessie -> sessies aan de server kant
    $title = "Cookie";
    $value = 'Hello, World';

    // een cookie
    // een hash string... -> de gebruiker weet van niets
    setCookie(sha1('very-evil-cookie'), $value, time() + 3600);
     setCookie('very-nice-cookie', $value, time() - 3600); // met negatieve(tijd in de verleden) wordt die gewist.

    // cookie opvragen
    $evilCookie = (isset($_COOKIE[sha1('very-evil-cookie')]));

?>
<!DOCTYPE html>
<meta charset=""UTF-8">
<title><?= $title ?></title>
<h1> <?= $title ?></h1>
<?php if ($evilCookie): ?>
<?php endif ?>
<script>
    console.log("$_COOKIE", `<?php var_export($_COOKIE)?>`)
</script>
