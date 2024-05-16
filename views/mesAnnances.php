<?php
session_start();
include_once '../entities/vehicule.php';
$vehicule=new vehicule();
$pdo=new PDO("mysql:host=localhost;dbname=gogreen","root","");
$vehicules=$vehicule->findAllByCin($pdo,$_SESSION['cin']);
echo "<script>console.log('aaaa');</script>";
echo "<script> const carac=document.querySelectorAll('.carac');
const cart=document.querySelector('.cart');
const closeCart=document.querySelector('#close-cart');
const overlay = document.querySelector('.overlay'); 
 carac.forEach(c=>{
   c.addEventListener('click', function(event) {
       cart.classList.add('activeCart');
       overlay.style.display = 'block';
       var button=event.target;
       var parentArt = button.closest('.art');
      

if (parentArt) {
   var infoMElement = parentArt.querySelector('.infoM');
    var title = infoMElement.innerText;
    var prix=parentArt.querySelector('prix');
    var imgElement=parentArt.querySelector('img');
    var img=imgElement.src;
    addProductToCart(img,title,prix);
    document.querySelector('form').submit();
}
});
});
function addProductToCart(img,title,prix){
   var cartShopBox=document.createElement('div');
   var cartItems=document.getElementsByClassName('cart-content')[0 ];
   var  carItemsNames=cartItems.getElementsByClassName('cart-product-title');
   
}

function supprimerArticle(elementIndex) {
 // Vous pouvez utiliser elementIndex pour cibler l'élément que vous souhaitez supprimer

 // Assurez-vous d'ajuster le sélecteur en fonction de votre structure HTML
 document.querySelectorAll('.images')[elementIndex].remove();
}

// Fonction pour obtenir l'index de l'élément actuel
function getIndex(element) {
 var index = 0;
 while ((element = element.previousElementSibling) != null) {
     index++;
 }
 return index;
}

document.querySelectorAll('.btn-supprimer').forEach(function (button) {
 button.addEventListener('click', function () {
     // Obtenir l'index de l'élément parent de ce bouton
     var elementIndex = getIndex(this.parentElement.parentElement.parentElement);
     // Appeler la fonction de suppression avec l'index
     supprimerArticle(elementIndex);
     overlay.style.display = 'none';
 });
});

</script>";
 
if((isset($_POST['caracteristique'])) ){
    echo "<script>console.log('aaaa');</script>";
    
    if((isset($_POST['article_id']))){
        $idVehicule=$_POST['article_id'];
       $caracteristiqueVehi=$vehicule->findByID($pdo,$idVehicule);

}}
?>
<html>  
<head>
    <link rel="stylesheet" href="footerStyle.css">
    <link rel="stylesheet" href="navbarStyle.css">
    <link rel="stylesheet" href="locationsSteps1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;800&family=Inter:wght@900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;800;900&family=Inter:wght@900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;800;900&family=Inter:wght@900&family=Roboto:wght@100;300&display=swap"
        rel="stylesheet">
</head>

