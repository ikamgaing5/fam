<?php
    $membre = $_POST['person'];
    $code = htmlspecialchars($_POST['code']);

    // verification pour savoir si le code entré correspond à la personne choisit.
    $req = $conn -> prepare("SELECT * FROM personne WHERE id = $membre AND code = '$code'");
    $req -> execute();
    $row = $req -> fetch();
    $nb = $req -> rowCount();
    function veriftrue() {
        if (!empty($_POST['nom']) && !empty($_POST['codefam'])) {
            return 1;  
        }
    }

    if ($nb > 0) {
        // si le code correspond alors le code est exécuté.
        if (veriftrue() == 1) {
            $_SESSION['num'] = htmlspecialchars($_POST['num']);
            $_SESSION['cpt'] = 0;
            $_SESSION['ids'] = $membre;
            $nom = htmlspecialchars($_POST['nom']);
            $codefam = htmlspecialchars($_POST['codefam']);
            $req = $conn -> prepare("UPDATE personne SET nomfam = '$nom' , mdp = '$codefam' WHERE id = $membre");
            $req -> execute();
            $req = $conn -> query("SELECT * FROM personne WHERE id = '$membre'");
            $row = $req -> fetch();
            $_SESSION['id'] = $row['idpar'];
            $_SESSION['idpar'] = 1;
            header('location:control.php?view=home');
        }else {
        $_SESSION['temoin'] = 1;
        $_SESSION['data'] = $_POST;
        header('location:control.php?view=add');
        }
    }else {
        $_SESSION['verif'] = 1;
        header('location:control.php?view=add');
    }