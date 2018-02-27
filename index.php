<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Blog php</title>
  </head>
  <body>
    <main class="container">
      <h1>Formulaire d'état civil</h1>


    <?php





     ?>
     <div>
        <form action="index.php" method="POST">
            <label for="">Nom :</label>
            <input type="text" name="nom">
            <label for="">Prénom</label>
            <input type="text" name="prenom">
            <label for="">Email</label>
            <input type="text" name="email">
            <select id="monselect" name="genre">
                <option value="non renseigné" selected>nom renseigné</option> 
                <option value="masculin">masculin</option>
                <option value="féminin">féminin</option>
            </select>
            <label for="">date</label>
            <input type="text" name="date">
            <label for="">Telephone</label>
            <input type="text" name="telephone">
            <label for="">Contact pas email</label>
            <input id="contact_email" name="contact_email" type="checkbox">
            <label for="">contact par telephone</label>
            <input id="contact_tel" name="contact_tel" type="checkbox">
            <input type="submit">
        </form>
     </div>
    <?php
     require('database.php');
     $db = connexion();
     


    if(!empty($_POST)){

        $contact_email = false;
        $contact_tel = false;
       
       if(isset($_POST['contact_email']) && $_POST['contact_email'] == 'on'){
           $contact_email = true;
       }
       if(isset($_POST['contact_tel']) && $_POST['contact_tel'] == 'on'){
           $contact_tel = true;
       }


        
        $req=$db->prepare("INSERT INTO utilisateur(prenom, nom, email, genre, telephone, contact_email, contact_tel, date_naissance) 
        VALUES (:prenom, :nom, :email, :genre, :telephone, :contact_email, :contact_tel, :date_naissance)");
    
        $req->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $req->bindValue(':nom' , $_POST['nom'], PDO::PARAM_STR);    
        $req->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $req->bindValue(':genre' , $_POST['genre'], PDO::PARAM_STR);
        $req->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_STR);
        $req->bindValue(':contact_email', $contact_email, PDO::PARAM_BOOL);
        $req->bindValue(':contact_tel', $contact_tel, PDO::PARAM_BOOL);
        $req->bindValue(':date_naissance', $_POST['date'], PDO::PARAM_STR);
        var_dump($req);
        $req->execute();
        //var_dump($req->errorInfo());
        $affected_rows = $req->rowCount();
        var_dump($affected_rows);
     }
    
    
 

    ?>

     </main>
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
 </html>