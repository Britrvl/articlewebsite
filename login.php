<?php
session_start();

if(
    isset($_POST['email']) &&
    isset($_POST['password'])
){
        // filters
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'email est mauvais, ou aucun !';
    }
        // mets un password stp
    if(empty($_POST['password'])){
        $errors[] = 'pas de password';
    }

        // !error = next
    if(!isset($errors)){
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=vroom;charset=utf8', 'root', '');
            // ne mets pas ça sur le site fini
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e){
            die('Erreur bdd : ' . $e->getMessage());
        }

        // vérifie tout ce qui correspond à l'utilisateur qui possède ce mail (ou pas)
        $response = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $response->execute([
            mb_strtolower($_POST['email']),
        ]);

        // on fetche tout ça dans le tableau associatif
        $user = $response->fetch(PDO::FETCH_ASSOC);

        // si le mail est NULL (inexistant) : ERROR !
        if(!isset($user['email'])){
            $errors[] = 'email inexistant ou faux !';
        } else {

            // sinon si le password very est pas bon
            $hash = $user['password'];
            if(!password_verify($_POST['password'], $hash)){
                $errors[] = 'la vérification du password est mauvaise !';
            } else {
                // SUCCESS mon ami
                
                $_SESSION['user'] = $user;

                $success_connexion = 'vous êtes enfin connectés !';
            }

        }

        // Fermeture de la requête
        $response->closeCursor();

    }

}

    // titre php généré
    $varExercice = 'Site vroom login';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title><?php echo $varExercice; ?></title>
</head>
<body>
    <?php
      include 'menu.php';
      ?>
    <h1><?php echo $varExercice; ?></h1>
                <?php
              
               // en cas de gros succès
                if(isset($success_connexion)){
                    echo '<p>' . $success_connexion . '</p>';
                } else {
                    ?>
                        <!-- be carefull the name ! -->
                        <form action="login.php" method="POST">
                        <input type="email" name="email" placeholder="email">
                        <input type="password" name="password" placeholder="password">
                        <input type="submit">

                    </form>

                    <?php

                    // Si $errors existe, on le parcours et on affiche tous ce qu'il contient
                    if(isset($errors)){
                        foreach($errors as $error){
                            echo '<p>' . $error . '</p>';
                        }
                    }

                }

                ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>