<?php 
$req = $conn->prepare("SELECT * FROM personne WHERE idpar = 4");
$req->execute();
$rows = $req->fetchAll();
include_once '../layout/navbar.php';
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <?php foreach ($rows as $index => $key): ?>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $index; ?>" <?php echo $index === 0 ? 'class="active" aria-current="true"' : ''; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
    <?php endforeach; ?>
  </div>

  <div class="carousel-inner">
    <?php foreach ($rows as $index => $key): ?>
      <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
        <img src="../img/<?php echo $index + 1; ?>.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <a href="" style="text-decoration: none; color:white; font-weight:bold;" class="fs-4"> <?php echo htmlspecialchars($key['nom']); ?></a>
          <p><?php echo htmlspecialchars($key['prenom']); ?></p>
          <!-- Ajoutez d'autres informations de la personne ici si nécessaire -->
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>