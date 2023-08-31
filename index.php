<?php

try {$dsn = "mysql:host=localhost;dbname=album_app_mvc;charset=utf8mb4;";
$username = "root";
$password = "root";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

$pdo = new \PDO($dsn, $username, $password, $options);

    // // Nous informer quand il y a une erreur
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // // Nous renvoyer toutes les données sous forme de tableau assoc
    // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    
    // requête à envoyer
    $sql = "SELECT * FROM `users`";
    // lancer la requête
    /**
     * PDO::FETCH_*
     * PDO::FETCH_ASSOC: renvoi les résultats de recherche sous forme de tableau associatif avec les noms de colonne(champ) comme clé
     */
    // foreach($pdo->query($sql) as $user) {
    //     echo "<pre>";
    //     print_r($user);
    // };

    $uname = "johndoe";
    $upassword = "123";

    // marqueur
    
    $sql2 = "INSERT INTO `users`(`user_name`, `user_password`) VALUES (?,?);";
    // préparer la requête pour assurer la sécurité
    $stmt = $pdo->prepare($sql2);
    // Exécution de la requête préparée
    $userAdded = $stmt->execute([$uname, $upassword]);

    if ($userAdded) {
        echo "Utilisateur ajouté";
    } else {
        echo "Echec d'ajout";
    }

} catch (\PDOException $e) {
    exit("Erreur de connexion: " . $e->getMessage());
}