<?php
$pageTitle = "Reviews";
require 'inc/header.inc.php';
require 'inc/functions.inc.php';
require 'inc/nav.inc.php';

// Query sql to get list of orgs
$orgSql = "SELECT * FROM `organization`";
// echo $orgSql;
$orgResult = $db->query($orgSql);


// Query sql to get list of reviews
$reviewSql = "SELECT * FROM `review`";
// echo $reviewSql;
$reviewResult = $db->query($reviewSql);

// Build display listing orgs with number of reviews with jump link to reviews (SMOOTH SCROLLING)
echo "<h1>Organizations</h1>";
echo "<div class=\"row orgDisplay\">";
while ($row = $orgResult->fetch_assoc()){
    echo "<div class=\"card\">";
    echo "<img src=\"img/{$row['logo']}\" alt=\"{$row['name']}'s Logo\">";
    echo "<h2>{$row['name']}</h2><hr>";
    echo "<p>{$row['description']}</p>";
    echo "<a href=\"#\">Reviews</a>";
    echo "</div>";
}
echo "</div>";

// Build display showing reviews in a section

echo "<h1>Reviews</h1>";
echo "<div class=\"row reviewDisplay\"";
if ($reviewResult->num_rows == 0) {
    echo "<p>There are no reviews yet, be the first to &nbsp; <a href=\"writereview.php\">write</a>&nbsp;one!</p>";
} else {
    while ($row = $reviewResult->fetch_assoc()){
        echo "<div class=\"reviewCard\">";
        // Use display: grid in css to build these cards.
        // Need to figure out the join statement to get username and organization from other tables
        echo "<div id=\"postedBy\">Posted by: {$row['']}<span>CHECK IF VERIFIED</span></div>";
        echo "<div id=\"orgName\">Review for: {$row['']}</div>";
        echo "<div id=\"reviewDescription\">{$row['description']}</div>";
        echo "<div id=\"reviewTitle\">{$row['title']}</div>";
        echo "<div id=\"postedOn\">Posted on: {$row['date']}";
        echo "</div>";
    }
}

echo "</div>";



require 'inc/footer.inc.php';