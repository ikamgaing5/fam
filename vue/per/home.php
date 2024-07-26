<?php
    $nbr = $_SESSION['id'];
    $nbrepar = $_SESSION['idpar'];

    //récupération du nom de la famille

    $requete = $conn -> query("SELECT * FROM personne WHERE id = '$nbr'");
    $row = $requete -> fetch();


    //récupération du nombre de membre dans la famille et des membres de la famille

    $req = $conn->prepare("SELECT * FROM personne WHERE idpar = ? ORDER BY datenaiss ASC");
    $req -> execute([$nbr]);
    $rows = $req -> fetchAll();

    $dead = $conn ->query("SELECT * FROM personne WHERE idpar = '$nbr' AND etat = true ");
    $nbre = $dead -> rowCount();

    // inclusion de la barre de navigation
    include_once '../layout/navbar.php';
?>
<h1 class="mx-3 my-2">Bienvenue chez les <?=$row['nomfam']?>
    <?php if ($nbre > 0) { ?>
        <div class="mx-1 py-2 badge text-bg-primary" style="font-size: 15px;">Vous avez <?=$nbre+1?> personnes dans votre famille</div>
    <?php }?>
</h1>
<div class="container">
    <div class="row">
        
        <div class="col">
            <div class="d-block">
                <div class="col-xl-12" style="margin-top:13px;">

                    <!-- Affichage modification reussie -->
                    <?php if(isset($_SESSION['modifok'])){ ?> 
                        <div class="alert alert-success mx-4" role="alert" style="font-size: 20px;"><i class="bi bi-check2-circle"></i>  Modifcation reussi</div>
                    <?php } ?>

                    <!-- Affichage erreur suppresion -->
                    <?php if(isset($_SESSION['errsup']) && $_SESSION['errsup'] == true){ ?> 
                        <div class="alert alert-danger mx-4" role="alert" style="font-size: 20px;"><i class="bi bi-exclamation-triangle-fill"></i> Ce membre a déjà une famille, suppression impossible.</div>
                    <?php } ?>

                    <!-- Affichage suppression reussie -->
                    <?php if(isset($_SESSION['errsup']) && $_SESSION['errsup'] == false){ ?> 
                        <div class="alert alert-success mx-4" role="alert" style="font-size: 20px;"><i class="bi bi-exclamation-triangle-fill"></i> Suppression reussie.</div>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 px-4  my-4">
<div class="shadow-lg card">
    <div class="card-header py-3 border-0 px-3">
        <h2 class="heading m-0 mr-5 ">La liste des membres de la famille 
            <?php include_once '../vue/per/new.php' ?> <a class="btn btn-outline-primary" href="control.php?view=arbre&id=<?=$nbr?>">Voir l'arbre</a> 
        </h2>


    <div class="table-responsive">
    <table class="table " style="padding-left:4px">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Sexe</th>
            <th scope="col">Date Naissance</th>
            <th scope="col">Lieu Naissance</th>
            <th scope="col">Numéro</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <tr>
        <?php 
                if ($row['sexe'] == 'F') {
                    $sexe = 'Feminin';
                }else {
                    $sexe = 'Masculin';
                }
            ?>
        <!-- affichage des informations du parents  -->
        <td scope="row"><?=$row['nom']?></td>
        <td scope="row"><?=$row['prenom']?></td>
        <td scope="row"><?=$sexe?></td>
        <td scope="row"><?=$row['datenaiss']?></td>
        <td scope="row"><?=$row['lieunaiss']?></td>
        <td scope="row"><?=$row['numtel'] ?></td>
        <td scope="row">
          
        </td>
    </tr>
    <!-- affichage des informations des enfants -->
    <?php if ($nbre > 0) { ?>
    <?php foreach($rows as $key){ 
        if ($key['sexe'] == 'F') {
            $sexe = 'Feminin';
        }else {
            $sexe = 'Masculin';
        }
    ?>
    <tr>
        <td scope="row"><?=$key['nom']?></td>
        <td scope="row"><?=$key['prenom']?></td>
        <td scope="row"><?=$sexe?></td>
        <td scope="row"><?=$key['datenaiss']?></td>
        <td scope="row"><?=$key['lieunaiss']?></td>
        <td scope="row"><?=$key['numtel'] ?></td>
        <td scope="row">
            <?php if ($key['etat'] == true) {
                if (isset($_SESSION['succestest'])) { ?>
                    <a class="btn btn-outline-primary" href="control.php?view=modif&modif=<?=$key['id']?>">
                        <i class="bi bi-pen"></i>
                    </a> 
                    <a class="btn btn-outline-danger"href="control.php?view=supp&supp=<?=$key['id']?>">
                        <i class="bi bi-trash"></i>
                    </a>
                <?php }else { 
                     include '../vue/per/lock.php' ;
                     } 
                }else {
                    echo '<div class=" px-4 badge text-bg-danger" style="font-size: 15px;">Mort</div>';
                }  
                 ?>
        </td>
    </tr>


<?php 
}
}
    else { echo "<tr><td colspan='7'>Aucun enfant.</td></tr>"; }
    echo "</table>";
    unset($_SESSION['failedtestlock']); 
    unset($_SESSION['modifok']);
    unset($_SESSION['errsup']);
    
    
?>
</div>
</div>
</div>