<?php 
include_once '../entities/vehicule.php';
$vehicule=new vehicule();
$pdo=new PDO("mysql:host=localhost;dbname=gogreen","root","");
if((isset($_POST['modifier'])) ){
    echo "<script>console.log('bbbbb');</script>";   
    if((isset($_POST['article_id']))){
        echo "<script>console.log('fffffff');</script>";   
        $idVehicule=$_POST['article_id'];
        echo "<script>console.log('$idVehicule');</script>";   
      $caracteristiqueVehi=$vehicule->findByID($pdo,$idVehicule);

}}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>publier une Annonce</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <link rel="stylesheet" href="footerStyle.css">
        <link rel="stylesheet" href="publier une annonce.css">
        <link rel="stylesheet" href="publier une annonce.js">
        <link rel="stylesheet" href="navbarStyle.css">
       <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;800&family=Inter:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;800;900&family=Inter:wght@900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <script src="https://kit.fontawesome.com/7782ba52d7.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="fas fa-bars"></label>
                 <a href="#" class="logo">GoGreen</a>
                
                 <nav class="navbar">
                  <a href="acceuil.html">Acceuil</a>
                  <a href="about.html">A propos</a>
                  <a href="locations.html">Locations</a>
                  <a href="contact.html">Contact</a>
                
                   </nav>
                   <div class="user-menu">
                    <div class="user-icon">
                        <i class="fa-solid fa-bell"></i>
                        <i class="fas fa-user small-icon" id="userIcon"></i>
                      
                    </div>
                    <div class="dropdown-content" id="userDropdown">
                        <a href="file:///C:/Users/asus/Desktop/site%20web/profil.html">
                            <i class="fas fa-user fa-xs"></i>Profil
                        </a>
                        <a href="file:///C:/Users/asus/Desktop/site%20web/tableau.html">
                            <i class="fas fa-table-list fa-xs"></i>Tableau de Bord</a>
                          
                        <a href="file:///D:/dev%20web/GoGreen.com/site%20web/login.html">
                            <i class="fa-solid fa-right-from-bracket"></i>Se Déconnecter</a>
                           
                          <a href="#" id="deleteLink" onclick="openDialogButtonClick()">
                            <span>🗑️</span>Supprimer compte
                        </a>
                        
                        <dialog class="delete-dialog" id="deleteDialog">
                            <div class="delete-dialog-container">
                                <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                        
                                <div class="dialog-buttons">
                                    <button class="dialog-button cancel-button" onclick="cancelButtonClick()">
                                        Annuler
                                    </button>
                                    <button class="dialog-button delete-button" onclick="deleteButtonClick()">
                                        Supprimer
                                    </button>
                                </div>
                            </div>
                        </dialog>
                      </div>
                </div>   
             </header>
        <section class="img" style="height:130rem;">
            <div class="center" style="height: 110rem; top:120%;"> 
             <h1>modifier votre annance</h1>
             <form method="post" action="../controllers/modifierAnnanceController.php" enctype="multipart/form-data">
             <?php
                      foreach ($caracteristiqueVehi as $v) {
                      echo '<input type="hidden" name="id" value="'.$v['idVehicule'].'" required>';}
                     ?>
                 <div class="txt_field">
                    <?php
                      foreach ($caracteristiqueVehi as $v) {
                      echo '<input type="text" name="titre" value="'.$v['titre'].'" required>';}
                     ?>
                     <span></span>
                     <label>titre du véhicule</label>
                 </div>
                 <div class="txt_field">
                 <input type="text"  title="le prix doit etre des chiffres" name="prix" value=" <?php
                      foreach ($caracteristiqueVehi as $v) {
                      echo $v['prix'];}
                     ?>" required>
                
                     <span></span>
                     <label>prix par heure </label>
                 </div>
                 <div class="couleur">
                    <p  class="label">couleur:</p>
                    <select class="liste-couleur" name="couleur">
                     <option> rouge</option>
                     <option > vert</option>
                     <option > bleu</option>
                     <option > blanc</option>
                     <option> noir</option>
                     <option > rose</option>
                     <option> jaune</option>
                     <option > gris</option>
                     <option > marron</option>
                     </select>
                 </div>
                 <p class="label" style="padding-top:20px;">categorie :</p>
                 <div class="rad-categorie">
                    <?php
                    foreach ($caracteristiqueVehi as $v) {
                        if($v['categorie']=="velos"){
                            echo ' <input type="radio" id="radio1" name="radio-group" value="velo" checked>
                            <label for="radio1">Vélo</label>
                          
                            <br>
                          
                            <input type="radio" id="radio2" name="radio-group" value="trotinette">
                            <label for="radio2">trotinette</label>
                          
                            <br>
                          
                            <input type="radio" id="radio3" name="radio-group" value="voiture">
                            <label for="radio3">voiture</label>
                          
                           <input type="radio" id="radio3" name="radio-group" value="chaussures">
                           <label for="radio3">chaussures a roulette</label>';
                        }
                        else if($v['categorie']=="trotinette"){
                            echo ' <input type="radio" id="radio1" name="radio-group" value="velo" >
                            <label for="radio1">Vélo</label>
                          
                            <br>
                          
                            <input type="radio" id="radio2" name="radio-group" value="trotinette" checked>
                            <label for="radio2">trotinette</label>
                          
                            <br>
                          
                            <input type="radio" id="radio3" name="radio-group" value="voiture">
                            <label for="radio3">voiture</label>
                          
                           <input type="radio" id="radio3" name="radio-group" value="chaussures">
                           <label for="radio3">chaussures a roulette</label>';  
                        }
                        else if($v['categorie']=="voiture"){
                            echo ' <input type="radio" id="radio1" name="radio-group" value="velo" >
                            <label for="radio1">Vélo</label>
                          
                            <br>
                          
                            <input type="radio" id="radio2" name="radio-group" value="trotinette" >
                            <label for="radio2">trotinette</label>
                          
                            <br>
                          
                            <input type="radio" id="radio3" name="radio-group" value="voiture" checked>
                            <label for="radio3">voiture</label>
                          
                           <input type="radio" id="radio3" name="radio-group" value="chaussures">
                           <label for="radio3">chaussures a roulette</label>';  
                        }
                        else if($v['categorie']=="chaussures"){
                            echo ' <input type="radio" id="radio1" name="radio-group" value="velo" >
                            <label for="radio1">Vélo</label>
                          
                            <br>
                          
                            <input type="radio" id="radio2" name="radio-group" value="trotinette" >
                            <label for="radio2">trotinette</label>
                          
                            <br>
                          
                            <input type="radio" id="radio3" name="radio-group" value="voiture">
                            <label for="radio3">voiture</label>
                          
                           <input type="radio" id="radio3" name="radio-group" value="chaussures" checked>
                           <label for="radio3">chaussures a roulette</label>';  
                        }
                    }
                     ?>
                
               </div>

               <p class="label" style="padding-top:10px;">Type :</p>
               <div class="rad-categorie">
                <?php 
                 foreach ($caracteristiqueVehi as $v) {
                    if($v['vitesse']=="normal"){
                       echo ' <input type="radio" id="normal" name="type" value="normale" onclick="cacherVitesse()" checked>
                       <label for="normal">normale</label>
                       <br>
                       <input type="radio" id="electrique" name="type" value="electrique" onclick="afficherVitesse()">
                       <label for="electrique">éléctrique</label>';
                    }else{
                        echo ' <input type="radio" id="normal" name="type" value="normale" onclick="cacherVitesse()" >
                        <label for="normal">normale</label>
                        <br>
                        <input type="radio" id="electrique" name="type" value="electrique" onclick="afficherVitesse()" checked>
                        <label for="electrique">éléctrique</label>';
                    }
                }
                ?>
              
             </div>
             <div class="txt_field vitesse" style="disabled:false;display:block;" >
             <?php 
                 foreach ($caracteristiqueVehi as $v) {
                    if($v['vitesse']!="normal"){
                       echo ' <input type="text" name="vitesse" value="'.$v['vitesse'].'" style="disabled:false;display:block;color:black;">
                       <span></span>
                       <label>vitesse (ex: 100klm/h)</label>';
                    }}
                     ?>
                 <!-- <input type="text" name="vitesse"> -->
                <span></span>
                <label>vitesse (ex: 100klm/h)</label>
            </div>
            <div class="txt_field ">
            <?php 
                 foreach ($caracteristiqueVehi as $v) {
                       echo ' <input type="text" name="equipement" value="'.$v['equipement'].'" required>';
                    }
                     ?>
                
                <span></span>
                <label>Equipement inclus</label>
            </div>
            <p style="color:#777;font-size: 1.5rem;padding:5px">gouvernerat:</p>
            <select class="liste-gouvernerat" id="l-gouv" name="gouvernerat" onchange="updateVille()">
              <option value="Tunisia" >Tunisia</option>
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
            <div class="txt_field">
           
               <input type="text" name="adresse" value=" <?php 
                 foreach ($caracteristiqueVehi as $v) {
                      echo $v['adresseExacte'];
                    }
                     ?>" required>
                <span></span>
                <label>adresse exacte</label>
            </div>
           
            <div class="drag-area" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($caracteristiqueVehi[0]['image']); ?>');background-size: cover; background-repeat: no-repeat; background-position: center;">
                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                <p class="upload">Glisser-déposer votre image</p>
                <span>OU</span>
                <button onclick="input.click()" class="fichier">choisir une image</button>
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" class="file-input" onclick="showFile()">
            </div>
            <div class="buttons">
                <button class="retour" onclick="window.location.href = 'tableau.html'">Annuler</button>
                <button class="enregistrer" type="submit" name="enregistrer" >Publier</button>
                
            </div>
             </form>
            </div>
         </div>
               </section>
         <script>
           function updateVille() {
    var select1 = document.getElementById('l-gouv');
    var select2 = document.getElementById('l-ville');

    // Effacer les options actuelles dans la deuxième liste déroulante
    select2.innerHTML = '';

    // Ajouter de nouvelles options en fonction de la valeur sélectionnée dans la première liste déroulante
    if (select1.value === 'Monastir') {
        addOptions(select2,[
    'Bekalta', 'Jemmal', 'Khniss', 'Ksar Hellal', 'Ksibet el-Médiouni',
    'Lamta', 'Menzel Ennour', 'Menzel Fersi', 'Menzel Hayet', 'Menzel Kamel',
    'Moknine', 'Monastir', 'Skanes', 'Omran', 'Stah Jabeur', 'R6', 'R10', 'R4', 'Karraiya']);
    } else if (select1.value === 'Sousse') {
        addOptions(select2,[
    'Hammam Sousse', 'Akouda', 'Kalâa Kebira', 'Kalâa Seghira', 'Ezzouhour',
    'Enfidha', 'Bouficha', 'Kondar', 'Sidi Bou Ali', 'Sidi El Hani',
    'Cité Riadh', 'Cité Ennasr', 'Cité Erriadh', 'Cité Sahloul', 'Cité El Wafa',
    'Cité El Habib', 'Cité El Manar', 'Cité El Yasmin', 'Cité El Farhani',
    'Cité El Hana', 'Cité El Inor', 'Cité El Irada', 'Cité El Madina',
    'Cité El Maamoura', 'Cité El Mahrajène', 'Cité El Manar', 'Cité El Mokhtar',
    'Cité El Wifak', 'Cité Ennasr', 'Cité Essalem'
]);
    } else if (select1.value === 'Sfax') {
        addOptions(select2,[
    'Menzel Chaker', 'el matar', 'sokra', 'teniour',
    'El Ain', 'El Amra', 'saltniya', 'el ons', 'ennour', 'el bahri',
    'El Ghrifa', 'El Hencha', 'El Jem', 'El Mahres', 'El Oudiane', 'El Wardane',
    'El Gherissia', 'El Mezzouna', 'El Raha', 'El Thayaat','gargour','bir ali'
]);
    }
    else if(slect1.value === 'Tunis'){
        addOptions(select2,[
    'Ettadhamen-Mnihla', 'La Soukra', 'Ariana', 'El Mourouj', 'Raoued',
    'La Marsa', 'Ben Arous', 'Douar Hichem', 'Le Kram', 'Le Bardo',
    'Radès', 'La Goulette', 'La Manouba', 'Tebourba', 'Mégrine',
    'Den Den', 'Carthage', 'Sidi Bou Saïd']);
    }
}

