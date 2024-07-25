<?php 
$nom = htmlspecialchars($_POST['nom']);
$code = htmlspecialchars($_POST['code']);

$req = $conn -> prepare("SELECT * FROM personne WHERE nom = ? AND code = ?");
$req -> execute([$nom , $code]);
$row = $req-> fetch();
if ($row) {
    $_SESSION['succestest'] = 1;
    header('location:control.php?view=addmem');
}else{
    $_SESSION['failedtest'] = 1;
    //$_SESSION['failedtest']['info'] = $_POST;
    header('location:control.php?view=home#staticBackdrop');
}