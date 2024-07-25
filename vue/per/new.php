<?php 

    if(isset($_SESSION['failedtest'])){
      $color = 'danger';
      $mess = 'Erreur!!!';
      //$value = $_SESSION['failedtest']['info']['nom'];
    }else {
      $color = 'primary';
      $mess = 'Ajouter un membre';
    }

    // if ($_GET['view'] == 'lock') {
    //   $name = 'lock';
    // }elseif ($_GET['view'] == 'home') {
    //   # code...
    // }


?>

<!-- Modal -->
<?php 
      //if (isset($_GET['#staticBackdrop'])) { ?>
        <a class=" btn btn-<?=$color?> my-2 mx-1" href="#staticBackdrop" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><?=$mess?></a>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmez votre identité</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="control.php?view=identify" method="post">
        <?php if(isset($_SESSION['failedtest'])){ ?> 
          <h1 class="fs-6 text-danger">Nom ou code incorrect</h1>
        <?php } ?>
        <div class="mb-3">
            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Veuillez entrer nom." value="<?php if(isset($value)){ echo $value; }?>">
          </div>

          <div class="mb-3">
            <input type="password" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Veuillez entrer code.">
          </div>
          <h6 class="text-danger">Seul le créateur de la famille peut ajouter un membre.</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermez</button>
        <button type="submit" name="Envoyez" class="btn btn-outline-primary">Choisir</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php unset($_SESSION['failedtest']); ?>



<?php //} ?>