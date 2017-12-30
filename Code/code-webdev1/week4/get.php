<?php


$isSubmitted = isset($_REQUEST['submit']);

if ($isSubmitted){
    $username = $_GET['username'];
    echo 'hii';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Formulier GET-methode></title>
</head>
<body>

    <div class="container">
        <?php if($isSubmitted): ?>
        <h1> <?php echo $_GET['username'] ?></h1>                                   shorthand 
        <?php else: ?>
        <?php echo $_GET["username"]; ?>
            <form action="" method="GET">
        
                <div class="form-group">
                    <label for=""> Wat is je naam? </label>
                    <input class="form-control" id="input-name" type="text" name="username">
                </div>
                <div class="form-group">
                    <button type="sumbit" class="btn btn-primary" name="sumbit" value="Verzenden">Verzenden</button>
                </div>
            </form>  
            <?php endif ?>
    </div>

    <?php 

    if (isset($_REQUEST['sumbit'])){                                // isset -> om tek ijken of er iets gepost it. Als het bestaat zal het uitgevoerd worden.
    
        

        var_dump($_GET);
      
        var_dump($_POST);
       
        var_dump($_REQUEST);
        die();
    }

?>
    
</body>
</html>