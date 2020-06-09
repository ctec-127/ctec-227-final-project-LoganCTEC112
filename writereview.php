<?php
$pageTitle = "Review your Organization";
require 'inc/header.inc.php';
require 'inc/functions.inc.php';
require 'inc/nav.inc.php';
if (!isset($_SESSION['username'])){
    echo "<p>Please log in to write a review</p>";
} else {
    // Logic to post form submission to database

    $orgSql = "SELECT * FROM `organization`";
    // echo $orgSql;
    $orgResult = $db->query($orgSql);


    // Form with enriched text editor to write review. Use drop downs to choose org
    ?>
    <div class="row">
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="form-group">
                <label class="col-form-label" for="org">Select Organization </label>
                <select name="org" id="org">
                <?php
                while ($row = $orgResult->fetch_assoc()){
                    echo "<option value=\"{$row['name']}\">{$row['name']}</option>";
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="title">Review Title </label>
                <input type="text" id="title" name="title">
            </div>
            <div class="form-group">
                <label class="col-form-label" for=""> </label>
                <!-- ENRICHED EDITOR HERE -->
                <input type="text">
            </div>
        </form>
    </div>
    <?php


}
echo "<p>Page in construction, check back later!</p>";

require 'inc/footer.inc.php';