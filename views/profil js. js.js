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
   }
   
   function deleteButtonClick() {
       
       console.log("Delete Button Click");
       deleteDialog.close();
   }

   
   function updateImage() {
    const input = document.getElementById("input-file");
    const image = document.getElementById("profile-pic");

    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            image.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

//    function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function(e) {
//             $('#imagePreview').css('background-image', 'url('+e.target.result +')');
//             $('#imagePreview').hide();
//             $('#imagePreview').fadeIn(650);
//         }
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// $("#imageUpload").change(function() {
//     readURL(this);
// });
   





    // function confirmerSuppression() {
    //     var confirmation = confirm("Êtes-vous sûr de vouloir supprimer votre compte ?");
    //     if (confirmation) {
    //         alert("Suppression effectuée !");
    //     } else {
    //          alert("Suppression annulée.");
    //     }
    // }

   
    // document.getElementById("deleteLink").addEventListener("click", function(event) {
       
    //     event.preventDefault();
    //    confirmerSuppression();
    // });


//     function uploadImage() {
//     var input = document.getElementById('imageInput');
//     var previewImage = document.getElementById('previewImage');
//     var previewContainer = document.getElementById('previewContainer');

//     var file = input.files[0];

//     if (file) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             previewImage.src = e.target.result;
//             previewContainer.style.display = 'block';
//         };

//         reader.readAsDataURL(file);
//     } else {
//         alert('Please select an image before uploading.');
//     }
// }







// Récupération des boutons par leur ID
const boutonModifier = document.getElementById("modifier");
const boutonSupprimer = document.getElementById("supprimer");

// Gestionnaire d'événement pour le bouton "Modifier"
boutonModifier.addEventListener("click", function() {
    alert("Action de modification exécutée");
});

// Gestionnaire d'événement pour le bouton "Supprimer"
boutonSupprimer.addEventListener("click", function() {
    if (confirm("Voulez-vous vraiment supprimer ?")) {
        alert("Action de suppression exécutée");
    }
});








