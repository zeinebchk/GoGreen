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