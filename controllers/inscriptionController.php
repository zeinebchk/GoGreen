<?php
session_start(); 
include "../entities/connexion.php";
include_once "../entities/user.php";
if (!isset($_SESSION['cin'])) {
  $_SESSION['cin'] = '';
}
if (!isset($_SESSION['nom'])) {
  $_SESSION['nom'] = '';
}
if (!isset($_SESSION['prenom'])) {
  $_SESSION['prenom'] = '';
}
if (!isset($_SESSION['email'])) {
  $_SESSION['email'] = '';
}
if (!isset($_SESSION['tel'])) {
  $_SESSION['tel'] = '';
}
if (!isset($_SESSION['gouvernerat'])) {
  $_SESSION['gouvernerat'] = '';
}
if (!isset($_SESSION['ville'])) {
  $_SESSION['ville'] = '';
}
if (!isset($_SESSION['codePostal'])) {
  $_SESSION['codePostal'] = '';
}
if (!isset($_SESSION['target_file'])) {
  $_SESSION['target_file'] = '';
}

$afficherDeuxiemeFormulaire = false;
$afficherTroisiemeFormulaire = false;
if (isset($_POST['submit1'])) {
 if (isset($_POST['cin']) &&  isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['tel'])) {
  if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['cin']) && !empty($_POST['tel']) && !empty($_POST['email']) ){
    $_SESSION['cin'] = $_POST['cin'];
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['tel'] = $_POST['tel'];
    $afficherDeuxiemeFormulaire = true;

    $target_dir = "C:/xampp/htdocs/goGreen/views/images/";
    $default_image = "profil1.png";
    $target_file = $target_dir . $default_image;

    if (!empty($_FILES["fileToUpload"]["name"])) {
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    }
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    echo "<script>console.log('ccccc')</script>";
   
// Check if image file is a actual image or fake image
if (!empty($_FILES["fileToUpload"]["name"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "<script>console.log('aaaaa')</script>";
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "<script>console.log('ggggg')</script>";
    echo "File is not an image.";
    $uploadOk = 0;
  }
} else {
  echo "<script>console.log('bbbbbbbbbbbb')</script>";
  // Handle the case where no image is selected
  $uploadOk = 1;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "<script>console.log('lllllllllllll')</script>";
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
echo "<script>console.log('mmmmmm')</script>";
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<script>console.log('sssssssssss')</script>";
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<script>console.log('ppppppppppppppp')</script>";
  echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo '<script>console.log("The file ' . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . ' has been uploaded.");</script>';
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$_SESSION['target_file'] = $target_file;
    
  }
  }}


if (isset($_POST['submit2'])) {
  if (isset($_POST['gouvernerat']) &&  isset($_POST['ville']) && isset($_POST['codePostal'])) {
   if (!empty($_POST['gouvernerat']) && !empty($_POST['ville']) && !empty($_POST['codePostal'])){
    $_SESSION['gouvernerat']=$_POST['gouvernerat'];
   $_SESSION['ville']=$_POST['ville'];
   $_SESSION['codePostal']=$_POST['codePostal'];
    $afficherTroisiemeFormulaire = true;
   }}
 }
 if (isset($_POST['back1'])) {
  $afficherDeuxiemeFormulaire = false;
  $afficherTroisiemeFormulaire = false;}

