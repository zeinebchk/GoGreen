<?php
session_start();
echo $_SESSION['cin'];
include_once '../entities/vehicule.php';
include_once '../entities/user.php';
if(isset($_POST['enregistrer'])){
    if (isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['prix']) &&isset($_POST['couleur']) && isset($_POST['ville']) && isset($_POST['gouvernerat'])  && isset($_POST['adresse']) &&isset($_POST['vitesse']) && isset($_POST['equipement']) && isset($_POST['type']) && isset($_POST['radio-group']) ) {
        if (!empty($_POST['titre']) && !empty($_POST['prix']) && !empty($_POST['adresse']) ){
            $id=$_POST['id'];
            $titre=$_POST['titre'];
            $prix=$_POST['prix'];
            $couleur=$_POST['couleur'];
            $ville=$_POST['ville'];
            $gouvernerat=$_POST['gouvernerat'];
            $adresse=$_POST['adresse'];
            $vitesse=$_POST['vitesse'];
            $vitesse = isset($_POST['vitesse']) ? $_POST['vitesse'] : ''; 
           if ($vitesse == "") {
             $vitesse = "normal";
             }
            echo "<script>console.log('$vitesse')</script>";
            $equipement=$_POST['equipement'];
            $categorie=$_POST['radio-group'];
            $type=$_POST['type'];
            if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
              $fileTmpName = $_FILES["fileToUpload"]["tmp_name"];

    // Read the binary data from the uploaded file
    $imageData = file_get_contents($fileTmpName);
            $target_dir = "C:/xampp/htdocs/goGreen/views/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
echo $imageFileType;
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$image= $imageData;
            }
      $vehicule=new vehicule();
      $pdo=new PDO("mysql:host=localhost;dbname=gogreen","root","");
      $vehicule->UPDATE($pdo,$id, $titre, $couleur, $vitesse, $image, $categorie, $gouvernerat, $ville, $adresse, $prix,$equipement);
     header("location:../views/mesAnnances.php");
    }
    }}

?>