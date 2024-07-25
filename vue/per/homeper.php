<?php
    if (!isset($_SESSION['id'])) {
        header('Location:../logic/control.php?view=');
    }
$nbr = $_SESSION['id'];
$nbrepar = $_SESSION['idpar'];
//récupération du nombre de membre dans la famille
$requete = $conn -> prepare("SELECT * FROM personne WHERE id = ? ");
$requete -> execute([$nbrepar]);
$row = $requete -> fetch();
$nom = $row['nom'].' '.$row['prenom'];

//récupération du nom de la famille

$req = $conn->prepare("SELECT * FROM personne WHERE idpar = ?");
$req -> execute([$nbr]);
$rows = $req -> fetchAll();
$nbre = $req -> rowCount();

// Affichage des donnees dans un tableau 
?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-block">
                <div class="col-xl-12 mr-5" style="margin-top:13px;">
                    <h1>Bienvenue <?=$nom?></h1>
                        <?php if ($nbre > 0) { ?>
                            <div class="mx-3 py-2 badge text-bg-primary">Vous êtes <?=$nbre?> personnes dans votre famille</div>
                        <?php }?>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 px-4  my-4">
<div class="shadow-lg card">
    <div class="card-header py-3 border-0 px-3">
        <h2 class="heading m-0 mr-5 ">La liste des membres de la famille 
            <a class=" btn btn-primary my-2 mx-5" href="control.php?view=addmem">            
            Ajouter un membre
            </a>
        </h2>
<?php if ($nbre > 0) { ?>

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
    <?php foreach($rows as $row){ 
        if ($row['sexe'] == 'F') {
            $sexe = 'Feminin';
        }else {
            $sexe = 'Masculin';
        }
    ?>
    <tr>
        <td scope="row"><?=$row['nom']?></td>
        <td scope="row"><?=$row['prenom']?></td>
        <td scope="row"><?=$sexe?></td>
        <td scope="row"><?=$row['datenaiss']?></td>
        <td scope="row"><?=$row['lieunaiss']?></td>
        <td scope="row"><?=$row['numtel'] ?></td>
        <td scope="row">
        <a class="btn btn-outline-primary" href="control.php?view=supp&modifetu=<?=$row['id']?>">
            <i class="bi bi-pen"></i>
        </a> 
        <a class="btn btn-outline-danger"href="control.php?view=supp&suppetu=<?=$row['id']?>">
            <i class="bi bi-trash"></i>
        </a>
        </td>
    </tr>
<?php } }
    else { echo "<tr><td colspan='3'>Aucun résultat trouvé</td></tr>"; }
    echo "</table>";
?>
</div>
</div>
</div>