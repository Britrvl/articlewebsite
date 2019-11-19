<?php

session_start();

if(!isset($_SESSION['user'])){
    header('Location: login.php');
    die();
}
unset($_SESSION['user']);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deconnexion</title>
</head>
<body>
    <?php
   include 'menu.php'

    ?>
<p>Vous avez bien été déconnecté !</p>

</body>
</html>