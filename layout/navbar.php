<nav class="navbar navbar-expand-lg  bg-primary">
    <div class="container-fluid ">
        <a class="navbar-brand text-light" style="font-weight: bold;" href="">FamApp</a>
       <?php if (isset($_SESSION['id'])) { ?>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

          <ul class="nav nav-pills">
                      <div class="btn-group dropstart">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                          </svg>
                        </button> 
                        <ul class="dropdown-menu">
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="control.php?view=deconnect">Deconnexion</a></li>
                        </ul>
                      </div>
              </ul> 
        </div>
        <?php }else{ ?>
          <a class="navbar-brand text-light" href="control.php?view=">Login</a>
        <?php  } ?>
    </div>
</nav>
<script src="../js/bootstrap.bundle.min.js"></script>
