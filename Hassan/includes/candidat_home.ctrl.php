<?php
include('connect.model.php');
session_start();
// $_SESSION['candidat_id'] = $row['iduser'];

$candida_id = $_SESSION['candidat_id'];

$sql = "SELECT nom, prenom, email, phone, adresse, phone, descandidat, datenaissance, nomcv FROM candidat, user WHERE candidat.iduser = user.iduser";
$resault = executeQuery($sql);

$nom= $resault[0]['nom'];
$prenom = $resault[0]['prenom'];
$fullName = $nom . ' ' . $prenom;

$birthday = $resault[0]['datenaissance'];
$email = $resault[0]['email'];
$phone = $resault[0]['phone'];
$adresse = $resault[0]['adresse'];
$phone = $resault[0]['phone'];
$descandidat = $resault[0]['descandidat'];
$datenaissance = $resault[0]['datenaissance'];
$nomcv= $resault[0]['nomcv'];


var_dump($sql);
print_r($resault);

function getCandidatInfo($idcd){

}


?>