<?php

$title = "Sessions yeeeee";
// sessie wordt pas gemaakt wanneer je de volgende function uitvoert
session_start(); // elke keer andere waarde/id wanneer je website bezoekt


$_SESSION += $_POST[]; // alle variebele blijven in de sessie totdat die gedestroyed wordt.
// to stop session
if (isset($_GET['logout'])){
    session_destroy(); // waarden staan er nog in.. vb id
    $_SESSION = []; // dit gebruik je als je je session leeg wilt maken.
}
?>
<!DOCTYPE html>
<meta charset=""UTF-8">
<title><?= $title ?></title>
    <form action="" method="post">
        <input type="hidden" value=""hallo, wordl">
        <input type=submit" name="btn-submit-hidden"
    </form>
    <form action="" method="get">
        <input type="hidden" value=""hallo, wordl">
        <input type=submit" name="destroy'>
    </form>


<script>
    // worden bewaard in een session variabele
    console.log("$_SESSION", `<?php var_export($_COOKIE)?>`)
</script>