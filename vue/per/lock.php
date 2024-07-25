<?php 

    if (isset($_POST['Envoyez'])) {
        $id = $_SESSION['id'];
        $nom = htmlspecialchars($_POST['nom']);
        $code = htmlspecialchars($_POST['code']);
        $req = $conn -> prepare("SELECT * FROM personne WHERE nom = ? AND code = ? AND id = ?");
        $req -> execute([$nom , $code, $id]);
        $row = $req -> fetch();
        if ($row > 0) {
            $_SESSION['succestest'] = 1;
        }else {
            $_SESSION['failedtestlock'] = 1;
            //$_SESSION['failedtestlock']['info'] = $_POST;
        }
    }
    if(isset($_SESSION['failedtestlock'])){
        $color1 = 'danger';
        //$value = $_SESSION['failedtestlock']['info']['nom'];
        }else {
        $color1 = 'primary';
    }


?>
<!-- Modal -->

<a class="btn btn-outline-<?=$color1?>" href="#staticBackdrop1" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"><i class="bi bi-pen"></i></a> 
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmez votre identité</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php  //if ($_GET['view'] == 'home#staticBackdrop1') { ?>
        <form action="" method="post">
        <?php if(isset($_SESSION['failedtestlock'])){ ?> 
          <h1 class="fs-6 text-danger">Nom ou code incorrect</h1>
        <?php } ?>
        <div class="mb-3">
            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer nom." value="<?php if(isset($value)){ echo $value; }?>">
          </div>

          <div class="mb-3">
            <input type="password" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Veuillez entrer code.">
          </div>
          <h6 class="text-danger">Seul le créateur de la famille peut modifier les informations d'un membre.</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermez</button>
        <button type="submit" name="Envoyez" class="btn btn-outline-primary">Verifier</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php  // }
 unset($_SESSION['failedtestlock']); ?>


