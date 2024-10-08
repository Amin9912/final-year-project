$(document).ready(function() {
	$("#update").click(function() {
      // Get the input values
		var custFullName = $("#custFullName").val();
		var custPhoneNum = $("#custPhoneNum").val();
		var address_Line1 = $("#address_Line1").val();
		var address_Line2 = $("#address_Line2").val();
		var postcode = $("#postcode").val();
		var city = $("#city").val();
		var state = $("#state").val();
		var country = $("#country").val();

		Swal.fire({
			title: 'Are you sure?',
			text: "You still able to change after this update!",
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
					url: "profileUpdate.php",
					data: { 
						custFullName: custFullName, 
						custPhoneNum: custPhoneNum, 
						address_Line1: address_Line1, 
						address_Line2: address_Line2, 
						postcode: postcode, 
						city: city, 
						state: state, 
						country: country 
					},
				});

				Swal.fire(
					'Updated!',
					'Your file has been updated.',
					'success'
					)
			}
		})
	});
});