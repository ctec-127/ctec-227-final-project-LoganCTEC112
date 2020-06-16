<?php

// Checks if request method is POST
function is_post() {
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

// Displays errors
function display_errors($error_bucket){
	echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"';
	echo '<h3>Missing or wrong information in the form:</h3>';
	echo '<ul>';
	foreach ($error_bucket as $text) {
		echo '<li>' . $text . '</li>';
	}
	echo '</ul>';
	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
	echo '<span aria-hidden="true">&times;</span>';
	echo '</div>';
}