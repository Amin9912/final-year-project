function mult(quantity) {
      var productPrice = parseFloat(document.getElementById('productPrice').value);
      var pickupType = document.getElementById('pickup').value;
      var total = quantity * productPrice;

      if (pickupType === "DELIVERY") {
    // Add the delivery charge
        total += 4;
      }

      document.getElementById('totalPrice').value = total.toFixed(2);
    }


    var deliveryChargeAdded = false;

    function addPickup(type) {
      var total = parseFloat(document.getElementById('totalPrice').value);

      if (type === "DELIVERY") {
        if (!deliveryChargeAdded) {
      // Add the delivery charge
          total += 4;
          deliveryChargeAdded = true;
        }
      } else if (type === "SELF-PICKUP") {
        if (deliveryChargeAdded) {
      // Subtract the delivery charge
          total -= 4;
          deliveryChargeAdded = false;
        }
      }

      document.getElementById('totalPrice').value = total.toFixed(2);
    }
