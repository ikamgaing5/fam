<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/bootstrapFont.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<title>FamApp</title>
<?php


session_start();

include_once 'connexion.php';

if ($_GET['view'] == null) {
    include_once '../index.php';
} elseif ($_GET['view'] == 'test') {
    include 'test.php';
} elseif ($_GET['view'] == 'add') {
    include_once '../vue/per/news.php';
} elseif ($_GET['view'] == "one") {
    include '../vue/per/fam.php';
} elseif ($_GET['view'] == 'verif') {
    include 'verif.php';
} elseif (!isset($_SESSION['id'])) {
    header('Location:control.php?view=');
} elseif ($_GET['view'] == 'newper') {
    include_once '../vue/per/newper.php';
} elseif ($_GET['view'] == 'home') {
    include_once '../vue/per/home.php';
} elseif ($_GET['view'] == 'addmem') {
    include_once '../vue/per/addmem.php';
} elseif ($_GET['view'] == 'admem') {
    include_once 'addmem.php';
} elseif ($_GET['view'] == 'deconnect') {
    session_unset();
    header('location:control.php?view=');
} elseif ($_GET['view'] == 'identify') {
    include_once 'identify.php';
} elseif ($_GET['view'] == 'lock') {
    include_once '../vue/per/lock.php';
} elseif (($_GET['view'] == 'modif') &&  isset($_GET['modif'])) {
    $id = $_GET['modif'];
    include_once '../vue/per/modif.php';
} elseif ($_GET['view'] == 'modifinfo') {
    include_once 'modifinfo.php';
} elseif ($_GET['view'] == 'arbre' && isset($_GET['id'])) {
    include_once '../vue/per/arbre.php';
} elseif ($_GET['view'] == 'car') {
    include_once '../vue/admin/carroussel.php';
} elseif ($_GET['view'] == 'supp' && isset($_GET['supp'])) {
    $id = $_GET['supp'];
    $req = $conn->prepare("SELECT * FROM personne WHERE idpar = '$id'");
    $req->execute();
    $row = $req->fetch();
    if ($row > 0) {
        $_SESSION['errsup'] = true;
        header('location:control.php?view=home');
    } else {
        $req = $conn->prepare("DELETE FROM personne WHERE id = $id");
        $req->execute();
        $_SESSION['errsup'] = false;
        header('location:control.php?view=home');
    }
} elseif ($_GET['view'] == 'essaie') {
    include_once '../vue/per/essaie.php';
}
