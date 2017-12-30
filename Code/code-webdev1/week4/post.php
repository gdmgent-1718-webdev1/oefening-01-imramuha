<?php


$isSubmitted = isset($_REQUEST['submit']);

if ($isSubmitted){
    $username = isset($_POST['username']) && !empty($_POST['username'])?
    $_POST['username']:
         'Anoniempje';
       

    $isValidUsername = (bool) filter_input(INPUT_POST, 'username', FILTER_VALIDATE_REGEXP, [
        'options' => [
            'regexp'=> '/^[a-zA-Z]+$/'
        ]
    ]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Formulier POST-methode></title>
</head>
<body>
    <div class="container">
        <?php if($isSubmitted && $isValidUsername): ?>
        <h1>Hallo, <?=$username ?></h1>                                   
        <?php else: ?>
            <form action="" method="POST">        
                <div class="form-group">
                    <label for=""> Wat is je gebruikersnaam? </label>
                    <input class="form-control" <?=isset($isValidUsername) ? ($isValidUsername ? ' is-valid' : ' is-invalid') : '' ?> id="input-name" type="text" name="username">
                    <div class="invalid-feedback">
                        Geef een geldige gebruikersnaam.
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary" type="sumbit" name="sumbit" value="Verzenden">Verzenden</button>
                </div>
            </form>  
        <?php endif ?>
    </div>

    <?php 

    if (isset($_REQUEST['sumbit'])){                                // isset -> om tek ijken of er iets gepost it. Als het bestaat zal het uitgevoerd worden.
    
        
        echo "GET";
        var_dump($_GET);
        
        echo "POST";
        var_dump($_POST);
        
        echo "REQUEST";
        var_dump($_REQUEST);
        die();
    }

?>
    
</body>
</html>