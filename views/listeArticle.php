<?php 
if (session_status() == PHP_SESSION_NONE) { 
    session_start();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../views/footerStyle.css">
    <link rel="stylesheet" type="text/css" href="../views/navbarStyle.css">
    <link rel="stylesheet" type="text/css" href="../views/locationsSteps.css">
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>
    
     <header>
        <div class="overlay"></div>
        <input type="checkbox" name="" id="toggler">
         <label for="toggler" class="fas fa-bars"></label>
              <a href="#" class="logo">GoGreen</a>
                <nav class="navbar">
                   <a href="#">Acceuil</a>
                   <a href="#">A propos</a>
                   <a href="#">Locations</a>
                   <a href="#">Contact</a>
                </nav>
                <div class="user-menu">
                      <div class="user-icons">
                          <i class="fa-solid fa-bell" id="notificationsIcon"></i>
                          <i class="fas fa-user small-icon" id="userIcon"></i><span class="nbNotification">4</span>
                      </div>
                      <div class="dropdown-content" id="userDropdown">
                        <a href="profil.html">
                            <i class="fas fa-user fa-xs"></i>Profil
                        </a>
                        <a href="tableau.html">
                            <i class="fas fa-table-list fa-xs"></i>Tableau de Bord</a>
                          
                        <a href="#" onclick="openDialogDeconnexion()">
                            <i class="fa-solid fa-right-from-bracket"></i>Se Déconnecter</a>
                           
                          <a href="#" id="deleteLink" onclick="openDialogButtonClick()">
                            <span>🗑️</span>Supprimer compte
                        </a>
                      </div>
                      <div class="dropdown-notifications" id="dropdown-notifications">
                        <div class="notifi-item">
                          <div class="texto-image">
                            <img src="../views/images/velo1.jpeg" alt="img" width="50px" height="50px">
                            <div class="text">
                              <p><span>mohamed rekik</span>
                              vous demande de louez votre vehicule <span>vélo électrique</span></p>
                              <div class="buttonsAccept">
                                <button class="accept">accepter</button>
                                <button class="refuser">refuser</button>
                               </div>
                            </div>
                          </div>
                        </div>
                        <div class="notifi-item">
                          <div class="texto-image">
                            <img src="../views/images/trot1.jpeg" alt="img" width="50px" height="50px">
                            <div class="text">
                              <p><span>Zeineb chekir</span>
                              vous demande de louez votre vehicule <span>Trotinnette normal </span></p>
                              <div class="buttonsAccept">
                                <button class="accept">accepter</button>
                                <button class="refuser">refuser</button>
                               </div>
                            </div>
                          </div>
                        </div>
                        <div class="notifi-item">
                          <div class="texto-image">
                         <img src="../views/images/velo1.jpeg" alt="img" width="50px" height="50px">
                          <div class="text">
                            <p><span>sami zrigui</span>
                             a accepter votre demande pour la location de <span>vélo electrique.</span>Voici son numéro de téléphone <span>28 033 556</span></p>
                          </div>
                        </div>
                       </div>
                       <div class="notifi-item">
                        <div class="texto-image">
                       <img src="../views/images/velo1.jpeg" alt="img" width="50px" height="50px">
                        <div class="text">
                          <p><span>sami zrigui</span>
                           a refusé votre demande pour la location de <span>vélo electrique.</span></p>
                        </div>
                      </div>
                     </div>
                     </div>
                     
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
                        <dialog class="DeconnexionDialog" id="DeconnexionDialog">
                          <div class="delete-dialog-container">
                              <p>Êtes-vous sûr de vouloir déconnecter de votre compte ?</p>
                      
                              <div class="dialog-buttons">
                                  <button class="dialog-button cancel-button" onclick="cancelButtonClick()">
                                      Annuler
                                  </button>
                                  <button class="dialog-button delete-button" onclick="loginButtonClick()">
                                      déconnecter
                                  </button>
                              </div>
                          </div>
                      </dialog>
                      <div class="popup" id="popup">
                        <img src="../views/images/checkmark.jpeg">
                        <h2>Merci!</h2>
                        <p>Votre commande a été correctement transmise aux propriétaires en attente de leur approbation.</p>
                        <p>Vous allez recevoir une notification dés que votre demande sera accépté</p>
                        <button type="button" onclick="closePopup()">OK</button>
                      </div>
                      

                </div>
                <div class="cart">
                    <div class="cart-content">
                        <div class="img-titre">
                            <img src="../views/images/velo1.jpeg" width="90px" heigth="90px" class="img-cart">
                            <div class="titre-cart"> 
                                Vélo électrique Premium <br>
                                - <span class="Nonelectrique-cart">NonÉlectrique</span>
                            </div>
                        </div>
                        <div class="carac-modele">
                            <p style="padding:30px 5px ; padding-bottom:15px;color:#0b5541;font-size: 16; font-family: 'Montserrat', 'Helvetica', 'Arial', sans-serif;">caracteristique du modèle</p>
                            <div class="couleur-modele">
                               <p class="labels">couleur du modele </p>
                               <div class="labels" id="couleur">jaune</div>
                            </div>
                            <div class="vitesse-max-modele">
                                <p class="labels"><i class="fas fa-tachometer-alt" style="padding-right:3px;"></i>vitesse maximale </p>
                                <div class="labels" id="vitesse">180klm/h</div>
                            </div> 
                            <div class="adresse-exact-modele">
                                <p class="labels"><i class="fas fa-map-marker-alt" style="padding-right:3px;"></i>adresse exacte </p>
                                <div class="labels" id="adresse">rue mohamed jammousi skanes monastir </div>
                            </div> 
                            <div class="equip-modele">
                                <p class="labels"><i class="fas fa-cogs" style="padding-right:3px;" ></i>Equipement inclus </p>
                                <div class="labels" id="equips">panier<br>Feux arrière<br>
                                    Feux avant<br>
                                    Porte bagage</div>
                            </div> 
                            
                        </div>
                        <i class="fas fa-times" id="close-cart"></i>
                    </div>
                </div>

    </header>
    <section>
        <form class="form" action="../controllers/listeArticleController.php" method="post"> 
        <div class="form-step active">
                <div style="width:500px">
                  <p style="padding-top:70px;  font-size: 40px;
                   color:#2B3940;">Materiel disponible </p>
                </div>
                <div class="mat-panier">
                    <div class="materiel">
                        <div class="buttons">
                            <button type="button" name="velos" class="btn-velo"><img src="../views/images/velo.png" width="30px" height="40px" style="margin-left:2px;">Vélo</button>
                            <button type="button" class="btn-trottinette"><img src="../views/images/trotinette.png" width="30px" height="40px">Trottinette</button>
                            <button type="button" class="btn-voiture"><img src="../views/images/voiture.png" width="30px" height="40px">Voiture</button>
                            <button type="button" class="btn-chaussuresRoue"><img src="../views/images/chaussure-roue.png" width="30px" height="40px">Chaussure a roulette</button>
                        </div>
                        <div class="sub-buttons" id="sub-buttons">
                        </div>
                       
                        <div class="materiels">
                          <div  id="tous-velos" class="affich">
                            <div class="gallery"> <?php  foreach ($vehicules as $vehicule) {
                                 echo $vehicule["idVehicule"]." ".$vehicule["titre"]." ".$vehicule["couleur"]." ".$vehicule["categorie"];
                                      }?>
                             <!-- <div class="images">
                                <div class="art">
                                    <div class="proprietaire">
                                        <img src="../views/images/profil.png" width="30px" heigth="40px">
                                        <div class="prop">zeineb chekir</div> 
                                    </div>
                                   <img src="../views/images/velo1.jpeg" width="260px" height="200px" class="img-product" >
                                   <p class="infoM"> Vélo électrique Homme premium - VTC/Randonnées - <span class="electrique"><i class="fas fa-bolt"></i>-Électrique</span></p>
                                   <div class="prix-carac">
                                    <button type="button" class="carac"> voir les caracteristiques</button>
                                    <p class="prix">3dt/h</p>
                                   </div>
                                   <div class="ajouter">
                                    <i class="fas fa-shopping-cart" class="iconP"></i>
                                    <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                   </div>
                                </div>
                            </div>
                            <div class="images">
                                <div class="art">
                                    <div class="proprietaire">
                                        <img src="../views/images/profil.png" width="30px" heigth="40px">
                                        <div class="prop">zeineb chekir</div> 
                                    </div>
                                   <img src="../views/images/velo2.jpg" width="260px" height="200px" class="img-product" >
                                   <p  class="infoM"> Vélo électrique Homme  -<span class="Nonelectrique">nonElectrique</span></p>
                                   <div class="prix-carac">
                                    <button type="button" class="carac"> voir les caracteristiques</button>
                                    <p class="prix">3dt/h</p>
                                   </div>
                                   <div class="ajouter">
                                    <i class="fas fa-shopping-cart" class="iconP"></i>
                                    <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                   </div>
                                </div>
                            </div>   
                            <div class="images">
                                <div class="art">
                                    <div class="proprietaire">
                                        <img src="../views/images/profil.png" width="30px" heigth="40px">
                                        <div class="prop">zeineb chekir</div> 
                                    </div>
                                   <img src="../views/images/velo3.jpeg" width="260px" height="200px" class="img-product" >
                                   <p class="infoM"> Vélo electrique femme  - <span class="Nonelectrique">NonÉlectrique</span></p>
                                   <div class="prix-carac">
                                    <button type="button" class="carac"> voir les caracteristiques</button>
                                    <p class="prix">3dt/h</p>
                                   </div>
                                   <div class="ajouter">
                                    <i class="fas fa-shopping-cart" class="iconP"></i>
                                    <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                   </div>
                                </div> 
                            </div> -->
                                 
                          </div>
                        </div>
                        <div id="velos-elect"  class="affich">
                            <div  class="gallery">
                                <div class="images">
                                    <div class="art">
                                        <div class="proprietaire">
                                            <img src="../views/images/profil.png" width="30px" heigth="40px">
                                            <div class="prop">zeineb chekir</div> 
                                        </div>
                                       <img src="../views/images/velo1.jpeg" width="260px" height="200px" class="img-product" >
                                       <p class="infoM"> Vélo en bonne etat - <span class="electrique"><i class="fas fa-bolt"></i>-Électrique</span></p>
                                       <div class="prix-carac">
                                        <button type="button" class="carac"> voir les caracteristiques</button>
                                        <p class="prix">3dt/h</p>
                                       </div>
                                       <div class="ajouter">
                                        <i class="fas fa-shopping-cart" class="iconP"></i>
                                        <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="velos-simple" class="affich">    
                            <div  class="gallery" >
                                <div class="images">
                                    <div class="art">
                                        <div class="proprietaire">
                                            <img src="../views/images/profil.png" width="30px" heigth="40px">
                                            <div class="prop">zeineb chekir</div> 
                                        </div>
                                       <img src="../views/images/velo2.jpg" width="260px" height="200px" class="img-product" >
                                       <p  class="infoM"> Vélo electric -<span class="Nonelectrique">nonElectrique</span></p>
                                       <div class="prix-carac">
                                        <button type="button" class="carac"> voir les caracteristiques</button>
                                        <p class="prix">3dt/h</p>
                                       </div>
                                       <div class="ajouter">
                                        <i class="fas fa-shopping-cart" class="iconP"></i>
                                        <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                       </div>
                                    </div>
                                </div>   
                                <div class="images">
                                    <div class="art">
                                        <div class="proprietaire">
                                            <img src="../views/images/profil.png" width="30px" heigth="40px">
                                            <div class="prop">moahmed jbeli</div> 
                                        </div>
                                       <img src="../views/images/velo3.jpeg" width="260px" height="200px" class="img-product" >
                                       <p class="infoM"> Vélo normale- <span class="Nonelectrique">NonÉlectrique</span></p>
                                       <div class="prix-carac">
                                        <button type="button" class="carac"> voir les caracteristiques</button>
                                        <p class="prix">3dt/h</p>
                                       </div>
                                       <div class="ajouter">
                                        <i class="fas fa-shopping-cart" class="iconP"></i>
                                        <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                       </div>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                            <div id="tous-trot" class="affich">
                                <div  class="gallery" >
                                    <div class="images">
                                        <div class="art">
                                            <div class="proprietaire">
                                                <img src="../views/images/profil.png" width="30px" heigth="40px">
                                                <div class="prop">senda kammoun</div> 
                                            </div>
                                           <img src="../views/images/trot1.jpeg" width="260px" height="200px" class="img-product" >
                                           <p  class="infoM"> trotinette normale -<span class="Nonelectrique">nonElectrique</span></p>
                                           <div class="prix-carac">
                                            <button type="button" class="carac"> voir les caracteristiques</button>
                                            <p class="prix">3dt/h</p>
                                           </div>
                                           <div class="ajouter">
                                            <i class="fas fa-shopping-cart" class="iconP"></i>
                                            <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                           </div>
                                        </div>
                                    </div>   
                                    <div class="images">
                                        <div class="art">
                                            <div class="proprietaire">
                                                <img src="../views/images/profil.png" width="30px" heigth="40px">
                                                <div class="prop">senda kammoun</div> 
                                            </div>
                                           <img src="../views/images/trot2.jpg" width="260px" height="200px" class="img-product">
                                           <p class="infoM"> trotinette en bonne etat - <span class="Nonelectrique">NonÉlectrique</span></p>
                                           <div class="prix-carac">
                                            <button type="button" class="carac"> voir les caracteristiques</button>
                                            <p class="prix">3dt/h</p>
                                           </div>
                                           <div class="ajouter">
                                            <i class="fas fa-shopping-cart" class="iconP"></i>
                                            <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                           </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div id="trot-elect" class="affich">
                                <div  class="gallery" >
                                    <div class="images">
                                        <div class="art">
                                            <div class="proprietaire">
                                                <img src="../views/images/profil.png" width="30px" heigth="40px">
                                                <div class="prop">zeineb chekir</div> 
                                            </div>
                                           <img src="../views/images/trot1.jpeg" width="260px" height="200px" class="img-product">
                                           <p  class="infoM"> trotinette électrique<span class="Nonelectrique">nonElectrique</span></p>
                                           <div class="prix-carac">
                                            <button type="button" class="carac"> voir les caracteristiques</button>
                                            <p class="prix">3dt/h</p>
                                           </div>
                                           <div class="ajouter">
                                            <i class="fas fa-shopping-cart" class="iconP"></i>
                                            <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                           </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="trot-simple" class="affich">
                                <div  class="gallery" >
                                    <div class="images">
                                       <div class="art">
                                        <div class="proprietaire">
                                            <img src="../views/images/profil.png" width="30px" heigth="40px">
                                            <div class="prop">zeineb chekir</div> 
                                        </div>
                                           <img src="../views/images/trot2.jpg" width="260px" height="200px" class="img-product" >
                                           <p class="infoM"> Vtrotinette noir- <span class="Nonelectrique">NonÉlectrique</span></p>
                                            <div class="prix-carac">
                                                <button type="button" class="carac"> voir les caracteristiques</button>
                                           <p class="prix">5.5dt/h</p>
                                            </div>
                                            <div class="ajouter">
                                            <i class="fas fa-shopping-cart" class="iconP"></i>
                                            <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div id="tout-chauss" class="affich">
                                <div  class="gallery" >
                                    <div class="images">
                                        <div class="art">
                                            <div class="proprietaire">
                                                <img src="../views/images/profil.png" width="30px" heigth="40px">
                                                <div class="prop">zeineb chekir</div> 
                                            </div>
                                           <img src="../views/images/chau1.jpeg" width="260px" height="200px" class="img-product">
                                           <p class="infoM"> chaussures a roulette- <span class="Nonelectrique">NonÉlectrique</span></p>
                                           <div class="prix-carac">
                                            <button type="button" class="carac"> voir les caracteristiques</button>
                                            <p class="prix">3dt/h</p>
                                           </div>
                                           <div class="ajouter">
                                            <i class="fas fa-shopping-cart" class="iconP"></i>
                                            <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                           </div>
                                        </div> 
                                    </div>
                                    <div class="images">
                                        <div class="art">
                                            <div class="proprietaire">
                                                <img src="../views/images/profil.png" width="30px" heigth="40px">
                                                <div class="prop">zeineb chekir</div> 
                                            </div>
                                           <img src="../views/images/chau2.jpeg" width="260px" height="200px" class="img-product">
                                           <p class="infoM"> chaussure a roues - <span class="Nonelectrique">NonÉlectrique</span></p>
                                           <div class="prix-carac">
                                            <button type="button" class="carac"> voir les caracteristiques</button>
                                            <p class="prix">2dt/h</p>
                                           </div>
                                           <div class="ajouter">
                                            <i class="fas fa-shopping-cart" class="iconP"></i>
                                            <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                           </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div id="tous-voit" class="affich">
                                <div  class="gallery" >
                                    <div class="images">
                                        <div class="art">
                                            <div class="proprietaire">
                                                <img src="../views/images/profil.png" width="30px" heigth="40px">
                                                <div class="prop">zeineb chekir</div> 
                                            </div>
                                           <img src="../views/images/voit1.jpeg" width="100%" height="200px" class="img-product" >
                                           <p class="infoM"> voiture electrique- <span class="Nonelectrique">NonÉlectrique</span></p>
                                           <div class="prix-carac">
                                            <button type="button" class="carac"> voir les caracteristiques</button>
                                            <p class="prix">7dt/h</p>
                                           </div>
                                           <div class="ajouter">
                                            <i class="fas fa-shopping-cart" class="iconP"></i>
                                            <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                           </div>
                                        </div> 
                                    </div>
                                    <div class="images">
                                        <div class="art">
                                            <div class="proprietaire">
                                                <img src="../views/images/profil.png" width="30px" heigth="40px">
                                                <div class="prop">zeineb chekir</div> 
                                            </div>
                                           <img src="../views/images/voit2.jpg" width="100%" height="200px" class="img-product">
                                           <p class="infoM"> voiture smart </p>
                                           <div class="prix-carac">
                                            <button type="button" class="carac"> voir les caracteristiques</button>
                                            <p class="prix">8dt/h</p>
                                           </div>
                                           <div class="ajouter">
                                            <i class="fas fa-shopping-cart" class="iconP"></i>
                                            <button type="button" class="btn-ajoutPanier">AJOUTER AU PANIER</button>
                                           </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="panier">
                      <div class="titre">
                        <p style="font-family: 'Montserrat','Helvetica','Arial',sans-serif;font-weight: 700;font-size: 18px;">votre commande</p>
                        <img src="../views/images/panier.png" width="40px" height="50px">
                      </div>
                    <div class="loc">
                        <div class="gener">
                            <div class="infoLoc">
                                <div class="gouvernerat" id="gouvernerat"><?php echo $_SESSION['gouvernerat'];?></div>
                                <div class="ville" id="ville"><?php echo $_SESSION['ville'];?></div>
                            </div>
                            <div class="infoDate">
                                <div id="dateDep"><?php echo $_SESSION['dateretrait'];?></div>
                                <div id="dateArriv"><?php echo $_SESSION['datedepot'];?> </div>
                            </div>
                            <div class="nbHeure" id="nbHeure"><?php echo 'soit '.$_SESSION['nbrHeure'].' heures de location';?></div>
                        </div>
                        <div id="cartItem" style="padding-top:20px; font-size: 20px;" class="cartItem">
                        </div>
                        <div class="foot">
                          <p style="color:#078564;font-size: 20px;font-family: 'Montserrat','Helvetica','Arial','sans-serif';font-weight: 700;">TOTAL</p>
                          <p id="total" class="total" style="color:#078564;font-size: 20px;font-family: 'Montserrat','Helvetica','Arial','sans-serif';font-weight: 700;" >0DT</p>
                        </div>
                        <button class="envoyerCarte">VALIDER PANIER</button>
                    </div>
                    </div> 
                    <div class="btn-box" style="z-index:1000; margin-top: 30px; width: 750px;">
                        <button type="button" class="btn-precedent">Retour</button>
                        <p style="font-size:16;color:#2B3940;font-weight:600;">Choisissez les moyens de transport vous conviennent le mieux !</p>
                        <button type="button" class="btn-suivant" id="btn-valider" onclick="envoyerRecap()">Valider</button>
                    </div>
                    
                      <section>
                    <div class="container-footer w-container" style=" width: 1300px;padding-left: 0px;margin-left: 0px;position:absolute;left:-60px;padding-top: 30px;margin-top: 30px;">
                      <div class="w-row">
                        <div class="footer-column w-clearfix w-col w-col-4"><img src="../views/images/logo.png" alt="" width="100px" height="120px" class="failory-logo-image">
                          <h3 class="footer-failory-name">GoGreen</h3>
                          <p class="footer-description-failory">site de location des moyens de transports verts<br></p>
                        </div>
                        <div class="footer-column w-col w-col-8">
                          <div class="w-row">
                            <div class="w-col w-col-8">
                              <div class="w-row">
                                <div class="w-col w-col-7 w-col-small-6 w-col-tiny-7">
                                  <h3 class="footer-titles">Liens rapides</h3>
                                  <p class="footer-links"><a href="" target="_blank"><span class="footer-link">Acceuil<br></span></a><a href=""><span class="footer-link">Apropos de nous<br></span></a><a href=""><span class="footer-link">Locations</span></a><span><br></span><a href=""><span class="footer-link">Contacts<br></span></a>
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
           <div class="form-step">
                <div style="width:800px">
                    <p style="padding-top:70px;  font-size: 40px;
                     color:#2B3940;">Recapitulatif de commande </p>
                </div>
                <div class="localisationEtDate">
                    <div class="titreloc">
                        <p style="padding:15px;">localisation et date de location</p>
                    </div>
                    <div class="localisationRecap">
                        <div class="gouverneratRecap"> </div>
                        <i class="fas fa-exchange"></i>
                        <div class="villeRecap"> </div>
                    </div>
                    <div class="datsRecap">
                        <div class="datRetrait">18</div>
                        <i class="fas fa-arrow-right"></i>
                        <div class="datDepot"> 19</div>
                    </div> 
                    <div class="nbheurLocation"></div>
                </div>
                <div class="ArticleChoisis">
                    <div class="titreArticle">
                        <p style="padding:15px;">Articles choisis</p>
                    </div>
                    <div class="recap-items"></div>
                    <div class="totalRecap">
                        <p>TOTAL</p>
                        <div class="montantRecap"></div>
                    </div>
                </div>
                <div class="btn-box" style="z-index:1000; margin-top: 30px; width: 1000px;">
                    <button type="button" class="btn-precedent">Modifier</button>
                    <p style="font-size:16;color:#2B3940;font-weight:600;">Verifier votre commande et finaliser !</p>
                    <button type="button" class="btnfinal" id="btn-finaliser" onclick="openPopup()">Finaliser</button>
                </div>
                <section>
                    <div class="container-footer w-container" style=" width: 1300px;padding-left: 0px;margin-left: 0px;position:absolute;left:-60px">
                      <div class="w-row">
                        <div class="footer-column w-clearfix w-col w-col-4"><img src="../views/images/logo.png" alt="" width="100px" height="120px" class="failory-logo-image">
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
           
        </form>
    </section>
     <script>
       
        // ======================================Icons=========================================
             
const userIcon = document.getElementById("userIcon");
                    const userDropdown = document.getElementById("userDropdown");
                    const  notificationsIcon= document.getElementById("notificationsIcon");
                    const notifDropdown = document.getElementById("dropdown-notifications");
                    var span=document.querySelector(".nbNotification");
                    // Gestionnaire d'événement pour le clic sur l'icône de l'utilisateur
                    userIcon.addEventListener("click", function() {
                        if (userDropdown.style.display === "block") {
                            userDropdown.style.display = "none";
                        } else {
                            userDropdown.style.display = "block";
                            notifDropdown.style.display = "none";
                           
                        }
                    });
                  
                
                    // Gestionnaire d'événement pour le clic sur l'icône de l'utilisateur
                    notificationsIcon.addEventListener("click", function() {
                        if (notifDropdown.style.display === "block") {
                          notifDropdown.style.display = "none";
                        } else {
                          notifDropdown.style.display = "block";
                          span.style.display="none";
                          userDropdown.style.display = "none";
                           
                        }
                    });
                    
                  //  texto=document.querySelectorAll(".texto-image");
                    btnAccept=document.querySelectorAll(".accept");
                    btnrefuser=document.querySelectorAll(".refuser");
                    item=document.querySelector(".notifi-item");
                    btnAccept.forEach(element => {
                      element.addEventListener("click", function() {
                        const parent=(((element.parentElement).parentElement).parentElement).parentElement;
                        const text=((element.parentElement).parentElement).parentElement;
                        parent.style.backgroundColor="#f1fdf6";
                        text.innerHTML=`<p style="padding:15px 20px 0px 0px;font-size:14px;font-weight: normal;font-family: Arial, Helvetica, sans-serif;">
                         <span style="padding-left:50px;font-weight:600px;font-size:16px;color:black"> 👏 Demande acceptée !!</span><br><span style="  font-weight: 600;color:black;font-size: 14px;">
                            Mohamed rekik</span>
                            prendra contact avec vous pour organiser la récupération du véhicule.Merci de rester joignable.</p> `;

                    });
                    }); 
                    btnrefuser.forEach(element => {
                      element.addEventListener("click", function() {
                        const parent=(((element.parentElement).parentElement).parentElement).parentElement;
                        const text=((element.parentElement).parentElement).parentElement;
                        parent.style.backgroundColor="#fdf1f1";
                      text.innerHTML=`<p style="padding:30px 60px;font-size:14px"> Demande refusée !!</p>`;

                    });
                    });
                    var deleteDialog = document.getElementById("deleteDialog");

   function openDialogButtonClick() {
       if (typeof deleteDialog.showModal === "function") {
           deleteDialog.showModal();
       } else {
           
           console.error("Dialog API is not supported");
       }
   }
   
   function cancelButtonClick() {
       deleteDialog.close();
       loginDialog.close();
   }
   
   function deleteButtonClick() {
    window.location.href = "acceuil.html";
       deleteDialog.close();
   }

   var loginDialog = document.getElementById("DeconnexionDialog");
   function openDialogDeconnexion(){
    if (typeof deleteDialog.showModal === "function") {
      loginDialog.showModal();
       } else {
           
           console.error("Dialog API is not supported");
       }
   }
 function loginButtonClick() {
  window.location.href = "login.html";
     deleteDialog.close();
 }

        const subButtons=document.getElementById("sub-buttons");
        const buttons = document.querySelectorAll('.buttons button');
        const affichs=document.querySelectorAll('.affich');
        const tvelos=document.getElementById('tous-velos');
         buttons.forEach(button => {
        button.addEventListener('click', function() {
        buttons.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
            affichs.forEach(affi=> affi.style.display='none');
        const className = event.target.className;
        var subButtonsArray = [];
        if (className.includes("btn-velo")) { 
            subButtonsArray = ["Tous velos", "velos electriques", "velos Simples"];
        } else if (className.includes("btn-trottinette")) {
            subButtonsArray = ["Tous trottinettes", "trottinette electrique", "trottinette Simple"];
        } else if (className.includes("btn-voiture")) {
            subButtonsArray = ["Tous voiture"];
        } else if (className.includes("btn-chaussuresRoue")) {
            subButtonsArray = ["Tous chaussures à roue"];
        }

        // Créez les balises de bouton à partir du tableau subButtonsArray
        var buttHtml = '';
        subButtonsArray.forEach(subButton => {
           var chaine=subButton.replace(/\s+/g, '');
        
            buttHtml += `<button type="submit" id="${subButton}" name="${chaine}" class="sub-but">${subButton}</button>`;
            
        });
      
        // document.getElementById("sub-buttons").addEventListener("click", function(event) {
//   if (event.target.classList.contains("sub-but")) {
//     // Mettez à jour la valeur du champ caché dans le formulaire avec l'ID du bouton sélectionné
//     // Soumettez automatiquement le formulaire
//     document.getElementById("selectionForm").submit();
//   }
// });

        // Mettez à jour le contenu de l'élément sub-buttons avec les balises de bouton générées
        subButtons.innerHTML = buttHtml;
        const butt = document.querySelectorAll('.sub-but');
       
        const tvelos=document.getElementById('tous-velos');
        const velosElec=document.getElementById('velos-elect');
        const velosSimp=document.getElementById('velos-simple');
        const ttrott=document.getElementById('tous-trot');
        const trottElect=document.getElementById('trot-elect');
        const trottSimple=document.getElementById('trot-simple');
        const tvoitures=document.getElementById('tous-voit');
        const tchauss=document.getElementById('tout-chauss');
        butt.forEach(button => {
        button.addEventListener('click', function() {
        butt.forEach(btn => btn.classList.remove('activebutt'));
        this.classList.add('activebutt');
        const selectedButtonId = this.id; // Utilisez this.id pour récupérer l'ID du bouton
       

affichs.forEach(aff => {
    aff.classList.contains('activaff') && aff.classList.remove('activaff');
});
if (selectedButtonId === "Tous vélos") {
    affichs.forEach(aff => {
    aff.style.display="none";
});
    tvelos.style.display='block';
} else if (selectedButtonId === "vélos Électriques") {
    affichs.forEach(aff => {
    aff.style.display='none';
});
    velosElec.style.display='block';
}
else if (selectedButtonId === "vélos Simples") {
    affichs.forEach(aff => {
    aff.style.display='none';
});
    velosSimp.style.display='block';
}
else if (selectedButtonId === "Tous trottinettes") {
    affichs.forEach(aff => {
    aff.style.display='none';
});
    ttrott.style.display='block';
}
else if (selectedButtonId === "trottinette Électrique") {
    affichs.forEach(aff => {
    aff.style.display='none';
});
    trottElect.style.display='block';
}
else if (selectedButtonId === "trottinette Simple") {
   
    affichs.forEach(aff => {
    aff.style.display='none';
});
    trottSimple.style.display='block';
}
else if (selectedButtonId === "Tous voiture") {
    affichs.forEach(aff => {
    aff.style.display='none';
});
    tvoitures.style.display='block';
}
else if (selectedButtonId === "Tous chaussures à roue") {
    affichs.forEach(aff => {
    aff.style.display='none';
});
    tchauss.style.display='block';
}


  });
    });
    });
});
       
 const carac=document.querySelectorAll('.carac');
 const cart=document.querySelector('.cart');
 const closeCart=document.querySelector('#close-cart');
 const overlay = document.querySelector('.overlay'); 
  carac.forEach(c=>{
    c.addEventListener('click', function(event) {
        cart.classList.add("activeCart");
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
    
}
});
});
function addProductToCart(img,title,prix){
    var cartShopBox=document.createElement("div");
    var cartItems=document.getElementsByClassName('cart-content')[0 ];
    var  carItemsNames=cartItems.getElementsByClassName('cart-product-title');
}
closeCart.addEventListener('click', function(event){
       cart.classList.remove("activeCart");
       overlay.style.display = 'none';
})

