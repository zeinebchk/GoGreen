<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

// Vérifiez si les clés existent avant d'essayer d'y accéder
if (isset($data['dateretrait'])) {
    $dateretrait = $data['dateretrait'];
    $_SESSION['dateretrait'] = $dateretrait;
    echo "cc" . $dateretrait;
}

if (isset($data['datedepot'])) {
    $datedepot = $data['datedepot'];
    $_SESSION['datedepot'] = $datedepot;
    echo "cc" . $datedepot;
}

if (isset($data['heurdepot'])) {
    $heurdepot = $data['heurdepot'];
    $_SESSION['heurdepot'] = $heurdepot;
    echo "cc" . $heurdepot;
}

if (isset($data['heurretrait'])) {
    $heurretrait = $data['heurretrait'];
    $_SESSION['heurretrait'] = $heurretrait;
    echo "cc" . $heurretrait;
}

if (isset($data['nbrHeure'])) {
    $nbrHeure = $data['nbrHeure'];
    $_SESSION['nbrHeure'] = $nbrHeure;
    echo "cc" . $nbrHeure;
}

if (isset($data['gouvernerat'])) {
    $gouvernerat = $data['gouvernerat'];
    $_SESSION['gouvernerat'] = $gouvernerat;
    echo "cc" . $gouvernerat;
}

if (isset($data['ville'])) {
    $ville = $data['ville'];
    $_SESSION['ville'] = $ville;
    echo "cc" . $ville;
}
if (isset($data['datedepotComp'])) {
    $datedepotComp = $data['datedepotComp'];
    $_SESSION['datedepotComp'] = $datedepotComp;
    echo "cc" . $datedepotComp;
}
if (isset($data['dateRetraitComp'])) {
    $dateRetraitComp = $data['dateRetraitComp'];
    $_SESSION['dateRetraitComp'] = $dateRetraitComp;
    echo "cc" . $dateRetraitComp;
}

header("location:../views/listeArticle.php");

?>