<?php
    define('HOST', 'localhost'); // Domaine ou IP du serveur ou est située la base de données
    define('USER', 'root'); // Nom d'utilisateur autorisé à se connecter à la base
    define('PASS', ''); // Mot de passe de connexion à la base
    define('DB', 'exercice'); // Base de données sur laquelle on va faire les requêtes
    function connexion() {
        // Connexion à la base locale diw8
        try {
            $db = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USER, PASS);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
        return $db;
    }
     $bdd = connexion();
     
     $contact_email = false;
     $contact_tel = false;
    var_dump($_POST);
    if(isset($_POST['contact_email']) && $_POST['contact_email'] == 'on'){
        $contact_email = true;
    }
    if(isset($_POST['contact_tel']) && $_POST['contact_tel'] == 'on'){
        $contact_tel = true;
    }

    $req=$bdd->query('INSERT INTO utilisateur(prenom) VALUES("JO")');
    $prenom = $_POST['prenom'];
    var_dump($prenom);
    // $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);

    var_dump($req);
    
    $affected_rows = $req->rowCount();
    var_dump($affected_rows);


     $req->closeCursor();
