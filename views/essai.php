<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Variable de Session dans un Div</title>
</head>
<body>

<?php
// Démarrez la session
session_start();

// Définissez une variable de session
$_SESSION['myVariable'] = "Contenu de la variable de session";
?>

<!-- Un div pour afficher la variable de session -->
<div id="myDiv">
    <?php
    // Affichez le contenu de la variable de session dans le div
    echo $_SESSION['myVariable'];
    ?>
</div>

</body>
</html>