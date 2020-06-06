<?php

// Checks if request method is POST
function is_post() {
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}
