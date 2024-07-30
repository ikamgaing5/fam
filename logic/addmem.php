<?php   
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date = htmlspecialchars($_POST['datenaiss']);
    $lieu = htmlspecialchars($_POST['lieu']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $num = htmlspecialchars($_POST['tel']);
    $code = htmlspecialchars($_POST['code']);
    $etat = $_POST['etat'];

    if ($sexe = 'err') {
        $_SESSION['errSex'] = 1;
        $_SESSION['infoErr'] = $_POST;
        header('location:control.php?view=addmem');
    }else {
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
        }elseif (isset($_SESSION['ids'])) {
            $id = $_SESSION['ids'];
        }

        $req = $conn -> prepare("INSERT INTO personne(`nom`, `prenom`, `code`, `sexe`, `datenaiss`, `lieunaiss`, `numtel`, `idpar`, `etat`) VALUES ('$nom', '$prenom', '$code', '$sexe', '$date', '$lieu', '$num', '$id', '$etat')");
        $req -> execute();
        if (isset($_SESSION['cpt'])) {
            if ($_SESSION['cpt'] <= $_SESSION['num']-1) {
                header('location:control.php?view=addmem');
            }
                unset($_SESSION['cpt']);
                unset($_SESSION['num']);
                header('location:control.php?view=home');
        }else {
            header('location:control.php?view=home');
        }
    }


