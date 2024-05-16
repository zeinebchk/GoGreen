// function openDialogButtonClick() {
//     var deleteDialog = document.getElementById('deleteDialog');
//     deleteDialog.showModal();
// }

// // Fonction appelée lors du clic sur le bouton d'annulation
// function cancelButtonClick() {
//     var deleteDialog = document.getElementById('deleteDialog');
//     deleteDialog.close();
// }

// // Fonction appelée lors du clic sur le bouton de suppression
// function deleteButtonClick() {
//     // Ajoutez ici le code pour effectuer la suppression du compte
//     // Par exemple, vous pouvez faire une requête AJAX pour supprimer le compte côté serveur.
    
//     // Ensuite, fermez la boîte de dialogue
//     var deleteDialog = document.getElementById('deleteDialog');
//     deleteDialog.close();
// }





// const subButtons=document.getElementById("sub-buttons");
//         const buttons = document.querySelectorAll('.buttons button');
//         const affichs=document.querySelectorAll('.affich');
//         const tvelos=document.getElementById('tous-velos');
//          buttons.forEach(button => {
//         button.addEventListener('click', function() {
//         buttons.forEach(btn => btn.classList.remove('active'));
//         this.classList.add('active');
//             affichs.forEach(affi=> affi.style.display='none');
//         const className = event.target.className;
//         let subButtonsArray = [];

//         if (className.includes("btn-velo")) {
//             subButtonsArray = ["Tous vélos", "vélos Électriques", "vélos Simples"];
//         } else if (className.includes("btn-trottinette")) {
//             subButtonsArray = ["Tous trottinettes", "trottinette Électrique", "trottinette Simple"];
//         } else if (className.includes("btn-voiture")) {
//             subButtonsArray = ["Tous voiture"];
//         } else if (className.includes("btn-chaussuresRoue")) {
//             subButtonsArray = ["Tous chaussures à roue"];
//         }

//         // Créez les balises de bouton à partir du tableau subButtonsArray
//         let buttHtml = '';
//         subButtonsArray.forEach(subButton => {
//             // if(subButton==="Tous vélos"){
//             //     tvelos.style.display='block';
//             //     buttHtml += <button type="button" id="${subButton}" class="sub-but activebutt">${subButton}</button>;
                     
//             // }
//             // else{
//             buttHtml += <button type="button" id="${subButton}" class="sub-but">${subButton}</button>;
//         //}

//         });

//         // Mettez à jour le contenu de l'élément sub-buttons avec les balises de bouton générées
//         subButtons.innerHTML = buttHtml;
//         const butt = document.querySelectorAll('.sub-but');
       
//         const tvelos=document.getElementById('tous-velos');
//         const velosElec=document.getElementById('velos-elect');
//         const velosSimp=document.getElementById('velos-simple');
//         const ttrott=document.getElementById('tous-trot');
//         const trottElect=document.getElementById('trot-elect');
//         const trottSimple=document.getElementById('trot-simple');
//         const tvoitures=document.getElementById('tous-voit');
//         const tchauss=document.getElementById('tout-chauss');
//         butt.forEach(button => {
//         button.addEventListener('click', function() {
//         butt.forEach(btn => btn.classList.remove('activebutt'));
//         this.classList.add('activebutt');
//         const selectedButtonId = this.id; // Utilisez this.id pour récupérer l'ID du bouton
       

// affichs.forEach(aff => {
//     aff.classList.contains('activaff') && aff.classList.remove('activaff');
// });
// if (selectedButtonId === "Tous vélos") {
//     affichs.forEach(aff => {
//     aff.style.display="none";
// });
//     tvelos.style.display='block';
// } else if (selectedButtonId === "vélos Électriques") {
//     affichs.forEach(aff => {
//     aff.style.display='none';
// });
//     velosElec.style.display='block';
// }
// else if (selectedButtonId === "vélos Simples") {
//     affichs.forEach(aff => {
//     aff.style.display='none';
// });
//     velosSimp.style.display='block';
// }
// else if (selectedButtonId === "Tous trottinettes") {
//     affichs.forEach(aff => {
//     aff.style.display='none';
// });
//     ttrott.style.display='block';
// }
// else if (selectedButtonId === "trottinette Électrique") {
//     affichs.forEach(aff => {
//     aff.style.display='none';
// });
//     trottElect.style.display='block';
// }
// else if (selectedButtonId === "trottinette Simple") {
   
//     affichs.forEach(aff => {
//     aff.style.display='none';
// });
//     trottSimple.style.display='block';
// }
// else if (selectedButtonId === "Tous voiture") {
//     affichs.forEach(aff => {
//     aff.style.display='none';
// });
//     tvoitures.style.display='block';
// }
// else if (selectedButtonId === "Tous chaussures à roue") {
//     affichs.forEach(aff => {
//     aff.style.display='none';
// });
//     tchauss.style.display='block';
// }


//   });
//     });
//     });
// });

//   document.querySelector('.btn-modifier').addEventListener('click', function() {
//     window.location.href = 'file:///C:/Users/asus/Desktop/site%20web/publier%20une%20annonce.html?pets=';
//   });
//   function afficherConfirmation() {
//     document.getElementById('confirmationModal').style.display = 'flex';
//   }

//   function fermerConfirmation() {
//     document.getElementById('confirmationModal').style.display = 'none';
//   }

//   function supprimerAnnonce() {
//     // Ajoutez ici le code pour supprimer l'annonce ou effectuer toute autre action nécessaire
//     alert("Annonce supprimée !"); // C'est juste un exemple, remplacez cela par votre logique de suppression réelle
//     fermerConfirmation(); // Fermez la fenêtre modale après la suppression (ou ajustez selon vos besoins)
//   }
  document.addEventListener('DOMContentLoaded', function() {
    const carac = document.querySelectorAll('.carac');
    const cart = document.querySelector('.cart');
    const closeCart = document.querySelector('#close-cart');
    const overlay = document.querySelector('.overlay');
    carac.forEach(c => {
      c.addEventListener('click', function(event) {
        cart.classList.add("activeCart");
        overlay.style.display = 'block';
        var button = event.target;
        var parentArt = button.closest('.art');

        if (parentArt) {
          var infoMElement = parentArt.querySelector('.infoM');
          var title = infoMElement.innerText;
          var prix = parentArt.querySelector('.prix').innerText;
          var imgElement = parentArt.querySelector('img');
          var img = imgElement.src;
          addProductToCart(img, title, prix);
        }
      });
    });

    function addProductToCart(img, title, prix) {
      var cartShopBox = document.createElement("div");
      var cartItems = document.querySelector('.cart-content');
      var carItemsNames = cartItems.getElementsByClassName('cart-product-title');
      // Ajoutez le code pour ajouter le produit au panier ici
    }

    closeCart.addEventListener('click', function(event) {
      cart.classList.remove("activeCart");
      overlay.style.display = 'none';
    });
  });