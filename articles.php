<?php
//Connexion à la bdd
try{
    $bdd = new PDO('mysql:host=localhost;dbname=vroom;charset=utf8', 'root', '');

    //Affichage erreurs SQL, penser à enlever en prod!
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    die($e->getMessage());
}
//var_dump($_GET);
//if(isset($_GET['title'])){
    //query dans ce cas (prepare pour recherche)
    $response = $bdd->query('SELECT * FROM articles ORDER BY publish_date;');

    //$response->bindValue('title', $_GET['title']);

   // $response->execute();

//} else {
   // $response = $bdd->query('SELECT * FROM articles');
//}
// Récupération de tous les articles sous forme de tableaux associatifs
$articles = $response->fetchAll(PDO::FETCH_ASSOC);


// Fermeture de la requête
$response->closeCursor();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body style="background-color: #e0e0eb">
<a id="haut"></a>
<?php
    include 'menu.php';
// Si $articles est vide, alors il n'y a en pas en BDD donc erreur, sinon on les affiche
if(empty($articles)){
    echo '<p style="color:red;">Désolé il n\'y a pas d\'articles à afficher pour le moment</p>';
} else {

    echo '<ul style="width: 50%; text-align: center; margin-left: 25%">';
    // Affichage les deux dernier articles dans un foreach avec des HTMLSPECIALCHARS pour éviter d'éventuelles failles XSS

    foreach($articles as $article){
        echo '<li style="border: 1px solid black; list-style-type: none">' . htmlspecialchars($article['content']). '</li><hr>';
    }
    echo '</ul>';

}

?>

<div>

<a href="#haut" style="position: absolute; right: 0; border: 1px solid black">haut de page</a>
</div>

</body>
</html>