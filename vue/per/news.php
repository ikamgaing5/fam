<?php 
    include_once '../layout/navbar.php';
    $req = $conn->prepare("SELECT * FROM personne p WHERE etat = 1 AND p.id NOT IN (SELECT DISTINCT idpar FROM personne WHERE idpar IS NOT NULL)");
    $req -> execute();
    $row = $req->fetchAll();
?>
   <center>
    <div class="col-xl-4 mx-2 my-5">
        <div class="shadow-lg card">
            <div class="card-header bg-primary py-3 border-0 px-3">
                <div class="text-light" style="font-size: 20px; font-weight: bold;"> Nouvelle famille</div>
            </div>
            <div class="card-body p-0 py-3 border-0 px-3">
                <?php if(isset($_SESSION['verif']) && $_SESSION['verif'] == 1 ) { ?>
                        <div class="alert alert-danger " role="alert" style="font-size: 15px;"><i class="bi bi-exclamation-triangle-fill"></i> Mot de passe incorrect.</div>
                <?php } ?>
                <form method="POST" action="control.php?view=verif">
                    <div class="mb-3">
                        <?php
                            if(isset($_SESSION['temoin'])) {
                                $idverif = $_SESSION['data']['person'];
                                $req = $conn -> prepare("SELECT * FROM personne WHERE id = '$idverif'");
                                $req -> execute();
                                $raws = $req -> fetch();
                        ?>
                        <select required name="person" class=" py-2" style="cursor:pointer; width:100%;">
                            <option selected value="<?=$raws['id']?>"><?=$raws['nom'].' '.$raws['prenom']?></option>
                        </select>
                        <?php }else {?>  
                        <select required name="person" class=" py-2" style="cursor:pointer; width:100%;">
                            <?php 
                                foreach ($row as $key) {
                                    $nom = $key['nom'].' '.$key['prenom'];
                            ?>
                            <option value="<?=$key['id']?>"><?=$nom?></option>
                            <?php } }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" required name="num" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre de membres à ajouter." <?php if(isset($_SESSION['temoin'])){ ?> value="<?=$_SESSION['data']['num']?>" <?php } ?>>
                    </div>
                    <div class="mb-3">
                        <input type="password" required name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer votre mot de passe." <?php if(isset($_SESSION['temoin'])){ ?> value="<?=$_SESSION['data']['code']?>" <?php } ?>>
                    </div>
                    <?php if(isset($_SESSION['temoin'])) {?>
                    <div class="mb-3">
                        <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer le nom de votre famille.">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="codefam" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer le code de votre famille.">
                    </div>
                    <?php } ?>
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
   <?php unset($_SESSION['verif']); unset($_SESSION['temoin']); ?>