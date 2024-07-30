<?php

// assure la redirection pour que le controller puisse afficher les vues
if (!isset($_GET['view'])) {
  header('location:logic/control.php?view=');
}

$req = $conn->query("SELECT * FROM personne");
$raw = $req->fetch();
if (!($raw)) {
  // au cas où il n'y a personne dans la base de données.
  header('location:control.php?view=one');
} else {

?>
  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden">
    <style>
      .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
          radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
      }

      #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#0000a0, #0000ff);
        overflow: hidden;
      }

      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#0000a0, #0000ff);
        overflow: hidden;
      }

      .bg-glass {
        background-color: rgba(0, 0, 0, 0.2) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }

      #Connexion {
        width: 100%;
        border: solid 2px purple;

      }

      #Connexion:hover {
        width: 100%;
        border: solid 2px blue;

      }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index:3">
          <h6 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Bienvenue sur notre plate-forme <br />
            <span style="color: hsl(218, 81%, 75%)">familliale</span>
          </h6>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            "La discipline est le pont entre les objectifs et les realisations" <br> Jim Rohn <br><br>
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">

              <!-- Debut du formulaire -->
              <form action="control.php?view=test" method="POST" onsubmit="return validerFormulaire()">
                <?php if (isset($_SESSION['form_data'])) {
                  echo '<center><span class="text-danger">Information incorrectes</span></center>';
                } ?>
                <div class="text-light" style="text-align:center;">
                  <h1>Identifiez-vous</h1>
                </div>

                <div style="text-align: center;">
                  <span id="erreur-aff" style="color: red;"></span>
                </div>
                <p class="text-light"> Cliquez pour<a href="control.php?view=add" style="text-decoration: none;"> créer votre famille.</a></p>

                <!-- Champ de l'e-mail -->
                <div class="form-outline mb-4">
                  <label class="form-label text-light" for="form3Example3">Nom de Famille </label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Entrez le nom de votre famille" name="nomfam" id="nomfam" value="<?= isset($_SESSION['form_data']['nomfam']) ? htmlspecialchars($_SESSION['form_data']['nomfam']) : '' ?>" />
                  <span id="erreur-fam" style="color: red; font-size: 13px;"></span>
                </div>

                <div class="form-outline mb-2">
                  <label id="lan" class="form-label text-light">Mot de passe</label>
                  <input type="password" class="form-control" name="mdp" id="mdp" value="" placeholder="Entrez votre mot de passe" />
                  <span id="erreur-mdp" style="color: red;"></span><br>
                  <a href="control.php?view=pass" style="text-decoration:none;">Mot de passe oublié?</a>
                </div>



                <!-- Bouton d'inscription -->
                <center>
                  <input type="submit" class="btn btn-primary btn-block mb-4 px-5" id="Connexion" value="Connexion" name="Connexion">
                </center>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  </body>
  <script src="../js/erlog.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </html>
<?php unset($_SESSION['form_data']);
}  ?>