<?php
    // Check if the user is logged in
    $loggedIn = false; // Set this variable to true if the user is logged in

    if (!$loggedIn) {
      // Display the toast message if the user is not logged in
      echo '<script>
              // Display the toast message
              function showToast() {
                var toast = document.getElementById("toastContainer");
                toast.innerHTML = "Please login to continue";
                toast.className = "toast show";
                setTimeout(function(){
                  toast.className = toast.className.replace("show", "");
                }, 3000); // Change the value (in milliseconds) to adjust the display duration
              }
              
              // Call the showToast() function when the page loads
              window.onload = showToast;
            </script>';
    }
  ?>