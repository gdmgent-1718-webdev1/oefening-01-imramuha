<?php

    $title="Bestand uploaden";
    $destination = "/file";

 const UPLOAD_DIRECTORY = 'uploads';
    $fileInputName = 'file';

    if (isset($_REQUEST['btn-submit'])){
        if (isset($_FILES[$fileInputName]) &&
            $_FILES[$fileInputName]['size]'] > 0)
        {
            $file = $_FILES[$fileInputName];
            $filename = $file['temp_name'];
            $destination = UPLOAD_DIRECTORY.DIRECTORY_SEPARATOR.$file['name'];
            if (!is_dir(UPLOAD_DIRECTORY)){             // check if the directory exists
                mkdir(UPLOAD_DIRECTORY);
            }
            move_uploaded_file($filename, $destination);
        }
    }
?>

<!DOCTYPE html> <!-- wel geldige HTML, maar volledge heeft ook nut, bv taal veranderen -->
<meta charset=""UTF-8>
<title><?= $title ?></title>
<h1><?= $title ?></h1>
<form action="" method="post" enctype="multipart/form-data"><!-- is nodig om een bestand te versturen--></form>
    <div>
        <label for="input-file"></label>                     <!-- waarom for en ID? ->als je click op de input dan wordt de input ook geselecteerd door browser-->
        <input id="input-file" type="file" name="file" accept="image/*,application/pdf">
    </div>
    <input type="submit" name=btn-submit" value="Bestand uploaden">
</form>

<script>
    console.log('$_FILES',`<?php var_export($_FILES) ?>`);                   // php houdt files in $_FILES
    console.log('$_POST',`<?= var_export($_POST) ?>`);
</script>