function affichLoc(){
var gouvRecap=document.querySelector(".gouverneratRecap");
var villeRecap=document.querySelector(".villeRecap");
var gouv = document.getElementById('l-gouv');
var gouvSel = gouv.options[gouv.selectedIndex].value;
var ville = document.getElementById('l-ville');
var villeSel = ville.options[ville.selectedIndex].value;
var placGouv=document.getElementById('gouvernerat');
var placville=document.getElementById('ville');
placGouv.innerHTML=`${gouvSel}`;
placville.innerHTML=`${villeSel}`;
gouvRecap.innerHTML=`${gouvSel}`;
villeRecap.innerHTML=`${villeSel}`;

}
var b;
function nbrHeure(){
    retrait=document.getElementsByName("options");
    var selectedretrait;
            for (var i = 0; i < retrait.length; i++) {
                if (retrait[i].checked) {
                    selectedretrait = parseInt(retrait[i].value);
                    break;
                }
            }
          
    depots=document.getElementsByName("optionsD");
    var selectedDepot;
            for (var j = 0; j < depots.length; j++) {
                if (depots[j].checked) {
                    selectedDepot = parseInt(depots[j].value);
                    break;
                }
            } 
            var d1= parseInt(dateRetrait);
            var d2=parseInt(dateDepot);
            
            dd=(d2 - d1) * 24 ;
            dh=selectedDepot - selectedretrait;
              b=dd+dh;
           
// Si la différence est négative, cela signifie que la date de dépôt est antérieure à la date de retrait, ajustez en conséquence.
if (b < 0) {
    
    b = 24 * (d2 - d1) + (selectedDepot - selectedretrait);
}
affichheur=document.getElementById("nbHeure");
affichheur.innerHTML=`soit ${b} heures de locations`;
dureRecap=document.querySelector(".nbheurLocation");
dureRecap.innerHTML=`Vous prévoyez de louer ces articles pendant une période de ${b} heures`;
}

