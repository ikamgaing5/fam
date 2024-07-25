<?php
    $req = $conn -> prepare("SELECT * FROM personne WHERE id = $id");
    $req -> execute();
    $row = $req -> fetch();
    if ($row['sexe'] == 'M') {
        $sexe = 'Masculin';
    }else {
        $sexe = 'Feminin';
    }
?>

<center>
<div class="col-xl-4 mx-2 my-5">
    <div class="shadow-lg card">
        <div class="card-header bg-primary py-3 border-0 px-3">
            <div class="text-light" style="font-size: 20px; font-weight: bold;  "> Modification des informations</div>
        </div>
        <div class="card-body p-0 py-3 border-0 px-3">
            <form method="POST" action="control.php?view=modifinfo">
                <div class="mb-3">
                    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['nom']?>" placeholder="Le nom" required>
                </div>
                
                <div class="mb-3">
                    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Le prenom" value="<?=$row['prenom']?>" required>
                </div>

                <div class="mb-3">
                    <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['datenaiss']?>" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="lieu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Le lieu de naissance" value="<?=$row['lieunaiss']?>" required>
                </div>

                <div class="mb-3">
                    <select style="width: 100%;" class="py-2" name="sexe" id="" required>
                        <option value="err"><?=$sexe?></option>
                        <option value="F">Feminin</option>
                        <option value="M">Masculin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <select style="width: 100%;" class="py-2" name="etat" id="" required>
                        <option selected value="1">En vie</option>
                        <option value="0">Mort</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="text" name="num" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Le numero de téléphone" value="<?=$row['numtel']?>" required>
                </div>

                <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?=$row['id']?>" required>
                </div>

        </div>
            <div class="card-footer py-3 border-0 px-3 p-0">
                <div class="card-footer bg-transparent border-primary">
                    <button type="submit" name="Envoyez" class="btn btn-outline-primary px-5 py-2">Modifier</button>
                </div>
            </div>
            </form>
    </div>
</div>

</center>
   <?php unset($_SESSION['temoinpass']); unset($_SESSION['mailrecup']); unset($_SESSION['errmail']); unset($_SESSION['mdpchange']); ?>