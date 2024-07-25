<?php
    if (isset($_POST['Connexion'])) {
        echo $nomfam = htmlspecialchars($_POST['nomfam']);
        echo $mdp = htmlspecialchars($_POST['mdp']);
        $req = $conn->prepare("SELECT * FROM personne WHERE nomfam = '$nomfam' AND mdp = '$mdp'");
        $req->execute();
        $row = $req -> fetch();
        if ($row) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['idpar'] = $row['idpar'];
            header('Location:control?view=home');
            } else {
                $_SESSION['form_data'] = $_POST;
                header('location:control?view=');
                }

    }