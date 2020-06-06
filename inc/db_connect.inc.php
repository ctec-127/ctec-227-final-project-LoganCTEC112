<?php

// Database connection

$db = new mysqli('localhost', 'root', '', 'orgreview');

// Error Check
if ($db->connect_error) {
    $error = $db->connect_error;
    echo $error;
}

// Encode connection
$db->set_charset('utf8');