if (isset($_POST['submit3'])) {
  if (isset($_POST['password']) &&  isset($_POST['confirmPassword']) ){
   if (!empty($_POST['password']) && !empty($_POST['confirmPassword']) ){
    $password=$_POST['password'];
     $user=new user();
     $pdo=new PDO("mysql:host=localhost;dbname=gogreen","root","");
     $users=$user->findAll($pdo);
     $verif = false;
     foreach ($users as $userData) {
         if ($userData['cin'] == $_SESSION['cin'] || $userData['email'] == $_SESSION['email']) {
             $verif = true;
         }
     }    
     if (!$verif) {
         $user->inscription($pdo, $_SESSION['cin'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['email'], $password, $_SESSION['tel'], $_SESSION['gouvernerat'], $_SESSION['ville'], $_SESSION['codePostal'], $_SESSION['target_file']);
         header("Location: ../views/login.html");
         echo "<script>console.log('aaaa')</script>";
     } else {
         echo "<script>alert('vous etes deja inscrit')</script>";
     }
   
   }}
 }
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;800&family=Inter:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;800;900&family=Inter:wght@900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../views/inscriptionStyle.css">
        <link rel="stylesheet" href="../views/style.css">
        <link rel="stylesheet" href="../views/navbarStyle.css">
        <link rel="stylesheet" href="../views/footerStyle.css">

    </head>
    <body>
      <header>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
             <a href="#" class="logo">GoGreen</a>
             <nav class="navbar">
              <a href="../views/acceuil.html">Acceuil</a>
              <a href="../views/about.html">A propos</a>
              <a href="../views/locations.html">Locations</a>
              <a href="../views/contact.html">Contact</a>
                    
          </nav> 
          <div class="buttons">
            <button class="conButton" onclick="window.location.href = '../views/login.html'">Connectez vous <i class="fas fa-arrow-right"></i></button>
            <button class="conButton" onclick="window.location.href = '../views/inscription.html'" >inscrivez vous <i class="fas fa-arrow-right"></i></button>
        </div>   
      </header>
      <section>
        <div class="img">
          <img src="../views/images/background.jpg" class="imgg">
            <div class="container">
            <?php if (!$afficherDeuxiemeFormulaire && !$afficherTroisiemeFormulaire) {  ?>
        <!-- Afficher le premier formulaire -->
        <form action="../controllers/inscriptionController.php" method="post"  id="form1" enctype="multipart/form-data" >
              <center>
                <div class="divInformation" >
                  <img src="../views/images/profil1.png.png" alt="Image importée" width="130px" height="130px"   id="profile-pic">
                  <label for="fileToUpload">choisir image</label>
                  <input type="file" id="fileToUpload" name="fileToUpload" accept="image/*" class="file-input" onchange="updateImage()" >
                </div>
              
              </center>

              <input type="text" id="cin" placeholder="CIN" name="cin" pattern="[0-9]{6}" title="CIN doit etre 6 chiffres" required>
              <input type="text" id="nom" placeholder="nom" name="nom"required>
              <input type="text" id="prenom" placeholder="prenom" name="prenom" required>
              <input type="email" id="email" placeholder="Email" name="email"  required>
              <input type="text" id="telephone" placeholder="Numero de telephone" name="tel" required pattern="[0-9]{8}" title="le numero de téléphone doit etre 8 chiffres" >
              <div class="btn-box">
                <button type="submit" id="next1" name="submit1" >Suivant</button>
              </div>
         </form>
    <?php } else if ($afficherDeuxiemeFormulaire) {?>
        <!-- Afficher le deuxième formulaire -->
        <form  action="../controllers/inscriptionController.php" method="post">
              <h3>Coordonnees</h3>
              <p style="color:#777;font-size: 1.5rem;padding:5px">gouvernerat:</p>
              <select class="liste-gouvernerat" id="l-gouv" name="gouvernerat">
                <option value="Tunisia">Tunisia</option>
                <option value="Monastir">Monastir</option>
                <option value="Sousse">Sousse</option>
                <option value="Sfax">Sfax</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Monastir">Monastir</option>
                <option value="Sousse">Sousse</option>
                <option value="Sfax">Sfax</option>
              </select>
              <br>
              <p style="color:#777;font-size: 1.5rem; padding:5px">ville:</p>
              <select class="liste-ville" id="l-ville" name="ville">
                <option value="Ettadhamen-Mnihla">Ettadhamen-Mnihla</option>
                <option value="La Soukra">La Soukra</option>
                <option value="Ariana">Ariana</option>
                <option value="El Mourouj">El Mourouj</option>
                <option value="Raoued">Raoued</option>
                <option value="La Marsa">La Marsa</option>
                <option value="Ben Arous">Ben Arous</option>
                <option value="Douar Hichem">Douar Hichem</option>
                <option value="Le Kram">Le Kram</option>
                <option value="Le Bardo">Le Bardo</option>
                <option value="Radès">Radès</option>
                <option value="La Goulette">La Goulette</option>
                <option value="La Manouba">La Manouba</option>
                <option value="Tebourba">Tebourba</option>
                <option value="Mégrine">Mégrine</option>
                <option value="Den Den">Den Den</option>
                <option value="Carthage">Carthage</option>
                <option value="Sidi Bou Saïd">Sidi Bou Saïd</option>
              </select>
              <br>
              <input type="text" id="codePostal" placeholder="code postal" name="codePostal" pattern="[0-9]{4}" title="le code postal doit etre de 4 chiffres" required>
              <div class="btn-box">
                <button type="button" id="back1" name="back2">precedent</button>
                <button type="submit" id="next2" name="submit2">Suivant</button>
              </div>
            </form>
    <?php } else if ($afficherTroisiemeFormulaire) { echo $codePostal ?>
        <!-- Afficher le troisième formulaire -->
        <form id="form3" action="../controllers/inscriptionController.php" method="post">
              <h3 style="margin:40px;">Securité</h3>
              <input type="password" id="motDePasse" name="password" placeholder="mot de passe" pattern=".{8,}" title="Le mot de passe doit contenir au moins 8 caractères" required>
              <input type="password" id="confirmerMotDePasse" name="confirmPassword" placeholder="confirmer mot de passe" pattern=".{8,}" title="Le mot de passe doit contenir au moins 8 caractères" required>
              <div class="btn-box">
                <button type="button" id="back2">precedent</button>
                <button type="submit" name="submit3">s'inscrire</button>
              </div>
            </form>
    <?php } ?>
            <div class="step-row">
              <div id="progress"></div>
              <div class="step-col"><small>Step1</small></div>
              <div class="step-col"><small>Step2</small></div>
              <div class="step-col"><small>Step3</small></div>
            </div>
            </div>
        </div>
      </section>
      <script>
            var form1=document.getElementById("form1");
            var form2=document.getElementById("form2");
            var form3=document.getElementById("form3");

            var next1=document.getElementById("next1");
            var next2=document.getElementById("next2");
            var back1=document.getElementById("back1");
            var back2=document.getElementById("back2");
            var progress=document.getElementById("progress");

            function validateForm1() {
              alert("aaa");
              var cin = document.getElementById("cin").value;
              var nom = document.getElementById("nom").value;
              var prenom = document.getElementById("prenom").value;
              var email = document.getElementById("email").value;
              var telephone = document.getElementById("telephone").value;

    if (cin === "" || nom === "" || prenom === "" || email === "" || telephone === "") {
      alert("Veuillez remplir tous les champs.");
      
      return false;
    }
    // form1.style.left = "450px";
    // form2.style.left = "-40px";
    // progress.style.width = "240px";
    // form1.submit(); 
    return true;// Prevent form submission
  }

  function validateForm2() {
    var codePostal = document.getElementById("codePostal").value;

    if (codePostal === "") {
      alert("Veuillez remplir tous les champs.");
return false;
    }
    // form2.submit();
    // form2.style.left = "-450px";
    // form3.style.left = "40px";
    // progress.style.width = "360px";
    return true;
    // return false; // Prevent form submission
  }

  function validateForm3() {
    var motDePasse = document.getElementById("motDePasse").value;
    var confirmerMotDePasse = document.getElementById("confirmerMotDePasse").value;

    if (motDePasse === "" || confirmerMotDePasse === "") {
      alert("Veuillez remplir tous les champs.");
      return false;
    }
    else if(motDePasse != confirmerMotDePasse){
      alert("mot de passe et confirmer mot de passe doivent etre les mèmes");
      return false;
    }

    form3.submit(); // Submit the form
    return true;
  }
//   next1.onclick = function () {
//   if (validateForm1()) {
//     form1.style.left = "-450px";
//     form2.style.left = "40px";
//     progress.style.width = "240px";
//   }
// };

// next2.onclick = function () {
//   if (validateForm2()) {
//     form2.style.left = "-450px";
//     form3.style.left = "40px";
//     progress.style.width = "360px";
//   }
// };

  // back1.onclick = function () {
  //   form1.style.left = "40px";
  //   form2.style.left = "-450px";
  //   progress.style.width = "120px";
  // };

  // back2.onclick = function () {
  //   form2.style.left = "40px";
  //   form3.style.left = "450px";
  //   progress.style.width = "240px";
  // };
             var lg=document.getElementById("l-gouv");
             var lv=document.getElementById("l-ville");
             lg.addEventListener('change',function(){
      lv.innerHTML='';
      if(lg.value=="Monastir")
     {
      var options=["Bekalta","Bembla","Beni Hassen","Sayada-Lamta-Bou Hajar","Téboulba","Zéramdine","Jemmal","Ksar Hellal","Ksibet el-Médiouni","Moknine","Monastir","Ouerdanine","Sahline","Téboulba","Zéramdine","el omran","skanes","swani","stah jabeur"];
     }else if (lg.value=="Tunisia")
      var options=["Ettadhamen-Mnihla","La Soukra","Ariana","El Mourouj","Raoued","La Marsa","Ben Arous","Douar Hichem","Le Kram","Le Bardo","Radès","La Goulette","La Manouba","Tebourba","Mégrine","Den Den","Carthage","Sidi Bou Saïd"];
      options.forEach(function(optionText) {
        var option = document.createElement("option");
        option.value = optionText;
        option.text = optionText;
        lv.appendChild(option);
    });
    });
    function updateImage() {
      var input = document.getElementById('fileToUpload');
        var img = document.getElementById('profile-pic');

        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
      </script>
       <section>
  <div class="container-footer w-container">
    <div class="w-row">
      <div class="footer-column w-clearfix w-col w-col-4"><img src="../views/images/logo.png" alt="" width="100px" height="120px" class="failory-logo-image">
        <h3 class="footer-failory-name" style="position:absolute;left:100px">GoGreen</h3>
        <p class="footer-description-failory" style="padding-top:47px;">site de location des moyens de transports verts<br></p>
      </div>
      <div class="footer-column w-col w-col-8">
        <div class="w-row">
          <div class="w-col w-col-8">
            <div class="w-row">
              <div class="w-col w-col-7 w-col-small-6 w-col-tiny-7">
                <h3 class="footer-titles" style="position:absolute">Liens rapides</h3>
                <p class="footer-links" style="padding-top:47px;"><a href="" target="_blank"><span class="footer-link">Acceuil<br></span></a><a href=""><span class="footer-link">Apropos de nous<br></span></a><a href=""><span class="footer-link">Locations</span></a><span><br></span><a href=""><span class="footer-link">Contacts<br></span></a>
              </div>
              <div class="w-col w-col-5 w-col-small-6 w-col-tiny-5">
                <h3 class="footer-titles" style="position:absolute">Contacter</h3>
                <p class="footer-links"  style="padding-top:47px;">
                  <p style="color: #FFFFFF;font-size: 17px;position: absolute;top:50px;padding-bottom: 2px;"><i class="fa fa-map-marker-alt me-3"></i><span class="footer-link"  style="font-size: 0.9rem;"></span> 5000 Monastir</p><p style="color: #FFFFFF;font-size: 17px;position: absolute;top:75px;"><i class="fa fa-phone-alt me-3"></i><span class="footer-link">+216 73 541489<br></span></p><p style="color: #FFFFFF;font-size: 17px;"><span class="footer-link"></span></p><p style="color: #FFFFFF;font-size: 17px;position: absolute;top:100px;"><i class="fa fa-envelope me-3"></i><span class="footer-link">GoGreen@gmail.com<br></span></p>
                </div>
            </div>
          </div>
          <div class="column-center-mobile w-col w-col-4">
            <h3 class="footer-titles" style="position:absolute">abonnéz nous </h3><a href="" target="_blank" class="footer-social-network-icons w-inline-block" ><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbf0a2f2b67e3b3ba079c_Twitter%20Icon.svg" width="20" alt="Twitter icon" ></a><a href="" target="_blank" class="footer-social-network-icons w-inline-block" style="padding-top:47px;"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbfe70fcf5a0514c5b1da_Instagram%20Icon.svg" width="20" alt="Instagram icon"></a><a href="" target="_blank" class="footer-social-network-icons w-inline-block"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbe42e1e6034fdaba46f6_Facebook%20Icon.svg" width="20" alt="Facebook Icon"></a><a href="" target="_blank" class="footer-social-network-icons w-inline-block"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dc0002f2b676eb4ba0869_LinkedIn%20Icon.svg" width="20" alt="LinkedIn Icon"></a><a href="" target="_blank" class="footer-social-network-icons w-inline-block"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dc0112f2b6739c9ba0871_Pinterest%20Icon.svg" width="20" alt="Pinterest Icon" class=""></a>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </body>
   
    </html>