if(document.readyState == "loading"){
    document.addEventListener('DOMContentLoaded',start);
}else{
    start();
    
}
function start(){
    addEvents();
}
function update(){
  
    const cartContent = panier.querySelector(".cartItem");
// Vérifier si le panier est vide
const btn_valider=document.getElementById("btn-valider");
     if(itemsAdded.length<=0){
            btn_valider.disabled=true;
            btn_valider.style.backgroundColor="#999";
        }     
    addEvents();
    updateTotal();
}
function addEvents(){
    let cartRemove_btns=document.querySelectorAll(".cartRemove");
    cartRemove_btns.forEach((btn)=>{
        btn.addEventListener("click",handle_removeCartItem);
    });
}
function handle_removeCartItem(){
const titreAEnlever = this.parentElement.querySelector(".titre-pr").innerHTML.trim();

// Trouver l'index de l'élément dans le tableau itemsAdded
const indexAEnlever = itemsAdded.findIndex((el) => el.title.trim() === titreAEnlever);

console.log("Index à enlever :", indexAEnlever);

if (indexAEnlever !== -1) {
    // Si l'élément est trouvé, le supprimer du tableau itemsAdded
    itemsAdded.splice(indexAEnlever, 1);

    console.log("Élément supprimé :", itemsAdded);

    // Appeler la fonction update
    update();
}

// Supprimer l'élément du DOM
this.parentElement.remove();
update();
}
panier=document.querySelector(".panier");
function updateTotal(){
    let cartBoxes=document.querySelectorAll(".carte-box");
    const totalElement=document.querySelector(".total");
    let total=0;
    cartBoxes.forEach((cartBox)=>{
        let priceElement=cartBox.querySelector(".prix-pr");
        let price=parseFloat(priceElement.innerHTML.replace("Dt",""));
        total+=price;
    });
    totalElement.innerHTML=total+"DT";
    var mRec=document.querySelector(".montantRecap");
    mRec.innerHTML=total+"DT";
}

