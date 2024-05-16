<?php
session_start();
include_once "../entities/vehicule.php";
$dateDepot = strtotime( $_SESSION['datedepotComp']);
$dateRetrait=strtotime(  $_SESSION['dateRetraitComp']);
$newformatDateDepot = date('Y-m-d',$dateDepot);
$newFormatDateRetrait=date('Y-m-d',$dateRetrait);
    $_SESSION['newformatDateDepot']=$newformatDateDepot;
    $_SESSION['newFormatDateRetrait']=$newFormatDateRetrait;

    $heurDepot =  $_SESSION['heurdepot'] ;
    $heurRetrait= $_SESSION['heurretrait'];
   echo  $heurDepot;
   echo "<br>";
    $heureDepotTime = sprintf('%02d:00:00', $heurDepot);
    $heureRetraitTime = sprintf('%02d:00:00', $heurRetrait);
    $_SESSION['heureDepotTime']=$heureDepotTime;
    $_SESSION['heureRetraitTime']=$heureRetraitTime;
  
    if (isset($_POST['Tousvelos'])) {
        
   $vehicul=new vehicule();
   $pdo=new PDO("mysql:host=localhost;dbname=gogreen","root","");
  if( $_SESSION['dateretrait'] == $_SESSION['datedepot']){
      $vehicules=$vehicul->getVehiculeNonReserveOneDate($pdo, $_SESSION['newFormatDateRetrait'],$_SESSION['heureRetraitTime'], $_SESSION['heureDepotTime'],"%","velos", $_SESSION['gouvernerat'], $_SESSION['ville']);
      include '../views/listeArticle.php';
    }
    else {
        $vehicules=$vehicul->getVehiculeNonReserveTwoDate($pdo,$_SESSION['newFormatDateRetrait'],$_SESSION['heureRetraitTime'],$_SESSION['heureDepotTime'],"%","velos", $_SESSION['newformatDateDepot'], $_SESSION['gouvernerat'], $_SESSION['ville']);
    }
   }
   if (isset($_POST['velosSimples'])) {
        
    $vehicul=new vehicule();
    $pdo=new PDO("mysql:host=localhost;dbname=gogreen","root","");
   if( $_SESSION['dateretrait'] == $_SESSION['datedepot']){
       $vehicules=$vehicul->getVehiculeNonReserveOneDate($pdo, $_SESSION['newFormatDateRetrait'],$_SESSION['heureRetraitTime'], $_SESSION['heureDepotTime'],"normal","velos", $_SESSION['gouvernerat'], $_SESSION['ville']);
       foreach ($vehicules as $vehicule) {
         echo $vehicule['idVehicule']." ".$vehicule['titre']." ".$vehicule['couleur']." ".$vehicule['categorie'];
       }
     }
     else {
         $vehicules=$vehicul->getVehiculeNonReserveTwoDate($pdo,$_SESSION['newFormatDateRetrait'],$_SESSION['heureRetraitTime'],$_SESSION['heureDepotTime'],"normal","velos", $_SESSION['newformatDateDepot'], $_SESSION['gouvernerat'], $_SESSION['ville']);
     }
    }
    if (isset($_POST['veloselectriques'])) {
        
      $vehicul=new vehicule();
      $pdo=new PDO("mysql:host=localhost;dbname=gogreen","root","");
     if( $_SESSION['dateretrait'] == $_SESSION['datedepot']){
         $vehicules=$vehicul->getVehiculeNonReserveOneDate($pdo, $_SESSION['newFormatDateRetrait'],$_SESSION['heureRetraitTime'], $_SESSION['heureDepotTime'],"[0-300]%","velos", $_SESSION['gouvernerat'], $_SESSION['ville']);
         foreach ($vehicules as $vehicule) {
           echo $vehicule['idVehicule']." ".$vehicule['titre']." ".$vehicule['couleur']." ".$vehicule['categorie'];
         }
       }
       else {
           $vehicules=$vehicul->getVehiculeNonReserveTwoDate($pdo,$_SESSION['newFormatDateRetrait'],$_SESSION['heureRetraitTime'],$_SESSION['heureDepotTime'],"[0-300]%","velos", $_SESSION['newformatDateDepot'], $_SESSION['gouvernerat'], $_SESSION['ville']);
       }
      }


?>