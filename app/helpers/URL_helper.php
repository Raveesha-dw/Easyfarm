<?php
// Simple page redirect
function redirect($page) {
    // Define the full URL
    $url = URLROOT . '/' . $page;

    // Use the full URL in the header
    header('Location: ' . $url);

    // Terminate script execution to ensure the redirect happens immediately
    exit;
}

?>