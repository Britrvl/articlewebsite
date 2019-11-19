<?php
session_start();


if(!isset($_SESSION['user'])){
    header('Location: login.php');
    die();
}

$varExercice = 'Vos identifiants sont:';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>User's infos</title>
</head>
<body>
<?php
    include 'menu.php';
?><h1><?php echo $varExercice; ?></h1>
    <br><p>Email : <?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['email'];   } ?></p>
    <p>Username : <?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['username'];   } ?></p>
    <p>Status : <?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['status'];   } ?></p>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
