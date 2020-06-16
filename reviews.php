<?php
$pageTitle = "Reviews";
require 'inc/header.inc.php';
require 'inc/functions.inc.php';
require 'inc/nav.inc.php';
?>
<div class="reviewsPage col-lg-10 col-md-10 col-sm-12">
<?php

// Query sql to get list of orgs
$orgSql = "SELECT * FROM `organization`";
// echo $orgSql;
$orgResult = $db->query($orgSql);

// Build display listing orgs with number of reviews with jump link to reviews (SMOOTH SCROLLING)
echo "<h1>Organizations</h1>";
echo "<div class=\"row orgDisplay\">";
while ($row = $orgResult->fetch_assoc()){
    echo "<div class=\"card\">";
    echo "<div class=\"cardImg\"><img src=\"img/{$row['logo']}\" alt=\"{$row['name']}'s Logo\"></div>";
    echo "<div><h2>{$row['name']}</h2><hr></div>";
    echo "<div><p>{$row['description']}</p></div>";
    echo "</div>";
}
echo "</div>";

// Query sql to get list of reviews
$reviewSql = "SELECT review.title, review.description, review.date, user.username, organization.name FROM `review`,`user`,`organization` WHERE review.user_id = user.user_id AND review.org_id = organization.org_id ";
// echo $reviewSql;
$reviewResult = $db->query($reviewSql);

// Build display showing reviews in a section

echo "<h1>Reviews</h1>";
echo "<div class=\"row reviewDisplay\">";
if ($reviewResult->num_rows == 0) {
    echo "<p>There are no reviews yet, be the first to &nbsp; <a href=\"writereview.php\">write</a>&nbsp;one!</p>";
} else {
    while ($row = $reviewResult->fetch_assoc()){
        $dt = new DateTime($row['date']);
        $date = $dt->format('Y-m-d');

        echo "<div class=\"reviewCard\">";
        echo "<div class=\"postedBy\"><strong>Posted by:</strong> {$row['username']}</div>";
        echo "<div class=\"orgName\"><strong>Review for:</strong> {$row['name']}</div>";
        echo "<div class=\"reviewDescription\">{$row['description']}</div>";
        echo "<div class=\"reviewTitle\"><h4>{$row['title']}</h4></div>";
        echo "<div class=\"postedOn\"><strong>Posted on:</strong> {$date}</div>";
        echo "</div>";
    }
}

echo "</div>";
?>

</div>

<?php require 'inc/footer.inc.php'; ?>