<body>
    
    <header>
        <div class="overlay"></div>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo" style="text-decoration: none;">GoGreen</a>
        <nav class="navbar">
            <a href="acceuil.html" style="text-decoration: none;">Acceuil</a>
            <a href="about.html" style="text-decoration: none;">A propos</a>
            <a href="locations.html" style="text-decoration: none;">Locations</a>
            <a href="contact.html" style="text-decoration: none;">Contact</a>

        </nav>
        <div class="user-menu">
            <div class="user-icon">
                <i class="fa-solid fa-bell"></i>
                <i class="fas fa-user small-icon" id="userIcon"></i>
              
            </div>
            <div class="dropdown-content" id="userDropdown">
                <a href="profil.html">
                    <i class="fas fa-user fa-xs"></i>Profil
                </a>
                <a href="tableau.html">
                    <i class="fas fa-table-list fa-xs"></i>Tableau de Bord</a>
                  
                <a href="login.html">
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
        <div class="cart">
            <div class="cart-content">
                <div class="img-titre">
                    <!-- <?php   
                     foreach ($caracteristiqueVehi as $v) {
                    $imageData = base64_encode($v['image']);
                     $extension = pathinfo($v['image'], PATHINFO_EXTENSION);
                    $mime = ($extension == 'png') ? 'image/png' : 'image/jpeg'; 
                     echo '<img src="data:image/jpeg;base64,' . $imageData . '" width="90px" heigth="90px" class="img-cart">';
                     }?> -->
                    
                    <div class="titre-cart"> 
                        <!-- <?php foreach ($caracteristiqueVehi as $v) {
                                       echo $v['titre'];
                                         }?> -->
                        <br>
                        - <span class="Nonelectrique-cart">NonÉlectrique</span>
                    </div>
                </div>
                <div class="carac-modele">
                    <p style="padding:30px 5px ; padding-bottom:15px;color:#0b5541;font-size: 16; font-family: 'Montserrat', 'Helvetica', 'Arial', sans-serif;">caracteristique du modèle</p>
                    <div class="couleur-modele">
                       <p class="labels">couleur du modele </p>
                       <div class="labels" id="couleur">
                        <!-- <?php foreach ($caracteristiqueVehi as $v) {
                                       echo $v['couleur'];
                                         }?> -->
                                         </div>
                    </div>
                    <div class="vitesse-max-modele">
                        <p class="labels"><i class="fas fa-tachometer-alt" style="padding-right:3px;"></i>vitesse maximale </p>
                        <div class="labels" id="vitesse">
                            <!-- <?php foreach ($caracteristiqueVehi as $v) {
                                       echo $v['vitesse'];
                                         }?> -->
                                         </div>
                    </div> 
                    <div class="adresse-exact-modele">
                        <p class="labels"><i class="fas fa-map-marker-alt" style="padding-right:3px;"></i>adresse exacte </p>
                        <div class="labels" id="adresse">
                            <!-- <?php foreach ($caracteristiqueVehi as $v) {
                                       echo $v['adresseExacte'];
                                         }?> -->
                                         </div>
                    </div> 
                    <div class="equip-modele">
                        <p class="labels"><i class="fas fa-cogs" style="padding-right:3px;" ></i>Equipement inclus </p>
                        <div class="labels" id="equips">
                            <!-- <?php foreach ($caracteristiqueVehi as $v) {
                                       echo $v['equipement'];
                                         }?> -->
                                         </div>
                    </div> 
                    
                </div>
                <i class="fas fa-times" id="close-cart"></i>
            </div>
        </div>
        
    </header>
    <section>    
        <div class="form-step active">
                <div style="width:500px">
                  <p style="padding:130px 40px 0 50px;  font-size: 40px;
                   color:#2B3940;">Mes Annances </p>
                </div>
                <div class="mat-panier">
                    <div class="materiel">
                        <div class="materiels">
                          <?php 
                            foreach ($vehicules as $v) {
                                if($v['vitesse']=="normal"){
                                    $imageData = base64_encode($v['image']);
                                    $extension = pathinfo($v['image'], PATHINFO_EXTENSION);

                                  // Déterminez le type MIME en fonction de l'extension
                                  $mime = ($extension == 'png') ? 'image/png' : 'image/jpeg';
                           echo '
                          <div class="gallery">
                          <div class="images">
                             <div class="art">
                             <form action="modifierAnnace.php" method="post">
                             <input type="hidden" name="article_id" value="'.$v['idVehicule'].'">
                                <img src="data:image/jpeg;base64,' . $imageData . '" width="260px" height="200px" class="img-product" >
                                <p class="infoM">'.$v['titre'].' - <span class="Nonelectrique">-Non Électrique</span></p>
                                <div class="prix-carac">
                                 <button type="button" class="carac" name="caracteristique"> voir les caracteristiques</button>
                                 <p class="prix">'.$v['prix'].'dt/h</p>
                                </div>
                                <div class="btt">
                                 <i  class="iconP"></i>
                                 <button type="button" class="btn-modifier" onclick="window.location.href = "modifierAnnance.html"">MODIFIER</button>
                                 <button type="button" class="btn-supprimer1" data-bs-toggle="modal" data-bs-target="#myModal1">SUPPRIMER</button>
                               <div class="modal" id="myModal1">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                        <h4 class="modal-title">confirmation de suppresion </h4>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                               </div>
                                      <div class="modal-body">
                                         Êtes-vous sûr de vouloir supprimer votre article?
                                      </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">anuuler</button>
                                          <button type="button" class="btn-supprimer" data-bs-toggle="modal" data-bs-target="#myModal" onclick="supprimerArticle(14)">SUPPRIMER</button>
                                        
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             </form>
                          </div>
                             </div>
                         </div>
                          '  ;}
                          else {
                            $imageData = base64_encode($v['image']);
                            $extension = pathinfo($v['image'], PATHINFO_EXTENSION);
                            $mime = ($extension == 'png') ? 'image/png' : 'image/jpeg';
                            echo '
                            <div class="gallery">
                            <div class="images">
                               <div class="art">
                               <form action="" method="post">
                               <input type="hidden" name="article_id" value="'.$v['idVehicule'].'">
                                  <img src="data:image/jpeg;base64,' . $imageData . '" width="260px" height="200px" class="img-product" >
                                  <p class="infoM">'.$v['titre'].' - <span class="electrique"><i class="fas fa-bolt"></i>- Électrique</span></p>
                                  <div class="prix-carac">
                                   <button type="submit" class="carac" name="caracteristique"> voir les caracteristiques</button>
                                   <p class="prix">'.$v['prix'].'dt/h</p>
                                  </div>
                                  </form>
                                  <div class="btt">
                                   <i  class="iconP"></i>
                                   <form action="../views/modifierAnnance.php" method="post">
                                   <input type="hidden" name="article_id" value="'.$v['idVehicule'].'">
                                   <button type="submit" name="modifier" class="btn-modifier">MODIFIER</button>
                                   <button type="button" class="btn-supprimer1" data-bs-toggle="modal" data-bs-target="#myModal1">SUPPRIMER</button>
                                   </form>
                                   <div class="modal" id="myModal1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                           <div class="modal-header">
                                          <h4 class="modal-title">confirmation de suppresion </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                 </div>
                                        <div class="modal-body">
                                           Êtes-vous sûr de vouloir supprimer votre article?
                                        </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">anuuler</button>
                                            <button type="button" class="btn-supprimer" data-bs-toggle="modal" data-bs-target="#myModal" onclick="supprimerArticle(14)">SUPPRIMER</button>
                                          
                                           </div>
                                       </div>
                                   </div>
                               </div>
                             
                            </div>
                               </div>
                           </div>
                            '  ;
                          }
                          }?>
                            
                           
                           
                            </div>
                        </div>
                    </div>
                    <div class="bttn">
                        <button type="button" class="btn-Retour" onclick="window.location.href = 'tableau.html'">Retour</button>
                        
                    </div>
                    </div> 
                
                      <section>
                    <div class="container-footer w-container" style="width: 1300px;padding-left: 0px;margin-left: 0px;position:absolute;left:-10px;padding-top: 100px;margin-top: 150px; ">
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
                                  <p class="footer-links" ><a href="acceuil.html" target="_blank" style="text-decoration: none;"><span class="footer-link">Acceuil<br></span></a><a href="about.html" style="text-decoration: none;"><span class="footer-link">Apropos de nous<br></span></a><a href="locations.html" style="text-decoration: none;"><span class="footer-link">Locations</span></a><span><br></span><a href="contact.html" style="text-decoration: none;"><span class="footer-link">Contacts<br></span></a>
                                </div>
                                <div class="w-col w-col-5 w-col-small-6 w-col-tiny-5">
                                  <h3 class="footer-titles">Contacter</h3>
                                  <p class="footer-links">
                                    <p style="color: #FFFFFF;font-size: 17px;position: absolute;top:50px;padding-bottom: 2px;"><i class="fa fa-map-marker-alt me-3"></i><span class="footer-link"  style="font-size: 0.9rem;"></span> 5000 Monastir</p><p style="color: #FFFFFF;font-size: 17px;position: absolute;top:75px;"><i class="fa fa-phone-alt me-3"></i><span class="footer-link">+216 73 541489<br></span></p><p style="color: #FFFFFF;font-size: 17px;"><span class="footer-link"></span></p><p style="color: #FFFFFF;font-size: 17px;position: absolute;top:100px;"><i class="fa fa-envelope me-3"></i><span class="footer-link">GoGreen@gmail.com<br></span></p>
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
                  </div>
                
                </div>
            </div>
      
    </section>
    
    <script>
       

       
//  const carac=document.querySelectorAll('.carac');
//  const cart=document.querySelector('.cart');
//  const closeCart=document.querySelector('#close-cart');
//  const overlay = document.querySelector('.overlay'); 
//   carac.forEach(c=>{
//     c.addEventListener('click', function(event) {
//         cart.classList.add("activeCart");
//         overlay.style.display = 'block';
//         var button=event.target;
//         var parentArt = button.closest('.art');
       

// if (parentArt) {
//     var infoMElement = parentArt.querySelector('.infoM');
//      var title = infoMElement.innerText;
//      var prix=parentArt.querySelector('prix');
//      var imgElement=parentArt.querySelector('img');
//      var img=imgElement.src;
//      addProductToCart(img,title,prix);
//      document.querySelector('form').submit();
// }
// });
// });
// function addProductToCart(img,title,prix){
//     var cartShopBox=document.createElement("div");
//     var cartItems=document.getElementsByClassName('cart-content')[0 ];
//     var  carItemsNames=cartItems.getElementsByClassName('cart-product-title');
    
// }
// closeCart.addEventListener('click', function(event){
//        cart.classList.remove("activeCart");
//        overlay.style.display = 'none';
// });
// function supprimerArticle(elementIndex) {
//         // Vous pouvez utiliser elementIndex pour cibler l'élément que vous souhaitez supprimer
//         // Par exemple, si vos éléments ont une classe "images", vous pouvez utiliser document.querySelectorAll(".images")[elementIndex].remove();
//         // Assurez-vous d'ajuster le sélecteur en fonction de votre structure HTML
//         document.querySelectorAll(".images")[elementIndex].remove();
//     }

//     // Fonction pour obtenir l'index de l'élément actuel
//     function getIndex(element) {
//         var index = 0;
//         while ((element = element.previousElementSibling) != null) {
//             index++;
//         }
//         return index;
//     }

//     // Associer la fonction de suppression au clic sur le bouton "SUPPRIMER"
//     document.querySelectorAll('.btn-supprimer').forEach(function (button) {
//         button.addEventListener('click', function () {
//             // Obtenir l'index de l'élément parent de ce bouton
//             var elementIndex = getIndex(this.parentElement.parentElement.parentElement);
//             // Appeler la fonction de suppression avec l'index
//             supprimerArticle(elementIndex);
//             overlay.style.display = 'none';
//         });
//     });


 </script>
</body>

</html>