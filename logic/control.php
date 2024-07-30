<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/bootstrapFont.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<title>FamApp</title>
<?php 
    session_start();
    include_once 'connexion.php';
    ####### TOUTES CES FICHERS N'ONT PAS BESOIN QUE L'UTILISATEUR SE CONNECTE POUR ÊTRE EXECUTE #########
    if ($_GET ['view']== null) {
        // page de connexion
        include_once '../index.php';
    }elseif ($_GET['view'] == 'test') {
        // fichier de controle du formulaire de connexion
        include 'test.php';
    }elseif ($_GET['view'] == 'add') {
        // page de création d'une famille
        include_once '../vue/per/news.php';
    }elseif ($_GET['view'] == "one") {
        // page d'ajout d'un membre
        include '../vue/per/fam.php';
    }elseif ($_GET['view'] == 'verif') {
        // page de controle du formulaire d'authentifiacation de la page de création d'un membre
        include 'verif.php';
    }
    ###################################################################################################

        ####### TOUTES CES FICHERS ONT BESOIN QUE L'UTILISATEUR SE CONNECTE POUR ÊTRE EXECUTE #########
    elseif (!isset($_SESSION['id'])) {
        // renvoie à la page de connexion si l'utilisateur n'est pas connecté
        header('Location:control.php?view=');
    }elseif ($_GET['view'] == 'home') {
        // page d'accueil des membres après authentification
        include_once '../vue/per/home.php';
    }elseif ($_GET['view'] == 'addmem') {
        // page d'ajout d'un membre à une famille
        include_once '../vue/per/addmem.php';
    }elseif ($_GET['view'] == 'admem') {
        // fichier de controle du formulaire d'ajout d'un membre
        include_once 'addmem.php';
    }elseif ($_GET['view'] == 'deconnect') {
        // deconnexion de l'utilisateur
        session_unset();
        header('location:control.php?view=');
    }elseif ($_GET['view'] == 'identify') {
        // fichier de controle du formulaire d'authentification pour l'ajout d'un membre dans une famille
        include_once 'identify.php';
    }elseif ($_GET['view'] == 'lock'){
        // fichier de controle du formulaire d'authentification pour la manipulation d'une famille
        include_once '../vue/per/lock.php';
    }elseif (($_GET['view'] == 'modif') &&  isset($_GET['modif'])) {
        // page de modification d'un membre dans une famille
        $id = $_GET['modif'];
        include_once '../vue/per/modif.php';
    }elseif ($_GET['view'] == 'modifinfo') {
        // fichier de controle du formulaire de modification d'un membre dans une famille
        include_once 'modifinfo.php';
    }elseif ($_GET['view'] == 'arbre' && isset($_GET['id'])) {
        // page de l'arbre d'un membre dans une famille
        include_once '../vue/per/arbre.php';
    }elseif ($_GET['view'] == 'supp' && isset($_GET['supp'])) {
        // page de suppression d'un membre dans une famille
        $id = $_GET['supp'];
        $req = $conn -> prepare("SELECT * FROM personne WHERE idpar = '$id'");
        $req -> execute();
        $row = $req -> fetch();
        if($row > 0){
            $_SESSION['errsup'] = true;
            header('location:control.php?view=home');
        }else {
            $req = $conn -> prepare ("DELETE FROM personne WHERE id = $id");
            $req -> execute();
            $_SESSION['errsup'] = false;
            header('location:control.php?view=home');
        }
    }