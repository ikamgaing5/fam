<?php   
   if (isset($_POST['Envoyez'])) {
        $id = 1;
        $idpar = 0;
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $date = htmlspecialchars($_POST['datenaiss']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $nomfam = htmlspecialchars($_POST['nomfam']);
        $lieu = htmlspecialchars($_POST['lieu']);
        $sexe = htmlspecialchars($_POST['sexe']);
        $num = htmlspecialchars($_POST['tel']);
        $code = htmlspecialchars($_POST['code']);
        $etat = $_POST['etat'];
        $_SESSION['id'] = $id;
        $_SESSION['idpar'] = $id;
        $req = $conn -> prepare("INSERT INTO personne(`id`,`nom`, `prenom`,`nomfam`, `mdp`, `code`, `sexe`, `datenaiss`, `lieunaiss`, `numtel`, `idpar`, `etat`) VALUES ('$id', '$nom', '$prenom', '$nomfam', '$mdp', '$code', '$sexe', '$date', '$lieu', '$num', '$idpar', '$etat')");
        $req -> execute();
        header('Location: control.php?view=home');
   }
?>


<center>
    <div class="col-xl-4 mx-2 my-5">
        <div class="shadow-lg card">
            <div class="card-header bg-primary py-3 border-0 px-3">
                <div class="text-light" style="font-size: 20px; font-weight: bold;">Créer votre famille.</div>
            </div>
            <div class="card-body p-0 py-3 border-0 px-3">
                <form method="POST" action="#">
                <div class="mb-3">
                        <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer votre nom.">
                        <input type="hidden" name="etat" class="form-control" value="1">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer votre prenom.">
                    </div>

                    <div class="mb-3">
                        <input type="text" placeholder="Entrez le nom de votre famille." name="nomfam" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <input type="password" placeholder="Entrez le code de votre famille." name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <input type="password" name="mdp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer votre mot de passe.">
                    </div>

                    <div class="mb-3">
                        <input type="date" name="datenaiss" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="lieu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer votre lieu de naissance.">
                    </div>
                   
                    <div class="mb-3">
                        <select class="form-control" name="sexe" style="cursor: pointer;" name="sexe" id="">
                            <option value="err">Choisir votre sexe.</option>
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre numéro de téléphone.">
                    </div>
                   
            </div>
            <div class="card-footer py-3 border-0 px-3 p-0">
                <div class="card-footer bg-transparent border-primary">
                    <button type="submit" name="Envoyez" class="btn btn-outline-primary px-5 py-2">Enregistrer</button>
                </div>
            </div>
            </form>
        </div>
    </div>

   </center>
