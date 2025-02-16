<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Send a JSON response indicating success
echo json_encode(['success' => true]);
?>