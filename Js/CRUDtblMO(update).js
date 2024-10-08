$(document).ready(function() {
  $("#updateBtn").click(function() {
    // Get the input values
    var OID = $("#OID").val();
    var CID = $("#CID").val();
    var shippingID = $("#shippingID").val();
    var orderStatus = $("#orderStatus").val();

    Swal.fire({
      title: 'Are you sure?',
      text: "You still able to change after this update! OID: " + OID,
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
          url: "updateOrderData(CRUD).php",
          data: { 
            OID: OID, 
            CID: CID, 
            shippingID: shippingID, 
            orderStatus: orderStatus // Removed the space in the key
          },
        });

        Swal.fire({
          icon: 'success',
          title: 'Successfully Updated!',
          text: 'Product ID: ' + OID + ' has been updated.',
          showConfirmButton: true,
        }).then(function() {
          // Redirect to the desired page
          location.href = "manageOrder.php";
        });
      }
    });
  });
});
