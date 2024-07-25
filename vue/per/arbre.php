<?php 
    //include_once '../layout/navbar.php';
    $id = $_GET['id'];
    // requête pour avoir les membres de la famille
    $req = $conn -> prepare("SELECT * FROM personne WHERE idpar = $id ORDER BY datenaiss ASC");
    $req -> execute();
    $row = $req -> fetchAll();


    // requête pour avoir le créateur de la famille

    $reqs = $conn -> prepare("SELECT * FROM personne WHERE id = $id");
    $reqs -> execute();
    $rows = $reqs -> fetch();


    function testpar($id, $conn){
        $rex = $conn -> prepare("SELECT * from personne where idpar = $id ORDER BY datenaiss ASC");
        $rex -> execute();
        $rowz = $rex -> fetchAll();
        return $rowz ;
    }

?>
<link rel="stylesheet" href="../css/New.css">
	<body>
		 <b><center><div style="font-weight:bold;font-size:bigger;"></div>Bienvenue dans la famille <?=$rows['nomfam']?></center></b>
		<div class="container">
			<div class="row">
				<div class="tree">
                    <ul>
                        <li> 
                            <a href="#"><span><?=$rows['nom'].'<br>'.$rows['prenom']?></span></a> 
                            <ul>
                                <?php foreach ($row as $key ) { ?>
                                    <li> 
                                        <a href="#"><span><?=$key['nom'].'<br>'.$key['prenom']?></span></a>
                                        <?php 
                                            $idd = $key['id'];
                                            $rex = $conn -> prepare("SELECT * from personne where idpar = $idd ORDER BY datenaiss ASC");
                                            $rex -> execute();
                                            $rowz = $rex -> fetchAll();
                                            if ($rowz > 0) {
                                                echo "<ul>";
                                                foreach ($rowz as $keys ) { ?>
                                                <li> <a href="#"><span><?=$keys['nom'].'<br>'.$keys['prenom']?></span></a></li>
                                                <?php  } 
                                                echo "</ul>";
                                            } ?>
                                        </li>
                                <?php  } ?>
                            </ul>
                        </li>
                    </ul>
	            </div>
            </div>
        </div>
        <center><a href="control.php?view=arbre&id=1">Voir l'arbre complet.</a></center>
        <center><a href="control.php?view=home">Revenir aux membres de la famille</a></center>
    </body>
