<?php 
$conn = new PDO("mysql:host=localhost;dbname=famm;" ,"root", "");
$req = $conn->prepare("SELECT * FROM personne p WHERE p.id NOT IN (SELECT DISTINCT idpar FROM personne WHERE idpar IS NOT NULL)");
$req -> execute();
$row = $req->fetchAll();
var_dump($row); 