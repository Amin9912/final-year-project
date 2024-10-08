$(document).ready(function() {
  $("#updateBtn").click(function() {
      // Get the input values
    var editPID = $("#editPID").val();
    var editName = $("#editName").val();
    var editSize = $("#editSize").val();
    var editUnitSize = $("#editUnitSize").val();
    var editPrice = $("#editPrice").val();
    var editProductDescription = $("#editProductDescription").val();

    Swal.fire({
      title: 'Are you sure?',
      text: "You still able to change after this update!",
      text: "PID:" + editPID,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update!'
    }).then((result) => {
      if (result.isConfirmed) {

            // Send the data to the server
        $.ajax({
          type: "POST",
          url: "updateProductData(CRUD).php",
          data: { 
            editPID: editPID, 
            editName: editName, 
            editSize: editSize, 
            editUnitSize: editUnitSize, 
            editPrice: editPrice, 
            editProductDescription: editProductDescription, 
          },
        });

        Swal.fire({
          icon: 'success',
          title: 'Successfully Updated!',
          text: 'Product ID: '+ editPID +' has been updated.',
          showConfirmButton: true,
        }).then(function() {
        // Redirect to the desired page
          location.href = "manageProduct.php";
        });
      }
    })
  });
});