//add to cart

    let addCart_btn=document.querySelectorAll(".btn-ajoutPanier");
    addCart_btn.forEach(btn=>{btn.addEventListener("click",handle_addCartItem);
    });
    let itemsAdded=[];
    function handle_addCartItem(){
      let product=(this.parentElement).parentElement;
      let title=product.querySelector(".infoM").innerHTML;
      let pricePr=parseFloat(product.querySelector(".prix").innerHTML.replace("Dt","")); 
      let price=pricePr*b+"DT";
      let img=product.querySelector(".img-product").src; 
      console.log(title,price,img);
      let newToAdd={
        title,
        price,
        img,
      };
      if(itemsAdded.find(el=>el.title == newToAdd.title)){
         alert("cet artivle existe deja dans votre panier");
         return ;
      }
      else{
        itemsAdded.push(newToAdd);
        btn_valider.disabled=false;
            btn_valider.style.backgroundColor="#078564";
      }
      let cartBoxElement=CartBoxComponenet(title,price,img);
      let newNode=document.createElement("div");
      newNode.innerHTML=cartBoxElement;
      const cartContent=panier.querySelector(".cartItem");
      cartContent.appendChild(newNode);
      update();
    }
        function CartBoxComponenet(title,price,imgSrc){
           
                          return `<div class="carte-box">
                                <img src=${imgSrc} alt="" width="70px" height="70px">
                                <div class="titre-pr">
                                    ${title}
                                </div>
                                <div class="prix-pr">${price}</div>
                                <i class="fas fa-trash-alt cartRemove" style="font-size: 24px; color: red;cursor: pointer;"></i> 
                            </div>` 
                        }
                       
    const btn_valider=document.getElementById("btn-valider");
     if(itemsAdded.length<=0){
            btn_valider.disabled=true;
            btn_valider.style.backgroundColor="#999";
        }   
          
     function envoyerRecap(){
        const titre=document.querySelector(".recap-items");
     for (let element of itemsAdded) {
        let cartBoxElement=recapComponenet(element.title,element.price,element.img);
        let newNode=document.createElement("div");
        newNode.innerHTML=cartBoxElement;
        const cartContent=panier.querySelector(".cartItem");
        titre.appendChild(newNode);
     }
     }
     function recapComponenet(title,price,imgSrc){
           
           return `<div class="carte-box">
                 <img src=${imgSrc} alt="" width="70px" height="70px">
                 <div class="titre-pr">
                     ${title}
                 </div>
                 <div class="prix-pr">${price}</div>
                 <div class="adresse">rue palestine elOmran</div>
                 <div class="nomPropriet">zeineb chekir </div>
             </div>` 
         }
         
         function openPopup(){
            const overlay = document.querySelector('.overlay'); 
            var formSt=document.querySelectorAll(".form-step");
            var popup=document.querySelector(".popup");
            popup.classList.add("open-popup");
            overlay.style.display = 'block';
         }
         function closePopup(){
            popup.classList.remove("open-popup");
            overlay.style.display = 'none';
            window.location.href = "tableau.html";
         }

                  
    </script> 
</body>

</html>