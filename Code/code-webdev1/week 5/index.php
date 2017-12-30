<?php
    const NL = 'nl';                                     /* <?php ?> een regel geen puntcomma, als meerdere zet je op elke rij een comme*/
    const EN = 'en';                                    /* <?=_ ho _?> _daarbij moet er een spatie zijn -> alles <?php als het een php document is*/
    $title = "Complex form";                           /* tussen de operatoren zet je spaties*/
    $language = NL;
    // in een array zetten (multidimentionele array met array in een array)
    $title = [
        'Complex form' => [
            NL => 'Complex formulier',
            EN => 'Complex form',
        ],
    ];
    $animalClasses = [
        'Amphibians' => [
            NL => 'Amphibians',
            EN => 'Amfibieën',
        ],
        'Fish' => [
            NL => 'Vissen',
            EN => 'Fish',
        ],
        'Mammals' => [
            EN => 'Mammals',                      // classLabel
            NL => 'Zoogdieren',
        ],
    ];
$inputAnimalClass = 'input-animal-class';
?>
<!DOCTYPE html>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <h1> <?= $title ?></h1>

    <form action="" method="POST">
        <div>
            <label for="">Favoriete soorten</label>
            <ul>
                <?php foreach($animalClasses as $classKey => $classLabel ): ?>      <!--elke class gaan opsplitsen in een key en value-->
                    <li><input type="checkbox" name="<?= $inputAnimalClass?>[]" value="<?=$classKey?>"><?=$classLabel[$language] ?></li>
                <?php endforeach ?>
                <!--<li><input type="checkbox" name="klasse1" value="Amfibieën">Amfibieën </li>
                <li><input type="checkbox" name="klasse2" value="Reptielen">Reptielen</li>
                <li><input type="checkbox" name="klasse3" value="Zoogdieren">Zoogdieren </li>
                <li><input type="checkbox" name="klasse4" value="Vissen">Vissen </li>
                <li><input type="checkbox" name="klasse5" value="Vogels">Vogels </li>-->
            </ul>
        </div>
        <input type="submit" name"btn=submit">
    </form>
    <script>
    console.log("$_POST",`<?php var_export($_POST) ?>`)
    </script>
