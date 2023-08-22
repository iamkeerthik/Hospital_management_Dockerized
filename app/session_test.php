<?php
// Start the session
session_start();

// Set a session variable
$_SESSION['test_variable'] = 'Hello, Docker Session!';

// Retrieve the session variable
$message = $_SESSION['test_variable'];

// Output the session variable to the browser
echo $message;
?>
