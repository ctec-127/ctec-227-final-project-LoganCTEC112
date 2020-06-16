<?php
$pageTitle = "Profile";
require 'inc/header.inc.php';
require 'inc/functions.inc.php';
require 'inc/nav.inc.php';

if (!isset($_SESSION['username'])) {
    echo '<div class="alert alert-warning" role="alert">Please log in or Register first!</div>"';
} else {
    echo '<div class="alert alert-info role="alert">This page is under construction, check back later.</div>';
}


require 'inc/footer.inc.php';