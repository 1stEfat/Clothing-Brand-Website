<?php
session_start();
session_unset();  // Unset all session variables
session_destroy();  // Destroy the session

// Redirect to the home page or login page
header("Location: 1st.html");
exit();
?>
