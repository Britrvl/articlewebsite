<?php

if(
    isset($_POST['email']) &&
    isset($_POST['password'])
){
        // filters
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'email est mauvais !';
    }
            // more protections :: (?=.*[0-9])(?=.*[A-Z])
    if(!preg_match('/^(?=.*[a-z]).{8,1000}$/', $_POST['password'])){
        $errors[] = 'password est mauvais !';
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

        // Création du nouvel utilisateur (requête préparée car on a des variables dans la requête)
        $response = $bdd->prepare('INSERT INTO users(username, email, password, status) VALUES(?,?,?,?)');

        $response->execute([
            // random default name
            'foobar',
            mb_strtolower($_POST['email']),
            // the password hasheeeed
            password_hash($_POST['password'], PASSWORD_BCRYPT),
            // by default : user = 'u'
            'u',
        ]);

        // Vérification BDD
        if($response->rowCount() == 1){
            $success = 'votre nom d\'utilisateur fut crée avec succès !';
        } else {
            $errors[] = 'Problème interne, veuillez ré-essayer plus tard';
        }

        // Fermeture de la requête
        $response->closeCursor();

    }

}

    // titre php généré
    $varExercice = 'Veuillez créer votre compte';

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
<!-- Add 2 divs -->
        <h1><?php echo $varExercice; ?></h1>
                <?php
                include 'menu.php';
               // en cas de gros succès
                if(isset($success)){
                    echo '<p>' . $success . '</p>';
                } else {
                    ?>
                        <!-- be carefull the name ! -->
                        <form action="create_user.php" method="POST">
                        <input type="email" name="email" placeholder="email"><br><br>
                        <input type="password" name="password" placeholder="password"><br><br>
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