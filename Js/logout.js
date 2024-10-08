// Get the logout link element
var logoutLink = document.getElementById('logout-link');

// Add a click event listener to the logout link
logoutLink.addEventListener('click', function(event) {
  event.preventDefault();

  // Send an AJAX request to destroy the session
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'logout.php'); // Replace 'logout.php' with the actual path to your server-side script
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    // Handle the response if needed
    if (xhr.status === 200) {
      // Redirect the user to the login page
      window.location.href = "login";
    } else {
      console.log('An error occurred while destroying the session.');
    }
  };
  xhr.send();
});
