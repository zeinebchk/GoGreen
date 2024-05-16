<?php
include 'connexion.php';

$email=$_post['email'];
$password=$_post['password'];

$pdo=getConnexion();
$stmnt=$pdo->prepare("select * from etudiant where email=? and password=?");
$result=$stmnt->execute([$email,$password]);
$res=$result->fetchAll(PDO::FETCH_ASSOC);
if($res !=null){
    header('location:modifierInfo.html');
}





?>