function addOptions(select, optionsArray) {
    // Ajouter chaque option au menu déroulant
    optionsArray.forEach(function(option) {
        var optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.text = option;
        select.add(optionElement);
    });
}
    function cacherVitesse() {
        document.querySelector('.vitesse').style.display = 'none';
        document.querySelector('input[name="vitesse"]').disabled = true;
    }

    function afficherVitesse() {
        document.querySelector('.vitesse').style.display = 'block';
        document.querySelector('input[name="vitesse"]').disabled = false;
    }
               
                    const dropArea=document.querySelector(".drag-area");
                    dragText=dropArea.querySelector(".upload");
                    button=dropArea.querySelector(".fichier");
                    input=dropArea.querySelector("input");
                    let file;
                     input.addEventListener("change",function(){
                       file=this.files[0];
                       showFile();
                     });
                function showFile() {
        const input = document.getElementById('fileToUpload');
        const dragArea = document.querySelector('.drag-area');
        const uploadText = dragArea.querySelector('.upload');
        const icon = dragArea.querySelector('.icon');
        const button=dragArea.querySelector('button');
        const span=dragArea.querySelector('span');
        input.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Mise à jour du contenu de drag-area avec l'image sélectionnée
                    dragArea.style.backgroundImage = `url('${e.target.result}')`;
                    dragArea.style.backgroundSize = 'cover';
                    dragArea.style.backgroundRepeat = 'no-repeat';
                    dragArea.style.backgroundPosition = 'center';
                    uploadText.style.display = 'none';
                    icon.style.display = 'none';
                    button.style.display = 'none';
                    span.style.display = 'none';   
                };

                reader.readAsDataURL(file);
            }
        });
    }
                    // Sélectionnez l'icône de l'utilisateur et la liste déroulante
                    const userIcon = document.getElementById("userIcon");
                    const userDropdown = document.getElementById("userDropdown");
                
                    // Gestionnaire d'événement pour le clic sur l'icône de l'utilisateur
                    userIcon.addEventListener("click", function() {
                        if (userDropdown.style.display === "block") {
                            userDropdown.style.display = "none";
                        } else {
                            userDropdown.style.display = "block";
                        }
                    });
                
                    // Gestionnaire d'événement pour le clic en dehors de la liste déroulante
                    document.addEventListener("click", function(event) {
                        if (event.target !== userIcon && event.target !== userDropdown) {
                            userDropdown.style.display = "none";
                        }
                    });
                    const enregistrerButton = document.querySelector(".enregistrer");
                    enregistrerButton.addEventListener("click", function() {
                  if (file === undefined) {
                  alert("Veuillez choisir une image avant de publier.");
                 return; // Annuler l'action si la zone est vide
                  }
                
                });
                </script>
                
            </div>
            <section>
                <div class="container-footer w-container">
                  <div class="w-row">
                    <div class="footer-column w-clearfix w-col w-col-4"><img src="images/logo.png" alt="" width="100px" height="120px" class="failory-logo-image">
                      <h3 class="footer-failory-name">GoGreen</h3>
                      <p class="footer-description-failory">site de location des moyens de transports verts<br></p>
                    </div>
                    <div class="footer-column w-col w-col-8">
                      <div class="w-row">
                        <div class="w-col w-col-8">
                          <div class="w-row">
                            <div class="w-col w-col-7 w-col-small-6 w-col-tiny-7">
                              <h3 class="footer-titles">Liens rapides</h3>
                              <p class="footer-links"><a href="acceuil.html" target="_blank"><span class="footer-link">Acceuil<br></span></a><a href="about.html"><span class="footer-link">Apropos de nous<br></span></a><a href="locations.html"><span class="footer-link">Locations</span></a><span><br></span><a href="contact.html"><span class="footer-link">Contacts<br></span></a>
                            </div>
                            <div class="w-col w-col-5 w-col-small-6 w-col-tiny-5">
                              <h3 class="footer-titles">Contacter</h3>
                              <p class="footer-links">
                                <p style="color: #FFFFFF;font-size: 17px;position: absolute;top:42px;padding-bottom: 2px;"><i class="fa fa-map-marker-alt me-3"></i><span class="footer-link" style="font-size: 4rem;"></span> 5000 Monastir</p><p style="color: #FFFFFF;font-size: 17px;"><i class="fa fa-phone-alt me-3"></i><span class="footer-link">+216 73 541489<br></span></p><p style="color: #FFFFFF;font-size: 17px;"><span class="footer-link"></span></p><p style="color: #FFFFFF;font-size: 17px;"><i class="fa fa-envelope me-3"></i><span class="footer-link">GoGreen@gmail.com<br></span></p>
                            </div>
                          </div>
                        </div>
                        <div class="column-center-mobile w-col w-col-4">
                          <h3 class="footer-titles">abonnéz nous </h3><a href="" target="_blank" class="footer-social-network-icons w-inline-block"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbf0a2f2b67e3b3ba079c_Twitter%20Icon.svg" width="20" alt="Twitter icon"></a><a href="" target="_blank" class="footer-social-network-icons w-inline-block"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbfe70fcf5a0514c5b1da_Instagram%20Icon.svg" width="20" alt="Instagram icon"></a><a href="" target="_blank" class="footer-social-network-icons w-inline-block"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbe42e1e6034fdaba46f6_Facebook%20Icon.svg" width="20" alt="Facebook Icon"></a><a href="" target="_blank" class="footer-social-network-icons w-inline-block"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dc0002f2b676eb4ba0869_LinkedIn%20Icon.svg" width="20" alt="LinkedIn Icon"></a><a href="" target="_blank" class="footer-social-network-icons w-inline-block"><img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dc0112f2b6739c9ba0871_Pinterest%20Icon.svg" width="20" alt="Pinterest Icon" class=""></a>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>   
                
  
    </body>
</html>