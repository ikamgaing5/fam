<?php
    $prenom = htmlspecialchars($_POST['prenom']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $lieu = htmlspecialchars($_POST['lieu']);
    $nom = htmlspecialchars($_POST['nom']);
    $num = htmlspecialchars($_POST['num']);
    $date = htmlspecialchars($_POST['date']);
    $etat = $_POST['etat'];
    $id = $_POST['id'];

    $req = $conn -> prepare("UPDATE personne SET nom = '$nom', prenom = '$prenom', datenaiss = '$date', lieunaiss = '$lieu' , sexe = '$sexe' , numtel = '$num', etat = '$etat' WHERE id = '$id'");
    $req -> execute();
    $_SESSION['modifok'] = 1;
    header('location:control.php?view=home');