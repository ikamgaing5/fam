<?php 
    include_once '../layout/navbar.php';
    if (isset($_SESSION['cpt'])) {
       $_SESSION['cpt'] += 1;
    }
?>


<center>
    <div class="col-xl-4 mx-2 my-5">
        <div class="shadow-lg card">
            <div class="card-header bg-primary py-3 border-0 px-3">
                <div class="text-light" style="font-size: 20px; font-weight: bold;"> Nouveau membre</div>
            </div>
            <div class="card-body p-0 py-3 border-0 px-3">
                <form method="POST" action="control.php?view=admem">
                <div class="mb-3">
                        <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer le nom.">
                        <input type="hidden" name="etat" class="form-control" value="1">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer le prenom.">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer le code.">
                    </div>

                    <div class="mb-3">
                        <input type="date" name="datenaiss" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="lieu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer le lieu de naissance.">
                    </div>
                   
                    <div class="mb-3">
                        <?php if(isset($_SESSION['errSex'])){ echo'
                            <div class="alert alert-danger mx-4" role="alert" style="font-size: 20px;"><i class="bi bi-exclamation-triangle-fill"></i> Choisissez un sexe.</div>';
                        } ?>
                        <select class="form-control" name="sexe" style="cursor: pointer;" name="sexe" id="">
                            <option value="err">Choisir votre sexe</option>
                            <option value="M" style="cursor: pointer;">Masculin</option>
                            <option value="F">Feminin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre numéro de téléphone.">
                    </div>
                   
            </div>
            <div class="card-footer py-3 border-0 px-3 p-0">
                <a href="control.php?view=" style="text-decoration:none; font-size:13px;">Revenir à la page d'accueuil</a>
                <div class="card-footer bg-transparent border-primary">
                    <button type="submit" name="Envoyez" class="btn btn-outline-primary px-5 py-2">Choisir</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</center>

<?php unset($_SESSION['errSex']);?>
